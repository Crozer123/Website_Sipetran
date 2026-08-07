<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KegiatanFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    // ========== ADMIN PASSWORD ===========
    private string $adminPassword = 'sipetran';

    // ======================================
    // PUBLIC: Halaman Kegiatan
    // ======================================
    public function index()
    {
        $kegiatan = Kegiatan::with('foto')->orderBy('urutan')->orderBy('id')->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with('foto')->findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    // ======================================
    // ADMIN: Auth
    // ======================================
    public function adminLoginForm()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.kegiatan.index');
        }
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if ($request->password === $this->adminPassword) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.kegiatan.index')->with('success', 'Berhasil login!');
        }

        return back()->withErrors(['password' => 'Password salah!'])->withInput();
    }

    public function adminLogout(Request $request)
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login')->with('success', 'Berhasil logout.');
    }

    // ======================================
    // ADMIN: Kegiatan CRUD
    // ======================================
    public function adminIndex()
    {
        $this->requireAdmin();
        $kegiatan = Kegiatan::with('foto')->orderBy('urutan')->orderBy('id')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function adminCreate()
    {
        $this->requireAdmin();
        $nextUrutan = Kegiatan::max('urutan') + 1;
        return view('admin.kegiatan.create', compact('nextUrutan'));
    }

    public function adminStore(Request $request)
    {
        $this->requireAdmin();

        $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'tanggal'     => 'nullable|string|max:100',
            'lokasi'      => 'nullable|string|max:255',
            'urutan'      => 'nullable|integer',
            'foto.*'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'keterangan.*'=> 'nullable|string|max:255',
        ]);

        $kegiatan = Kegiatan::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal'   => $request->tanggal,
            'lokasi'    => $request->lokasi,
            'urutan'    => $request->urutan ?? (Kegiatan::max('urutan') + 1),
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $i => $file) {
                $path = $file->store('kegiatan', 'public');
                KegiatanFoto::create([
                    'kegiatan_id' => $kegiatan->id,
                    'path'        => $path,
                    'keterangan'  => $request->keterangan[$i] ?? null,
                    'urutan'      => $i,
                ]);
            }
        }

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan "' . $kegiatan->judul . '" berhasil ditambahkan!');
    }

    public function adminEdit($id)
    {
        $this->requireAdmin();
        $kegiatan = Kegiatan::with('foto')->findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $this->requireAdmin();

        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'tanggal'     => 'nullable|string|max:100',
            'lokasi'      => 'nullable|string|max:255',
            'urutan'      => 'nullable|integer',
            'foto.*'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'keterangan.*'=> 'nullable|string|max:255',
        ]);

        $kegiatan->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal'   => $request->tanggal,
            'lokasi'    => $request->lokasi,
            'urutan'    => $request->urutan ?? $kegiatan->urutan,
        ]);

        // Hapus foto yang dipilih untuk dihapus
        if ($request->has('hapus_foto')) {
            foreach ($request->hapus_foto as $fotoId) {
                $foto = KegiatanFoto::find($fotoId);
                if ($foto) {
                    Storage::disk('public')->delete($foto->path);
                    $foto->delete();
                }
            }
        }

        // Tambah foto baru
        if ($request->hasFile('foto')) {
            $maxUrutan = $kegiatan->foto()->max('urutan') ?? -1;
            foreach ($request->file('foto') as $i => $file) {
                $path = $file->store('kegiatan', 'public');
                KegiatanFoto::create([
                    'kegiatan_id' => $kegiatan->id,
                    'path'        => $path,
                    'keterangan'  => $request->keterangan[$i] ?? null,
                    'urutan'      => $maxUrutan + $i + 1,
                ]);
            }
        }

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan "' . $kegiatan->judul . '" berhasil diperbarui!');
    }

    public function adminDelete($id)
    {
        $this->requireAdmin();

        $kegiatan = Kegiatan::with('foto')->findOrFail($id);

        foreach ($kegiatan->foto as $foto) {
            Storage::disk('public')->delete($foto->path);
        }

        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }

    // ======================================
    // Helper
    // ======================================
    private function requireAdmin()
    {
        if (!session('admin_logged_in')) {
            abort(redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.'));
        }
    }
}
