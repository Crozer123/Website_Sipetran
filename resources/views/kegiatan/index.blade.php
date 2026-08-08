<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Kegiatan — SIPETRAN Desa Gunungsari</title>
    <meta name="description" content="Dokumentasi kegiatan program SIPETRAN Desa Gunungsari - foto dan deskripsi seluruh kegiatan lapangan.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700&family=DM+Sans:opsz,wght@9..40,500;9..40,600;9..40,700;9..40,800&family=Inter:wght@400;500;600;700&family=Caveat:wght@700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Playfair Display', 'serif'],
                        heading: ['DM Sans', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                        handwriting: ['Caveat', 'cursive'],
                    },
                    colors: {
                        sipetran: {
                            green: '#203816',
                            dark: '#14260d',
                            lightgreen: '#4a7c2f',
                            orange: '#d97706',
                            redorange: '#c85a32',
                            darkorange: '#b45309',
                            cream: '#FAF8F2',
                            bg: '#FAF8F2',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { background-color: #FAF8F2; color: #1c2417; }

        .wave-separator {
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .ghia-badge-orange {
            display: inline-block;
            background: #d97706;
            color: #ffffff;
            border: 2.5px solid #ffffff;
            padding: 4px 18px;
            border-radius: 8px;
            transform: rotate(-1.5deg);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.35);
        }

        /* Folder SVG Card */
        .folder-card {
            cursor: pointer;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
        }
        .folder-card:hover {
            transform: translateY(-8px) rotate(-1.5deg);
        }
        .folder-card:hover .folder-body {
            filter: brightness(1.08);
        }

        /* Modal backdrop */
        .modal-backdrop {
            background: rgba(0,0,0,0.65);
            backdrop-filter: blur(6px);
        }

        /* Gallery scroll */
        .gallery-scroll {
            display: flex;
            gap: 0.75rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding-bottom: 0.5rem;
        }
        .gallery-scroll::-webkit-scrollbar { height: 4px; }
        .gallery-scroll::-webkit-scrollbar-thumb { background: #d97706; border-radius: 4px; }
        .gallery-scroll img {
            scroll-snap-align: start;
            flex-shrink: 0;
            border-radius: 1rem;
            object-fit: cover;
            cursor: pointer;
        }

        /* Lightbox */
        .lightbox {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,0.92);
            display: flex; align-items: center; justify-content: center;
        }
        .lightbox img { max-width: 92vw; max-height: 88vh; border-radius: 1rem; object-fit: contain; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up { animation: fadeInUp 0.4s ease both; }
    </style>
</head>

<body class="font-body text-gray-800 antialiased"
    x-data="{
        modalOpen: false,
        activeKegiatan: null,
        lightboxSrc: null,
        openModal(k) { this.activeKegiatan = k; this.modalOpen = true; document.body.style.overflow='hidden'; },
        closeModal() { this.modalOpen = false; this.activeKegiatan = null; document.body.style.overflow=''; },
        openLightbox(src) { this.lightboxSrc = src; },
        closeLightbox() { this.lightboxSrc = null; }
    }">

    <!-- ============ NAVIGATION ============ -->
    <header class="absolute top-0 left-0 right-0 z-50" x-data="{ mobileOpen: false }">
        <nav class="flex items-center justify-between py-5 px-6 max-w-6xl mx-auto">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2.5 hover:opacity-80 transition-opacity">
                <span class="font-handwriting text-3xl text-emerald-300 font-bold tracking-wide">Sipetran</span>
                <span class="text-[10px] font-semibold text-green-300 tracking-widest uppercase border-l border-white/20 pl-2">Desa Gunungsari</span>
            </a>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex items-center gap-7 font-body text-sm font-medium text-white/80">
                <a href="/" class="hover:text-white transition-colors">Beranda</a>
                <a href="{{ route('tentang') }}" class="hover:text-white transition-colors">Tentang Program</a>

                <!-- Dropdown Mitra -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open" class="hover:text-white transition-colors flex items-center gap-1.5 focus:outline-none">
                        <span>Mitra</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200" :class="open ? 'rotate-180 text-emerald-300' : 'text-white/50'"></i>
                    </button>

                    <!-- Dropdown Card -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95" class="absolute left-1/2 -translate-x-1/2 mt-3 w-72 bg-white rounded-3xl shadow-xl border border-stone-100 p-4 z-50 text-gray-800">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-3 px-2">Mitra & Pendukung Program</p>
                        <div class="space-y-1">
                            <div class="flex items-center gap-3 p-2.5 rounded-2xl hover:bg-emerald-50/60 transition-colors group cursor-default">
                                <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-building-columns text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-900 leading-none mb-1 group-hover:text-emerald-800">Kemendikbudristek</p>
                                    <p class="text-[10px] text-gray-500">Penyelenggara PPK Ormawa</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-2.5 rounded-2xl hover:bg-emerald-50/60 transition-colors group cursor-default">
                                <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-graduation-cap text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-900 leading-none mb-1 group-hover:text-emerald-800">Perguruan Tinggi</p>
                                    <p class="text-[10px] text-gray-500">Pembina & Pendamping</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-2.5 rounded-2xl hover:bg-teal-50/60 transition-colors group cursor-default">
                                <div class="w-8 h-8 rounded-xl bg-teal-100 text-teal-800 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-users text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-900 leading-none mb-1 group-hover:text-teal-800">Tim PPK Ormawa</p>
                                    <p class="text-[10px] text-gray-500">Pelaksana Pengabdian</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-2.5 rounded-2xl hover:bg-green-50/60 transition-colors group cursor-default">
                                <div class="w-8 h-8 rounded-xl bg-green-100 text-green-800 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-tree-city text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-900 leading-none mb-1 group-hover:text-green-800">Pemdes Gunungsari</p>
                                    <p class="text-[10px] text-gray-500">Pemerintah Desa Binaan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('modul') }}" class="hover:text-white transition-colors">Program Modul</a>
                <a href="{{ route('kegiatan.index') }}" class="text-white font-bold border-b-2 border-white pb-0.5">Kegiatan</a>
                <a href="{{ route('admin.login') }}" class="text-white/80 hover:text-white transition-colors flex items-center gap-1 font-medium bg-white/10 hover:bg-white/20 backdrop-blur-sm px-3.5 py-1.5 rounded-xl border border-white/20">
                    <i class="fa-solid fa-user-shield text-xs text-emerald-300"></i> Admin
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 text-white">
                <i class="fa-solid text-xl" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
            </button>
        </nav>

        <!-- Mobile Menu Drawer -->
        <div x-show="mobileOpen" x-transition
            class="fixed top-4 left-4 right-4 bg-white rounded-[2rem] shadow-2xl z-50 px-6 py-4 border border-gray-100 md:hidden text-gray-800">
            <div class="flex flex-col gap-0">
                <a href="/" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-gray-700 font-medium">Beranda</a>
                <a href="{{ route('tentang') }}" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-gray-700 font-medium">Tentang Program</a>
                <div x-data="{ showMitra: false }" class="py-3 border-b border-gray-100">
                    <button @click="showMitra = !showMitra" class="w-full flex items-center justify-between text-sm text-gray-700 font-medium">
                        <span>Mitra Program</span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform" :class="showMitra ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="showMitra" class="mt-3 space-y-2 pl-2">
                        <div class="text-xs font-bold text-gray-800 flex items-center gap-2"><i class="fa-solid fa-building-columns text-emerald-700"></i> Kemendikbudristek</div>
                        <div class="text-xs font-bold text-gray-800 flex items-center gap-2"><i class="fa-solid fa-graduation-cap text-emerald-700"></i> Perguruan Tinggi</div>
                        <div class="text-xs font-bold text-gray-800 flex items-center gap-2"><i class="fa-solid fa-users text-teal-700"></i> Tim PPK Ormawa</div>
                        <div class="text-xs font-bold text-gray-800 flex items-center gap-2"><i class="fa-solid fa-tree-city text-green-700"></i> Pemdes Gunungsari</div>
                    </div>
                </div>
                <a href="{{ route('modul') }}" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-gray-700 font-medium">Program Modul</a>
                <a href="{{ route('kegiatan.index') }}" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-sipetran-green font-bold">Kegiatan</a>
                <a href="{{ route('admin.login') }}" @click="mobileOpen=false" class="py-3 text-sm text-gray-700 font-medium flex items-center gap-2">
                    <i class="fa-solid fa-user-shield text-xs text-sipetran-green"></i> Admin Login
                </a>
            </div>
        </div>
    </header>

    <!-- ============ HERO HEADER (Dark Green Ghia Style with Photo Background) ============ -->
    <section class="relative bg-sipetran-green overflow-hidden pt-36 pb-40 text-center">

        <!-- PPK Ormawa Team Photograph Background with Dark Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero_team.png') }}" alt="PPK Ormawa Team" class="w-full h-full object-cover opacity-55 scale-105 filter brightness-110 contrast-105">
            <div class="absolute inset-0 bg-gradient-to-b from-sipetran-green/60 via-sipetran-green/50 to-sipetran-green/85"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <span class="text-xs font-bold text-emerald-300 uppercase tracking-[0.3em] mb-4 inline-block">ARSIP DOKUMENTASI LAPANGAN</span>

            <h1 class="font-display text-white text-5xl sm:text-6xl md:text-7xl font-black leading-tight tracking-tight">
                DOKUMENTASI
                <br>
                <span class="ghia-badge-green font-black my-2">KEGIATAN LAPANGAN</span>
            </h1>

            <p class="mt-6 text-green-200 text-base md:text-lg max-w-2xl mx-auto leading-relaxed font-body">
                Rekam jejak seluruh kegiatan lapangan program SIPETRAN di Desa Gunungsari — klik folder kegiatan untuk melihat galeri foto dan deskripsi lengkap.
            </p>

            <div class="mt-8 flex justify-center items-center gap-4">
                <div class="bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-6 py-2.5 flex items-center gap-3">
                    <i class="fa-solid fa-list-check text-emerald-300 text-sm"></i>
                    <span class="text-white font-bold text-xs">{{ $kegiatan->count() }} Total Kegiatan</span>
                </div>
                <a href="{{ route('admin.kegiatan.index') }}"
                    class="bg-emerald-800 hover:bg-emerald-700 text-white text-xs font-bold px-6 py-2.5 rounded-full transition-all shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-xs"></i>
                    Panel Admin
                </a>
            </div>
        </div>

        <div class="wave-separator">
            <svg viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,50 C240,100 480,0 720,50 C960,100 1200,0 1440,50 L1440,100 L0,100 Z" fill="#FAF8F2"/>
            </svg>
        </div>
    </section>

    <!-- ============ KEGIATAN GRID SECTION ============ -->
    <section class="bg-[#FAF8F2] pt-8 pb-24 px-6">
        <div class="max-w-6xl mx-auto">
            @if($kegiatan->isEmpty())
                <div class="text-center py-20 bg-white rounded-[2.5rem] border border-stone-200 p-12 max-w-md mx-auto shadow-sm">
                    <div class="w-20 h-20 bg-emerald-100 rounded-3xl flex items-center justify-center mx-auto mb-5">
                        <i class="fa-solid fa-folder-open text-emerald-800 text-3xl"></i>
                    </div>
                    <h3 class="font-display font-bold text-gray-900 text-2xl mb-2">Belum Ada Kegiatan</h3>
                    <p class="text-gray-500 text-sm mb-6 leading-relaxed font-body">Tambahkan dokumentasi kegiatan pertama melalui portal admin.</p>
                    <a href="{{ route('admin.kegiatan.create') }}"
                        class="inline-flex items-center gap-2 bg-sipetran-green text-white font-bold px-6 py-3 rounded-full hover:bg-sipetran-lightgreen transition-colors shadow-md text-xs">
                        <i class="fa-solid fa-plus text-xs"></i> Tambah Kegiatan
                    </a>
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
                    @foreach($kegiatan as $index => $item)
                    <div class="folder-card animate-fade-up flex flex-col items-center text-center group"
                        style="animation-delay: {{ $index * 0.05 }}s"
                        @click="openModal({{ json_encode([
                            'id'         => $item->id,
                            'judul'      => $item->judul,
                            'deskripsi'  => $item->deskripsi,
                            'tanggal'    => $item->tanggal,
                            'lokasi'     => $item->lokasi,
                            'urutan'     => $item->urutan,
                            'foto'       => $item->foto->map(fn($f) => [
                                'url'         => asset('storage/'.$f->path),
                                'keterangan'  => $f->keterangan,
                            ])->values()->toArray(),
                        ]) }})">

                        <!-- Folder SVG Icon -->
                        <div class="relative w-full aspect-[4/3] max-w-[130px]">
                            <svg viewBox="0 0 120 90" xmlns="http://www.w3.org/2000/svg" class="w-full h-full drop-shadow-md folder-body">
                                <rect x="0" y="18" width="120" height="72" rx="6" fill="#1b4332"/>
                                <path d="M0 18 Q0 10 8 10 L42 10 Q50 10 54 18 Z" fill="#2d6a4f"/>
                                <rect x="0" y="26" width="120" height="64" rx="6" fill="#2d6a4f"/>
                                <rect x="8" y="34" width="40" height="4" rx="2" fill="#b7e4c7" opacity="0.5"/>

                                @if($item->foto->isNotEmpty())
                                <rect x="20" y="42" width="80" height="36" rx="4" fill="#b7e4c7" opacity="0.6"/>
                                <text x="60" y="64" text-anchor="middle" font-size="10" fill="#1b4332" font-family="sans-serif" font-weight="bold" opacity="0.9">📷 {{ $item->foto->count() }}</text>
                                @endif
                            </svg>

                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="bg-black/20 rounded-2xl w-full h-full flex items-center justify-center backdrop-blur-[2px]">
                                    <i class="fa-solid fa-eye text-white text-2xl drop-shadow-lg"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Label -->
                        <div class="mt-3 max-w-[130px]">
                            <p class="text-[11px] font-bold text-gray-800 leading-tight line-clamp-3">
                                <span class="text-sipetran-green font-black">KEGIATAN {{ $item->urutan ?: $index + 1 }}.</span>
                                {{ $item->judul }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- ============ MODAL DETAIL KEGIATAN ============ -->
    <div x-show="modalOpen" x-transition.opacity
        class="fixed inset-0 z-[100] modal-backdrop flex items-center justify-center p-4"
        @click.self="closeModal()"
        style="display:none;">

        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto relative border border-stone-200">

            <button @click="closeModal()"
                class="absolute top-4 right-4 z-10 w-10 h-10 bg-stone-100 hover:bg-stone-200 rounded-full flex items-center justify-center text-gray-600 transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <template x-if="activeKegiatan">
                <div>
                    <div class="p-8 pb-4 border-b border-stone-100">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-folder-open text-emerald-800 text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-emerald-800 uppercase tracking-wider mb-1">
                                    Kegiatan <span x-text="activeKegiatan.urutan"></span>
                                </p>
                                <h2 class="font-display font-black text-gray-900 text-xl leading-tight" x-text="activeKegiatan.judul"></h2>
                                <div class="flex flex-wrap gap-3 mt-2.5">
                                    <template x-if="activeKegiatan.tanggal">
                                        <span class="inline-flex items-center gap-1.5 text-xs text-gray-600 font-medium">
                                            <i class="fa-solid fa-calendar-days text-sipetran-green"></i>
                                            <span x-text="activeKegiatan.tanggal"></span>
                                        </span>
                                    </template>
                                    <template x-if="activeKegiatan.lokasi">
                                        <span class="inline-flex items-center gap-1.5 text-xs text-gray-600 font-medium">
                                            <i class="fa-solid fa-location-dot text-sipetran-green"></i>
                                            <span x-text="activeKegiatan.lokasi"></span>
                                        </span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <template x-if="activeKegiatan.deskripsi">
                        <div class="px-8 py-5 border-b border-stone-100">
                            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Deskripsi Kegiatan</h3>
                            <p class="text-sm text-gray-700 leading-relaxed font-body" x-text="activeKegiatan.deskripsi"></p>
                        </div>
                    </template>

                    <div class="px-8 py-5">
                        <template x-if="activeKegiatan.foto && activeKegiatan.foto.length > 0">
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">
                                    Dokumentasi Foto (<span x-text="activeKegiatan.foto.length"></span> foto)
                                </h3>
                                <div class="gallery-scroll">
                                    <template x-for="(foto, i) in activeKegiatan.foto" :key="i">
                                        <div class="flex-shrink-0">
                                            <img :src="foto.url" :alt="foto.keterangan || 'Foto kegiatan'"
                                                class="h-52 w-72 object-cover rounded-2xl border border-stone-200 shadow-sm hover:opacity-90 transition-opacity"
                                                @click="openLightbox(foto.url)">
                                            <template x-if="foto.keterangan">
                                                <p class="text-xs text-gray-500 mt-1.5 text-center max-w-[11rem]" x-text="foto.keterangan"></p>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                        <template x-if="!activeKegiatan.foto || activeKegiatan.foto.length === 0">
                            <div class="text-center py-8">
                                <i class="fa-regular fa-image text-gray-300 text-4xl mb-2"></i>
                                <p class="text-gray-400 text-sm">Belum ada foto dokumentasi</p>
                            </div>
                        </template>
                    </div>

                    <div class="px-8 pb-6 flex justify-between items-center">
                        <a :href="'/admin/kegiatan/' + activeKegiatan.id + '/edit'"
                            class="inline-flex items-center gap-2 text-xs text-sipetran-green font-bold hover:underline">
                            <i class="fa-solid fa-pen-to-square"></i> Edit di Admin
                        </a>
                        <button @click="closeModal()"
                            class="px-6 py-2.5 bg-stone-100 hover:bg-stone-200 text-gray-700 font-bold text-sm rounded-2xl transition-colors">
                            Tutup
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- ============ LIGHTBOX ============ -->
    <div x-show="lightboxSrc" @click="closeLightbox()" class="lightbox" style="display:none;">
        <img :src="lightboxSrc" alt="Preview foto" x-show="lightboxSrc">
        <button class="absolute top-5 right-5 text-white text-3xl" @click="closeLightbox()">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <!-- ============ ULTRA FOOTER ============ -->
    <footer class="bg-[#FAF8F2] pt-20 pb-10 px-8 relative overflow-hidden">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 border-t border-stone-300/60 pt-16">
            <div class="md:col-span-1">
                <a href="/" class="inline-block mb-4">
                    <span class="font-handwriting text-4xl text-sipetran-green font-bold">Sipetran</span>
                </a>
                <p class="text-gray-600 text-xs leading-relaxed max-w-xs mb-4">
                    Sistem Informasi & Edukasi Kesehatan, Ekonomi Kreatif, dan Lingkungan Desa Gunungsari, Bondowoso — Jawa Timur.
                </p>
                <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-sipetran-green/10 px-3 py-1 rounded-full text-sipetran-green">
                    PPK ORMAWA 2026
                </span>
            </div>

            <div>
                <h4 class="font-display font-black text-gray-900 text-base mb-4">NAVIGASI</h4>
                <ul class="space-y-2.5 text-xs text-gray-600">
                    <li><a href="/" class="hover:text-sipetran-green font-medium">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}" class="hover:text-sipetran-green font-medium">Tentang Program</a></li>
                    <li><a href="{{ route('modul') }}" class="hover:text-sipetran-green font-medium">Program Modul PPK Ormawa</a></li>
                    <li><a href="{{ route('kegiatan.index') }}" class="hover:text-sipetran-green font-medium">Dokumentasi Kegiatan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-black text-gray-900 text-base mb-4">PORTAL AKSES</h4>
                <ul class="space-y-2.5 text-xs text-gray-600">
                    <li><a href="/#download" class="hover:text-sipetran-green font-medium flex items-center gap-1.5"><i class="fa-solid fa-download text-sipetran-green"></i> Unduh APK</a></li>
                    <li><a href="{{ route('admin.login') }}" class="hover:text-sipetran-green font-bold text-sipetran-green flex items-center gap-1.5"><i class="fa-solid fa-user-shield"></i> Portal Admin Login</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-black text-gray-900 text-base mb-4">SEKRETARIAT</h4>
                <p class="text-xs text-gray-600 leading-relaxed mb-3">
                    <i class="fa-solid fa-location-dot text-sipetran-green mr-1.5"></i>
                    Balai Desa Gunungsari, Kec. Maesan, Kab. Bondowoso, Jawa Timur 68262
                </p>
                <p class="text-xs text-gray-600">
                    <i class="fa-solid fa-envelope text-sipetran-green mr-1.5"></i>
                    ppkormawa.sipetran@gmail.com
                </p>
            </div>
        </div>

        <div class="mt-16 text-center select-none opacity-15 pointer-events-none">
            <span class="font-handwriting text-[120px] sm:text-[160px] md:text-[220px] text-sipetran-green leading-none">Sipetran</span>
        </div>

        <div class="max-w-6xl mx-auto border-t border-stone-200 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400">
            <p>&copy; {{ date('Y') }} SIPETRAN — Tim Pelaksana PPK ORMAWA Desa Gunungsari.</p>
        </div>
    </footer>

</body>
</html>
