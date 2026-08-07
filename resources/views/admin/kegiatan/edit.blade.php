<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan — SIPETRAN Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,600;9..40,700;9..40,800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['DM Sans', 'sans-serif'],
                        body:    ['Inter', 'sans-serif'],
                    },
                    colors: {
                        sipetran: { green: '#2b5219', lightgreen: '#4a7c2f', orange: '#d97706' }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #f1f5f0; }
        .drop-zone { border: 2px dashed #d1d5db; transition: all 0.2s; }
        .drop-zone.dragover { border-color: #2b5219; background: #f0fdf4; }
        .input-field { transition: box-shadow 0.2s, border-color 0.2s; }
        .input-field:focus { outline: none; box-shadow: 0 0 0 3px rgba(43,82,25,0.12); border-color: #2b5219; }
        .foto-delete-cb:checked + label { opacity: 0.4; }
        .foto-delete-cb:checked + label::after {
            content: 'HAPUS';
            position: absolute; inset: 0; background: rgba(239,68,68,0.75);
            color: white; font-weight: bold; font-size: 11px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 1rem;
        }
    </style>
</head>
<body class="font-body text-gray-800 antialiased">

    <!-- Top Bar -->
    <header class="bg-sipetran-green text-white px-6 py-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.kegiatan.index') }}" class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-colors">
                <i class="fa-solid fa-arrow-left text-sm"></i>
            </a>
            <div>
                <p class="font-heading font-bold text-base leading-none">Edit Kegiatan</p>
                <p class="text-green-300 text-[10px] truncate max-w-xs">{{ $kegiatan->judul }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
            @csrf
            <button type="submit" class="bg-white/10 hover:bg-white/20 text-white text-xs px-4 py-2 rounded-xl transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </header>

    <main class="max-w-3xl mx-auto px-6 py-8">
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 text-sm px-5 py-3.5 rounded-2xl mb-5 flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-green-500 text-lg"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Card: Info Dasar -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-7 mb-5">
                <h2 class="font-heading font-bold text-gray-900 text-lg mb-5 flex items-center gap-2">
                    <span class="w-7 h-7 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600 text-sm">
                        <i class="fa-solid fa-circle-info"></i>
                    </span>
                    Informasi Kegiatan
                </h2>

                <div class="space-y-4">
                    <div class="grid grid-cols-[100px_1fr] gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">No. Urutan</label>
                            <input type="number" name="urutan" value="{{ old('urutan', $kegiatan->urutan) }}" min="1"
                                class="input-field w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Judul Kegiatan <span class="text-red-400">*</span></label>
                            <input type="text" name="judul" value="{{ old('judul', $kegiatan->judul) }}"
                                class="input-field w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-gray-50" required>
                            @error('judul')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Tanggal Kegiatan</label>
                            <input type="text" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal) }}"
                                placeholder="Misal: 15 Januari 2025"
                                class="input-field w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Lokasi Kegiatan</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}"
                                class="input-field w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-gray-50">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="4"
                            class="input-field w-full border border-gray-200 rounded-xl px-4 py-3 text-sm bg-gray-50 resize-none">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Card: Foto Existing -->
            @if($kegiatan->foto->isNotEmpty())
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-7 mb-5">
                <h2 class="font-heading font-bold text-gray-900 text-lg mb-2 flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-100 rounded-lg flex items-center justify-center text-green-600 text-sm">
                        <i class="fa-solid fa-images"></i>
                    </span>
                    Foto Saat Ini ({{ $kegiatan->foto->count() }} foto)
                </h2>
                <p class="text-gray-400 text-xs mb-5">Centang foto yang ingin dihapus, lalu simpan.</p>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @foreach($kegiatan->foto as $foto)
                    <div class="relative">
                        <input type="checkbox" name="hapus_foto[]" value="{{ $foto->id }}"
                            id="hapus_{{ $foto->id }}" class="foto-delete-cb hidden"
                            onchange="toggleDeleteOverlay(this, '{{ $foto->id }}')">
                        <label for="hapus_{{ $foto->id }}" class="cursor-pointer block relative" id="label_{{ $foto->id }}">
                            <img src="{{ asset('storage/'.$foto->path) }}" alt="{{ $foto->keterangan }}"
                                class="w-full h-36 object-cover rounded-2xl border border-gray-100">
                            @if($foto->keterangan)
                                <p class="text-xs text-gray-400 mt-1 text-center">{{ $foto->keterangan }}</p>
                            @endif
                            <div id="overlay_{{ $foto->id }}"
                                class="absolute inset-0 rounded-2xl items-center justify-center text-white font-bold text-xs hidden bg-red-500/75">
                                HAPUS
                            </div>
                        </label>
                        <button type="button" onclick="document.getElementById('hapus_{{ $foto->id }}').click()"
                            id="btn_{{ $foto->id }}"
                            class="absolute top-2 right-2 w-6 h-6 bg-white rounded-full shadow flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors">
                            <i class="fa-solid fa-trash text-[10px]"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Card: Upload Foto Baru -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-7 mb-5">
                <h2 class="font-heading font-bold text-gray-900 text-lg mb-2 flex items-center gap-2">
                    <span class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 text-sm">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    Tambah Foto Baru
                </h2>
                <p class="text-gray-400 text-xs mb-5">Opsional — hanya isi jika ingin menambah foto baru.</p>

                <div class="drop-zone rounded-2xl p-8 text-center cursor-pointer hover:border-sipetran-green hover:bg-green-50/50 transition-all"
                    id="drop-zone" onclick="document.getElementById('foto-input').click()">
                    <div id="drop-placeholder">
                        <div class="w-12 h-12 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-xl"></i>
                        </div>
                        <p class="text-gray-600 font-medium text-sm">Klik atau drag & drop foto baru</p>
                        <p class="text-gray-400 text-xs mt-1">JPG, PNG, WebP — max 5 MB</p>
                    </div>
                </div>
                <input type="file" name="foto[]" id="foto-input" multiple accept="image/*" class="hidden" onchange="previewFotos(this)">
                <div id="preview-grid" class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-5 hidden"></div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 justify-end">
                <a href="{{ route('admin.kegiatan.index') }}"
                    class="px-6 py-3 bg-white border border-gray-200 text-gray-700 font-semibold text-sm rounded-2xl hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-sipetran-green hover:bg-sipetran-lightgreen text-white font-semibold text-sm rounded-2xl transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </main>

    <script>
        function toggleDeleteOverlay(cb, id) {
            const overlay = document.getElementById('overlay_' + id);
            const btn     = document.getElementById('btn_' + id);
            if (cb.checked) {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
                btn.innerHTML = '<i class="fa-solid fa-rotate-left text-[10px]"></i>';
            } else {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
                btn.innerHTML = '<i class="fa-solid fa-trash text-[10px]"></i>';
            }
        }

        const dropZone = document.getElementById('drop-zone');
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('dragover'); });
        dropZone.addEventListener('dragleave', () => dropZone.classList.remove('dragover'));
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault(); dropZone.classList.remove('dragover');
            const input = document.getElementById('foto-input');
            const dt = new DataTransfer();
            [...e.dataTransfer.files].forEach(f => dt.items.add(f));
            input.files = dt.files;
            previewFotos(input);
        });

        function previewFotos(input) {
            const grid = document.getElementById('preview-grid');
            const ph   = document.getElementById('drop-placeholder');
            grid.innerHTML = '';
            if (!input.files.length) { grid.classList.add('hidden'); return; }
            ph.innerHTML = `<p class="text-sipetran-green font-semibold text-sm">${input.files.length} foto baru dipilih</p><p class="text-gray-400 text-xs mt-1">Klik untuk ganti</p>`;
            grid.classList.remove('hidden');
            [...input.files].forEach((file, i) => {
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = 'relative group';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-36 object-cover rounded-2xl border border-gray-100">
                        <div class="absolute inset-0 bg-black/30 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-2">
                            <input type="text" name="keterangan[]" placeholder="Keterangan..."
                                class="w-full bg-white/90 text-gray-800 text-xs rounded-lg px-2 py-1.5 focus:outline-none">
                        </div>
                        <div class="absolute top-2 left-2 w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center text-white text-[9px] font-bold">${i+1}</div>
                    `;
                    grid.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</body>
</html>
