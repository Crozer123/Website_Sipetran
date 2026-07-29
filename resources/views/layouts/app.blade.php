<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPETRAN - Sistem Informasi & Edukasi Kesehatan, Ekraf, dan Lingkungan</title>
    <meta name="description" content="Aplikasi Sipetran Desa Gunungsari - Panduan Kesehatan Posyandu, Resep Gizi Nugget SIJAGO, Kopi SILOKA, PHBS, Biopori, dan Pengelolaan Sampah.">
    <meta name="keywords" content="Sipetran, Gunungsari, Posyandu, PHBS, Nugget Sijago, Kopi Siloka, Biopori, Kompos EM4, Laravel">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        },
                        amber: {
                            500: '#f59e0b',
                            600: '#d97706',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .glass-dark {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-text {
            background: linear-gradient(135deg, #059669 0%, #10b981 50%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #064e3b 0%, #047857 50%, #065f46 100%);
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.35;
            z-index: 0;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased relative overflow-x-hidden" x-data="{ mobileMenuOpen: false }">

    <!-- Ambient Blobs -->
    <div class="blob w-96 h-96 bg-emerald-400 top-0 left-0 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="blob w-96 h-96 bg-amber-300 top-1/3 right-0 translate-x-1/3"></div>
    <div class="blob w-[30rem] h-[30rem] bg-teal-300 bottom-10 left-10"></div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 w-full glass-panel shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white shadow-lg shadow-emerald-600/30 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-leaf text-xl"></i>
                </div>
                <div>
                    <span class="font-heading font-extrabold text-2xl tracking-tight text-slate-900">SIPETRAN</span>
                    <span class="block text-xs font-semibold text-emerald-600 tracking-wider">DESA GUNUNGSARI</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-slate-600">
                <a href="#beranda" class="hover:text-emerald-600 transition-colors">Beranda</a>
                <a href="#fitur" class="hover:text-emerald-600 transition-colors">Fitur Utama</a>
                <a href="#modul" class="hover:text-emerald-600 transition-colors">Modul Interaktif</a>
                <a href="#phbs" class="hover:text-emerald-600 transition-colors">PHBS & Gizi</a>
                <a href="#lingkungan" class="hover:text-emerald-600 transition-colors">Lingkungan</a>
                <a href="#unduh" class="hover:text-emerald-600 transition-colors">Unduh App</a>
            </nav>

            <div class="hidden md:flex items-center gap-4">
                <a href="https://github.com/Crozer123/Sipetran.git" target="_blank" class="p-2.5 text-slate-600 hover:text-slate-900 transition-colors" title="GitHub Repository">
                    <i class="fa-brands fa-github text-xl"></i>
                </a>
                <a href="#unduh" class="px-5 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm shadow-md shadow-emerald-600/20 hover:shadow-lg transition-all flex items-center gap-2">
                    <i class="fa-solid fa-download"></i> Unduh APK
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-slate-700 focus:outline-none">
                <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark text-2xl' : 'fa-bars text-2xl'"></i>
            </button>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3">
            <a href="#beranda" @click="mobileMenuOpen = false" class="block py-2 text-slate-700 hover:text-emerald-600 font-medium">Beranda</a>
            <a href="#fitur" @click="mobileMenuOpen = false" class="block py-2 text-slate-700 hover:text-emerald-600 font-medium">Fitur Utama</a>
            <a href="#modul" @click="mobileMenuOpen = false" class="block py-2 text-slate-700 hover:text-emerald-600 font-medium">Modul Interaktif</a>
            <a href="#phbs" @click="mobileMenuOpen = false" class="block py-2 text-slate-700 hover:text-emerald-600 font-medium">PHBS & Gizi</a>
            <a href="#lingkungan" @click="mobileMenuOpen = false" class="block py-2 text-slate-700 hover:text-emerald-600 font-medium">Lingkungan</a>
            <a href="#unduh" @click="mobileMenuOpen = false" class="block py-2 text-slate-700 hover:text-emerald-600 font-medium">Unduh App</a>
            <div class="pt-2 flex flex-col gap-2">
                <a href="https://github.com/Crozer123/Sipetran.git" target="_blank" class="w-full text-center py-2.5 rounded-xl bg-slate-100 text-slate-700 font-semibold text-sm flex items-center justify-center gap-2">
                    <i class="fa-brands fa-github"></i> Repository GitHub
                </a>
                <a href="#unduh" @click="mobileMenuOpen = false" class="w-full text-center py-2.5 rounded-xl bg-emerald-600 text-white font-semibold text-sm flex items-center justify-center gap-2">
                    <i class="fa-solid fa-download"></i> Unduh APK Android
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 mt-24 relative z-10 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500 flex items-center justify-center text-slate-900 font-bold">
                            <i class="fa-solid fa-leaf text-lg"></i>
                        </div>
                        <span class="font-heading font-extrabold text-2xl text-white">SIPETRAN</span>
                    </div>
                    <p class="text-slate-400 text-sm max-w-md leading-relaxed">
                        Sistem Informasi & Edukasi Kesehatan, Ekonomi Kreatif, dan Lingkungan Desa Gunungsari. Aplikasi pendamping masyarakat untuk pencegahan stunting, pengembangan UMKM kopi & kuliner lokal, serta kelestarian lingkungan biopori & pemilahan sampah.
                    </p>
                    <div class="flex items-center gap-4 pt-2">
                        <a href="https://github.com/Crozer123/Sipetran.git" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-emerald-600 hover:text-white text-slate-400 flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-github text-lg"></i>
                        </a>
                        <a href="#unduh" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-emerald-600 hover:text-white text-slate-400 flex items-center justify-center transition-colors">
                            <i class="fa-solid fa-android text-lg"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-heading font-bold text-white mb-4">Navigasi Modul</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#sijago" class="hover:text-emerald-400 transition-colors">Nugget SIJAGO & Gizi</a></li>
                        <li><a href="#siloka" class="hover:text-emerald-400 transition-colors">Kopi SILOKA & UMKM</a></li>
                        <li><a href="#phbs" class="hover:text-emerald-400 transition-colors">10 Indikator PHBS</a></li>
                        <li><a href="#lingkungan" class="hover:text-emerald-400 transition-colors">Biopori & Kompos EM4</a></li>
                        <li><a href="#lingkungan" class="hover:text-emerald-400 transition-colors">Pembakar Sampah Minim Asap</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-heading font-bold text-white mb-4">Aplikasi Mobile</h4>
                    <p class="text-sm text-slate-400 mb-4">Dapatkan aplikasi Sipetran versi Android langsung melalui repository official GitHub.</p>
                    <a href="https://github.com/Crozer123/Sipetran.git" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-xs shadow-lg transition-colors">
                        <i class="fa-brands fa-github text-base"></i> Github Sipetran Repository
                    </a>
                </div>
            </div>

            <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} SIPETRAN Desa Gunungsari. Built with Laravel & Tailwind CSS.</p>
                <p>Dikembangkan untuk Inovasi Kesehatan, Ekraf & Lingkungan Desa.</p>
            </div>
        </div>
    </footer>

</body>
</html>
