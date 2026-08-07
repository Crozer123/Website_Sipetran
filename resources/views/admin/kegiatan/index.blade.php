<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kegiatan — SIPETRAN</title>
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
    </style>
</head>
<body class="font-body text-gray-800 antialiased">

    <!-- Top Bar -->
    <header class="bg-sipetran-green text-white px-6 py-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-[#F5C400] rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-leaf text-sipetran-green text-base"></i>
            </div>
            <div>
                <p class="font-heading font-bold text-base leading-none">SIPETRAN Admin</p>
                <p class="text-green-300 text-[10px]">Panel Manajemen Kegiatan</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('kegiatan.index') }}" target="_blank"
                class="text-green-300 hover:text-white text-xs flex items-center gap-1.5 transition-colors">
                <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> Lihat Publik
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                @csrf
                <button type="submit"
                    class="bg-white/10 hover:bg-white/20 text-white text-xs px-4 py-2 rounded-xl transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-8">

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 text-sm px-5 py-3.5 rounded-2xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-green-500 text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 text-sm px-5 py-3.5 rounded-2xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation text-red-400 text-lg"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="font-heading font-bold text-2xl text-gray-900">Manajemen Kegiatan</h1>
                <p class="text-gray-500 text-sm mt-1">{{ $kegiatan->count() }} kegiatan terdaftar</p>
            </div>
            <a href="{{ route('admin.kegiatan.create') }}"
                class="inline-flex items-center gap-2 bg-sipetran-green hover:bg-sipetran-lightgreen text-white font-semibold px-5 py-3 rounded-2xl transition-colors text-sm">
                <i class="fa-solid fa-plus"></i> Tambah Kegiatan Baru
            </a>
        </div>

        @if($kegiatan->isEmpty())
            <!-- Empty State -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 text-center py-20">
                <div class="w-16 h-16 bg-amber-100 rounded-3xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-folder-open text-amber-400 text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-gray-700 text-xl mb-2">Belum Ada Kegiatan</h3>
                <p class="text-gray-400 text-sm mb-6 max-w-sm mx-auto">Mulai tambahkan kegiatan program SIPETRAN beserta foto dokumentasinya.</p>
                <a href="{{ route('admin.kegiatan.create') }}"
                    class="inline-flex items-center gap-2 bg-sipetran-green text-white font-semibold px-6 py-3 rounded-2xl hover:bg-sipetran-lightgreen transition-colors">
                    <i class="fa-solid fa-plus"></i> Tambah Kegiatan Pertama
                </a>
            </div>
        @else
            <!-- Kegiatan Table -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-12">No</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Kegiatan</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-28">Foto</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-32">Tanggal</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($kegiatan as $index => $item)
                            <tr class="hover:bg-gray-50/60 transition-colors group">
                                <!-- No -->
                                <td class="px-6 py-4">
                                    <span class="w-8 h-8 bg-amber-100 text-amber-700 font-bold text-xs rounded-xl flex items-center justify-center">
                                        {{ $item->urutan ?: $index + 1 }}
                                    </span>
                                </td>

                                <!-- Judul + Deskripsi -->
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-gray-900 text-sm">{{ $item->judul }}</p>
                                    @if($item->deskripsi)
                                        <p class="text-gray-400 text-xs mt-0.5 line-clamp-1">{{ $item->deskripsi }}</p>
                                    @endif
                                    @if($item->lokasi)
                                        <p class="text-gray-400 text-xs mt-0.5 flex items-center gap-1">
                                            <i class="fa-solid fa-location-dot text-sipetran-orange"></i>
                                            {{ $item->lokasi }}
                                        </p>
                                    @endif
                                </td>

                                <!-- Foto Preview -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1.5">
                                        @if($item->foto->isNotEmpty())
                                            <div class="flex -space-x-2">
                                                @foreach($item->foto->take(3) as $foto)
                                                <img src="{{ asset('storage/'.$foto->path) }}"
                                                    alt="" class="w-8 h-8 rounded-lg object-cover border-2 border-white shadow-sm">
                                                @endforeach
                                            </div>
                                            @if($item->foto->count() > 3)
                                                <span class="text-xs text-gray-400 font-medium">+{{ $item->foto->count() - 3 }}</span>
                                            @endif
                                        @else
                                            <span class="text-xs text-gray-300 italic">Tidak ada foto</span>
                                        @endif
                                    </div>
                                </td>

                                <!-- Tanggal -->
                                <td class="px-6 py-4">
                                    <span class="text-xs text-gray-500">{{ $item->tanggal ?: '—' }}</span>
                                </td>

                                <!-- Aksi -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.kegiatan.edit', $item->id) }}"
                                            class="w-8 h-8 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center transition-colors"
                                            title="Edit">
                                            <i class="fa-solid fa-pen text-xs"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.kegiatan.delete', $item->id) }}"
                                            onsubmit="return confirm('Hapus kegiatan ini beserta semua fotonya?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 bg-red-50 hover:bg-red-100 text-red-500 rounded-xl flex items-center justify-center transition-colors"
                                                title="Hapus">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </main>

</body>
</html>
