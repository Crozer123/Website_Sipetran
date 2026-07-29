<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPETRAN - Sistem Informasi & Edukasi Kesehatan, Ekraf, dan Lingkungan</title>
    <meta name="description" content="Aplikasi Sipetran Desa Gunungsari - Panduan Kesehatan Posyandu, Resep Gizi Nugget SIJAGO, Kopi SILOKA, PHBS, Biopori, dan Pengelolaan Sampah.">

    <!-- Google Fonts: DM Sans + Inter (mengikuti style LastBite) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,500;9..40,600;9..40,700;9..40,800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['DM Sans', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        sipetran: {
                            green: '#2b5219',
                            lightgreen: '#4a7c2f',
                            orange: '#d97706',
                            darkorange: '#b45309',
                            bg: '#f9f7f4',
                            cardbg: '#F7FBF7',
                        }
                    },
                    borderRadius: {
                        '3xl': '1.5rem',
                        '4xl': '2rem',
                        '5xl': '2.5rem',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body { background-color: #f9f7f4; }
        .active-tab {
            background: #fff;
            color: #2b5219;
            box-shadow: 0 1px 8px rgba(0,0,0,0.08);
        }
    </style>
</head>

<body class="bg-sipetran-bg font-body text-gray-800 antialiased">

    <div class="min-h-screen">

    <!-- ============ NAVIGATION ============ -->
    <header class="relative z-50" x-data="{ mobileOpen: false }">
        <nav class="flex items-center justify-between py-5 px-6 max-w-6xl mx-auto">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2.5 hover:opacity-80 transition-opacity">
                <div class="w-10 h-10 rounded-2xl bg-sipetran-green flex items-center justify-center text-white">
                    <i class="fa-solid fa-leaf text-lg"></i>
                </div>
                <div>
                    <div class="font-heading font-bold text-xl text-gray-900 leading-none">SIPETRAN</div>
                    <div class="text-[10px] font-semibold text-sipetran-lightgreen tracking-wider">DESA GUNUNGSARI</div>
                </div>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-8 font-body text-sm font-medium text-gray-700">
                <a href="#modul" class="hover:text-sipetran-green transition-colors">Modul</a>
                <a href="#kesehatan" class="hover:text-sipetran-green transition-colors">Kesehatan</a>
                <a href="#ekraf" class="hover:text-sipetran-green transition-colors">Ekonomi Kreatif</a>
                <a href="#lingkungan" class="hover:text-sipetran-green transition-colors">Lingkungan</a>
                <a href="#unduh" class="bg-sipetran-green text-white font-semibold px-5 py-2.5 rounded-2xl hover:bg-sipetran-lightgreen transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-download text-xs"></i> Unduh Aplikasi
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 text-gray-900">
                <i class="fa-solid text-xl" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" x-transition
            class="fixed top-4 left-4 right-4 bg-white rounded-[2rem] shadow-2xl z-50 px-6 py-4 border border-gray-100 md:hidden">
            <div class="flex flex-col gap-0">
                <a href="#modul" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-gray-700 font-medium">Modul</a>
                <a href="#kesehatan" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-gray-700 font-medium">Kesehatan</a>
                <a href="#ekraf" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-gray-700 font-medium">Ekonomi Kreatif</a>
                <a href="#lingkungan" @click="mobileOpen=false" class="py-3 border-b border-gray-100 text-sm text-gray-700 font-medium">Lingkungan</a>
                <a href="#unduh" @click="mobileOpen=false" class="mt-4 mb-2 bg-sipetran-green text-white font-semibold px-5 py-3 rounded-2xl text-center text-sm">
                    <i class="fa-solid fa-download mr-1.5"></i> Unduh Aplikasi
                </a>
            </div>
        </div>
    </header>

    <!-- ============ HERO SECTION ============ -->
    <main>
        <section class="max-w-6xl mx-auto px-6 py-10 md:py-16 flex flex-col md:flex-row items-center gap-14">

            <!-- LEFT: Text Content -->
            <div class="flex-1 space-y-6">
                <div class="inline-flex items-center gap-2 bg-amber-100 text-amber-800 text-xs font-semibold px-4 py-2 rounded-full">
                    <i class="fa-solid fa-map-pin text-amber-600"></i>
                    Desa Gunungsari, Bondowoso — Jawa Timur
                </div>

                <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl font-bold leading-[1.1] text-gray-900">
                    Sehat, Sejahtera,<br>
                    <span class="text-sipetran-orange">Berdaya Ekraf.</span><br>
                    <span class="text-sipetran-green">Lestari Lingkungan.</span>
                </h1>

                <p class="text-gray-600 font-body text-sm leading-relaxed max-w-md">
                    Sipetran menghadirkan panduan gizi berbasis pangan lokal, resep Nugget SIJAGO & Kopi SILOKA, edukasi PHBS, serta modul pengelolaan lingkungan, semuanya dalam satu aplikasi untuk warga Desa Gunungsari. 🌱
                </p>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="#unduh" class="bg-sipetran-green text-white font-semibold px-6 py-3.5 rounded-2xl flex justify-center items-center gap-2 hover:bg-sipetran-lightgreen transition-colors">
                        <i class="fa-solid fa-cloud-arrow-down text-base"></i>
                        Unduh Aplikasi (.APK)
                    </a>
                    <a href="#modul" class="bg-white border-2 border-gray-100 text-gray-800 font-semibold px-6 py-3.5 rounded-2xl flex justify-center items-center gap-2 shadow-sm hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-layer-group text-sipetran-green"></i>
                        Jelajahi Modul
                    </a>
                </div>
            </div>

            <!-- RIGHT: Visual Card (gaya LastBite) -->
            <div class="flex-1 w-full max-w-sm mx-auto md:max-w-none">
                <div class="bg-sipetran-green rounded-[2.5rem] p-6 pb-10 relative shadow-xl w-full">

                    <!-- Floating badge top right -->
                    <div class="absolute -top-4 right-4 md:top-4 md:-right-6 bg-white rounded-2xl px-3 py-2 flex items-center gap-3 shadow-lg z-10 border border-gray-100">
                        <div class="bg-amber-100 text-amber-700 rounded-full w-9 h-9 flex items-center justify-center font-bold text-xs">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <div class="pr-2">
                            <p class="text-[10px] text-gray-400 font-semibold mb-0.5">Kandungan Gizi</p>
                            <p class="font-bold text-gray-900 text-sm leading-none">266.37 kkal</p>
                        </div>
                    </div>

                    <!-- Cards grid inside hero visual -->
                    <div class="grid grid-cols-2 gap-3 mt-8 mb-6">
                        <div class="bg-white/15 rounded-3xl p-4 border border-white/20 backdrop-blur-sm">
                            <div class="w-8 h-8 bg-amber-400 rounded-xl flex items-center justify-center text-white text-xs mb-2.5">
                                <i class="fa-solid fa-bowl-food"></i>
                            </div>
                            <p class="text-white font-heading font-bold text-xs leading-tight">Nugget SIJAGO</p>
                            <p class="text-green-200 text-[10px] mt-0.5">Protein 13.81g</p>
                        </div>
                        <div class="bg-white/15 rounded-3xl p-4 border border-white/20 backdrop-blur-sm">
                            <div class="w-8 h-8 bg-amber-400 rounded-xl flex items-center justify-center text-white text-xs mb-2.5">
                                <i class="fa-solid fa-mug-hot"></i>
                            </div>
                            <p class="text-white font-heading font-bold text-xs leading-tight">Kopi SILOKA</p>
                            <p class="text-green-200 text-[10px] mt-0.5">Robusta + Jahe</p>
                        </div>
                        <div class="bg-white/15 rounded-3xl p-4 border border-white/20 backdrop-blur-sm">
                            <div class="w-8 h-8 bg-teal-400 rounded-xl flex items-center justify-center text-white text-xs mb-2.5">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <p class="text-white font-heading font-bold text-xs leading-tight">PHBS & Gizi</p>
                            <p class="text-green-200 text-[10px] mt-0.5">10 Indikator</p>
                        </div>
                        <div class="bg-white/15 rounded-3xl p-4 border border-white/20 backdrop-blur-sm">
                            <div class="w-8 h-8 bg-sky-400 rounded-xl flex items-center justify-center text-white text-xs mb-2.5">
                                <i class="fa-solid fa-recycle"></i>
                            </div>
                            <p class="text-white font-heading font-bold text-xs leading-tight">Biopori & Kompos</p>
                            <p class="text-green-200 text-[10px] mt-0.5">Modul Lingkungan</p>
                        </div>
                    </div>

                    <!-- Bottom floating pill -->
                    <div class="absolute -bottom-5 left-1/2 -translate-x-1/2 bg-white rounded-full p-1.5 flex items-center gap-3 pr-5 shadow-lg border border-gray-50 w-max">
                        <div class="bg-sipetran-green text-white w-9 h-9 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-leaf text-sm"></i>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-medium mb-0.5">Sipetran</p>
                            <p class="font-bold text-gray-900 text-xs leading-none">4 Modul Terintegrasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ TWO-PILLAR SECTION ============ -->
        <div class="bg-sipetran-cardbg pt-10 pb-20 mt-6">
            <section class="max-w-6xl mx-auto px-6" id="modul">
                <div class="mb-12 max-w-xl">
                    <h2 class="font-heading text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4">
                        Satu <span class="text-sipetran-green"> Aplikasi, </span> <br>
                        Untuk Semua.
                    </h2>
                    <p class="text-gray-600 font-body text-sm md:text-base leading-relaxed">
                        <span class="font-semibold text-gray-900">Sipetran</span> mendampingi warga Desa Gunungsari membangun kehidupan yang sehat, produktif, dan berwawasan lingkungan.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Card 1: Gizi & Kuliner -->
                    <div class="rounded-4xl p-8 shadow-sm border flex flex-col h-full relative overflow-hidden bg-white border-gray-100">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 bg-amber-50 text-amber-600">
                            <i class="fa-solid fa-bowl-food text-2xl"></i>
                        </div>
                        <h3 class="font-heading text-2xl font-bold text-gray-900 mb-3">Gizi & Kuliner Lokal</h3>
                        <p class="font-body text-sm leading-relaxed mb-8 text-gray-500">
                            Resep dan kalkulasi gizi Nugget SIJAGO berbasis Jagung + Singkong + Kelor untuk pencegahan stunting. Lengkap dengan takaran bahan dan panduan langkah demi langkah.
                        </p>
                        <ul class="space-y-4 mb-10 flex-1">
                            <li class="flex gap-3 font-body text-sm font-medium text-gray-800">
                                <i class="fa-solid fa-circle-check text-sipetran-orange mt-0.5 flex-shrink-0"></i>
                                Kalkulator gizi & %AKG akurat (23% Protein AKG)
                            </li>
                            <li class="flex gap-3 font-body text-sm font-medium text-gray-800">
                                <i class="fa-solid fa-circle-check text-sipetran-orange mt-0.5 flex-shrink-0"></i>
                                Resep berbasis pangan lokal Desa Gunungsari
                            </li>
                            <li class="flex gap-3 font-body text-sm font-medium text-gray-800">
                                <i class="fa-solid fa-circle-check text-sipetran-orange mt-0.5 flex-shrink-0"></i>
                                Panduan pembuatan langkah per langkah
                            </li>
                        </ul>
                        <a href="#sijago" class="font-semibold py-3.5 rounded-2xl w-full transition-colors inline-block text-center bg-[#2B3019] hover:bg-black text-white text-sm">
                            Lihat Resep SIJAGO
                        </a>
                    </div>

                    <!-- Card 2: Ekraf Kopi -->
                    <div class="rounded-4xl p-8 shadow-sm border flex flex-col h-full relative overflow-hidden bg-[#F5F8F2] border-green-100/50">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 bg-sipetran-green/10 text-sipetran-green">
                            <i class="fa-solid fa-mug-hot text-2xl"></i>
                        </div>
                        <h3 class="font-heading text-2xl font-bold text-gray-900 mb-3">Ekonomi Kreatif</h3>
                        <p class="font-body text-sm leading-relaxed mb-8 text-amber-800 font-medium">
                            Kopi SILOKA — Robusta Gunungsari + Jahe + Sereh! Panduan lengkap dari roasting hingga strategi pemasaran digital untuk meningkatkan nilai tambah produk UMKM lokal.
                        </p>
                        <ul class="space-y-4 mb-10 flex-1">
                            <li class="flex gap-3 font-body text-sm font-medium text-gray-800">
                                <i class="fa-solid fa-circle-check text-sipetran-green mt-0.5 flex-shrink-0"></i>
                                Formulasi kopi rempah khas Gunungsari
                            </li>
                            <li class="flex gap-3 font-body text-sm font-medium text-gray-800">
                                <i class="fa-solid fa-circle-check text-sipetran-green mt-0.5 flex-shrink-0"></i>
                                Panduan roasting, resting 4–7 hari & rasio seduh
                            </li>
                            <li class="flex gap-3 font-body text-sm font-medium text-gray-800">
                                <i class="fa-solid fa-circle-check text-sipetran-green mt-0.5 flex-shrink-0"></i>
                                Strategi pemasaran offline & digital UMKM
                            </li>
                        </ul>
                        <a href="#siloka" class="font-semibold py-3.5 rounded-2xl w-full transition-colors inline-block text-center bg-sipetran-green hover:bg-sipetran-lightgreen text-white text-sm">
                            Lihat Panduan SILOKA
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- ============ HOW IT WORKS / INTERACTIVE MODULES ============ -->
        <section class="py-20 bg-white" id="cara-kerja" x-data="{ activeTab: 'sijago' }">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="font-heading text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Isi Modul <span class="text-sipetran-green">Sipetran</span>
                    </h2>
                    <p class="font-body text-gray-500 text-sm md:text-base max-w-xl mx-auto">
                        Pilih kategori modul di bawah untuk melihat panduan lengkap resep, kesehatan, maupun lingkungan.
                    </p>
                </div>

                <!-- Tab Toggle (gaya LastBite) -->
                <div class="flex justify-center mb-12">
                    <div class="bg-gray-100 p-1 rounded-2xl flex gap-1 font-body flex-wrap justify-center">
                        <button @click="activeTab='sijago'"
                            :class="activeTab==='sijago' ? 'active-tab' : 'text-gray-500'"
                            class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                            🌽 Nugget SIJAGO
                        </button>
                        <button @click="activeTab='siloka'"
                            :class="activeTab==='siloka' ? 'active-tab' : 'text-gray-500'"
                            class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                            ☕ Kopi SILOKA
                        </button>
                        <button @click="activeTab='phbs'"
                            :class="activeTab==='phbs' ? 'active-tab' : 'text-gray-500'"
                            class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                            🏥 PHBS & Kesehatan
                        </button>
                        <button @click="activeTab='lingkungan'"
                            :class="activeTab==='lingkungan' ? 'active-tab' : 'text-gray-500'"
                            class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                            🌱 Lingkungan
                        </button>
                    </div>
                </div>

                <!-- TAB: NUGGET SIJAGO -->
                <div x-show="activeTab==='sijago'" x-transition id="sijago">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-sipetran-cardbg border border-amber-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">1</span>
                            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-seedling text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Siapkan Bahan</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">Jagung segar 35g, Kelor 15g, Dada Ayam 30g, Tepung Tapioka 10g, Telur 15g, Bumbu secukupnya.</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-sipetran-cardbg border border-amber-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">2</span>
                            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-blender text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Haluskan & Campur</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">Haluskan jagung & kelor. Campurkan adonan ayam, telur, terigu, tapioka, dan bumbu hingga merata.</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-sipetran-cardbg border border-amber-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">3</span>
                            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-fire-burner text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Kukus 25–30 Menit</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">Tuang adonan ke loyang yang sudah diolesi minyak lalu kukus hingga matang sempurna.</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-sipetran-cardbg border border-amber-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">4</span>
                            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-star text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Goreng & Sajikan</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">Potong ±25g, balur tepung panir, goreng api sedang hingga kuning keemasan. Siap disajikan!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nutrition Info Cards -->
                    <div class="mt-8 grid grid-cols-2 sm:grid-cols-5 gap-4">
                        <div class="bg-amber-50 border border-amber-100 p-4 rounded-3xl text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Energi</p>
                            <p class="font-heading font-bold text-xl text-gray-900">266.37</p>
                            <p class="text-xs text-gray-400">kkal (11.8% AKG)</p>
                        </div>
                        <div class="bg-emerald-50 border border-emerald-100 p-4 rounded-3xl text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Protein</p>
                            <p class="font-heading font-bold text-xl text-gray-900">13.81g</p>
                            <p class="text-xs text-emerald-600 font-semibold">23% AKG</p>
                        </div>
                        <div class="bg-blue-50 border border-blue-100 p-4 rounded-3xl text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Karbohidrat</p>
                            <p class="font-heading font-bold text-xl text-gray-900">42.7g</p>
                            <p class="text-xs text-gray-400">11.9% AKG</p>
                        </div>
                        <div class="bg-red-50 border border-red-100 p-4 rounded-3xl text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Lemak</p>
                            <p class="font-heading font-bold text-xl text-gray-900">5.11g</p>
                            <p class="text-xs text-gray-400">7.9% AKG</p>
                        </div>
                        <div class="bg-purple-50 border border-purple-100 p-4 rounded-3xl text-center">
                            <p class="text-[10px] font-semibold text-gray-500 mb-1">Zat Besi</p>
                            <p class="font-heading font-bold text-xl text-gray-900">2.75mg</p>
                            <p class="text-xs text-purple-600 font-semibold">15.3% AKG</p>
                        </div>
                    </div>
                </div>

                <!-- TAB: KOPI SILOKA -->
                <div x-show="activeTab==='siloka'" x-transition id="siloka">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-[#F5F8F2] border border-green-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">1</span>
                            <div class="w-12 h-12 rounded-2xl bg-sipetran-green/10 text-sipetran-green flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-sun text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Jemur & Kupas</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">Jemur buah kopi matang hingga kadar air 12–13%. Kupas kulit untuk memperoleh green bean pilihan.</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-[#F5F8F2] border border-green-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">2</span>
                            <div class="w-12 h-12 rounded-2xl bg-sipetran-green/10 text-sipetran-green flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-fire text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Roasting Medium</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">Sangrai green bean pada tingkat medium hingga aroma khas kopi keluar. Dinginkan, lalu resting 4–7 hari.</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-[#F5F8F2] border border-green-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">3</span>
                            <div class="w-12 h-12 rounded-2xl bg-sipetran-green/10 text-sipetran-green flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-mortar-pestle text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Giling & Campurkan</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">Giling kopi, campurkan dengan bubuk jahe kering & bubuk sereh sesuai formulasi SILOKA secara merata.</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-start gap-4 p-6 rounded-4xl bg-[#F5F8F2] border border-green-100 relative">
                            <span class="absolute top-4 right-5 font-heading font-bold text-5xl text-gray-100 select-none leading-none">4</span>
                            <div class="w-12 h-12 rounded-2xl bg-sipetran-green/10 text-sipetran-green flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-mug-hot text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-gray-900 mb-1">Seduh & Nikmati</h3>
                                <p class="font-body text-xs text-gray-500 leading-relaxed">10g bubuk SILOKA + 250ml air 90–95°C. Diamkan 2–3 menit, aduk rata, sajikan selagi hangat.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB: PHBS -->
                <div x-show="activeTab==='phbs'" x-transition id="kesehatan">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                        @php
                        $phbs = [
                            'Persalinan ditolong tenaga kesehatan',
                            'Memberi ASI eksklusif kepada bayi',
                            'Menimbang balita setiap bulan',
                            'Ketersediaan air bersih di rumah',
                            'Cuci tangan pakai sabun & air mengalir',
                            'Menggunakan jamban sehat',
                            'Memberantas jentik nyamuk secara berkala',
                            'Konsumsi buah & sayur setiap hari',
                            'Aktivitas fisik setiap hari minimal 30 menit',
                            'Tidak merokok di dalam rumah',
                        ];
                        @endphp
                        @foreach($phbs as $i => $item)
                        <div class="flex flex-col justify-between p-5 rounded-4xl bg-sipetran-cardbg border border-green-100 hover:bg-teal-50 hover:border-teal-200 transition-colors">
                            <span class="w-8 h-8 rounded-full bg-teal-600 text-white font-bold text-xs flex items-center justify-center mb-3">{{ $i + 1 }}</span>
                            <p class="text-xs font-semibold text-gray-800 leading-snug">{{ $item }}</p>
                        </div>
                        @endforeach
                    </div>

                    <!-- Handwashing & Oralit -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div class="bg-sipetran-cardbg rounded-4xl p-6 border border-green-100">
                            <h4 class="font-heading font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-hands-bubbles text-teal-600"></i>
                                6 Langkah Cuci Tangan WHO
                            </h4>
                            <div class="grid grid-cols-2 gap-2.5">
                                @foreach(['Gosok sabun pada kedua telapak tangan', 'Gosok kedua punggung tangan bergantian', 'Gosok sela-sela jari hingga bersih', 'Bersihkan ujung jari dengan posisi mengunci', 'Gosok & putar kedua ibu jari bergantian', 'Gosok telapak tangan dengan ujung jari memutar'] as $c => $step)
                                <div class="flex items-start gap-2 p-3 bg-white rounded-2xl border border-slate-100 text-xs text-gray-700">
                                    <span class="font-bold text-teal-600 shrink-0">{{ $c + 1 }}.</span>
                                    <span>{{ $step }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="bg-sipetran-green rounded-4xl p-6 text-white">
                            <h4 class="font-heading font-bold mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-glass-water text-green-200"></i>
                                Panduan Larutan Oralit Darurat
                            </h4>
                            <p class="text-green-200 text-xs mb-4">Pertolongan pertama untuk mencegah dehidrasi akibat diare pada balita dan anggota keluarga:</p>
                            <ul class="space-y-2.5 text-sm text-green-100">
                                @foreach(['Siapkan air matang hangat sebanyak 1 gelas (200 ml)', 'Tambahkan gula pasir 1 sendok teh penuh', 'Tambahkan garam dapur ¼ sendok teh', 'Aduk hingga semua bahan larut sempurna'] as $step)
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-green-400 mt-0.5 shrink-0 text-xs"></i> {{ $step }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- TAB: LINGKUNGAN -->
                <div x-show="activeTab==='lingkungan'" x-transition id="lingkungan">
                    <!-- Waste Classification -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="p-5 rounded-4xl bg-emerald-50 border border-emerald-200">
                            <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider block mb-2">1. Sampah Organik</span>
                            <p class="text-xs text-gray-600 mb-3">Mudah terurai — sisa makanan, daun, sayur, kulit buah.</p>
                            <span class="text-[10px] font-bold bg-emerald-600 text-white px-2.5 py-1 rounded-full">→ Kompos / Biopori</span>
                        </div>
                        <div class="p-5 rounded-4xl bg-amber-50 border border-amber-200">
                            <span class="text-xs font-bold text-amber-800 uppercase tracking-wider block mb-2">2. Sampah Anorganik</span>
                            <p class="text-xs text-gray-600 mb-3">Sulit terurai — botol plastik, kaleng, kertas, kardus.</p>
                            <span class="text-[10px] font-bold bg-amber-600 text-white px-2.5 py-1 rounded-full">→ Daur Ulang / Bank Sampah</span>
                        </div>
                        <div class="p-5 rounded-4xl bg-red-50 border border-red-200">
                            <span class="text-xs font-bold text-red-800 uppercase tracking-wider block mb-2">3. Limbah B3</span>
                            <p class="text-xs text-gray-600 mb-3">Berbahaya & beracun — baterai, popok, tisu, puntung.</p>
                            <span class="text-[10px] font-bold bg-red-600 text-white px-2.5 py-1 rounded-full">→ TPS Khusus B3</span>
                        </div>
                        <div class="p-5 rounded-4xl bg-slate-100 border border-slate-300">
                            <span class="text-xs font-bold text-slate-800 uppercase tracking-wider block mb-2">4. Sampah Residu</span>
                            <p class="text-xs text-gray-600 mb-3">Tidak dapat didaur ulang kembali dalam kondisi apapun.</p>
                            <span class="text-[10px] font-bold bg-slate-700 text-white px-2.5 py-1 rounded-full">→ TPA Sesuai Ketentuan</span>
                        </div>
                    </div>

                    <!-- Biopori & Incinerator -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="bg-sipetran-cardbg border border-green-100 p-6 rounded-4xl">
                            <h4 class="font-heading font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-bore-hole text-sipetran-green"></i>
                                Lubang Biopori — Spesifikasi Teknis
                            </h4>
                            <div class="space-y-2.5 text-xs text-gray-700">
                                <div class="flex items-center justify-between bg-white p-3 rounded-2xl border border-gray-100">
                                    <span class="font-semibold">Diameter Lubang</span>
                                    <span class="font-bold text-sipetran-green">± 10 cm (Pipa PVC)</span>
                                </div>
                                <div class="flex items-center justify-between bg-white p-3 rounded-2xl border border-gray-100">
                                    <span class="font-semibold">Kedalaman</span>
                                    <span class="font-bold text-sipetran-green">80 – 100 cm</span>
                                </div>
                                <div class="flex items-center justify-between bg-white p-3 rounded-2xl border border-gray-100">
                                    <span class="font-semibold">Isian</span>
                                    <span class="font-bold text-gray-700">Sampah Organik (daun/rumput)</span>
                                </div>
                                <p class="text-gray-500 leading-relaxed pt-1">Air hujan meresap melalui pori alami tanah, sampah organik diurai menjadi kompos oleh fauna tanah (cacing).</p>
                            </div>
                        </div>
                        <div class="bg-sipetran-green rounded-4xl p-6 text-white">
                            <h4 class="font-heading font-bold mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-fire text-amber-300"></i>
                                Incinerator Drum — Pembakaran Minim Asap
                            </h4>
                            <p class="text-green-200 text-xs mb-4 leading-relaxed">Dibuat dari drum bekas berkaki & roda dengan sirkulasi udara bawah dan cerobong asap untuk pembakaran lebih sempurna.</p>
                            <div class="grid grid-cols-2 gap-3 text-xs">
                                <div class="bg-emerald-900/60 border border-emerald-600/40 p-3 rounded-2xl">
                                    <span class="font-bold text-emerald-300 block mb-1"><i class="fa-solid fa-circle-check mr-1"></i>Boleh Dibakar</span>
                                    <span class="text-green-200">Daun kering, ranting kecil, rumput, serasah tanaman.</span>
                                </div>
                                <div class="bg-red-900/40 border border-red-500/40 p-3 rounded-2xl">
                                    <span class="font-bold text-red-300 block mb-1"><i class="fa-solid fa-circle-xmark mr-1"></i>Dilarang Keras</span>
                                    <span class="text-red-200">Plastik, karet, styrofoam, kaleng, kaca, B3.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============ DOWNLOAD CTA ============ -->
        <section class="py-20 px-6" id="unduh">
            <div class="max-w-6xl mx-auto">
                <div class="bg-sipetran-green rounded-[3rem] px-8 md:px-16 py-14 md:py-20 relative overflow-hidden flex flex-col md:flex-row items-center gap-10 md:gap-16">
                    <!-- Decorative blobs -->
                    <div class="absolute -top-20 -right-20 w-72 h-72 bg-sipetran-lightgreen/20 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-20 -left-10 w-56 h-56 bg-amber-400/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="flex-1 relative z-10">
                        <span class="inline-block text-xs font-semibold text-green-300 bg-sipetran-lightgreen/20 px-4 py-2 rounded-full mb-6 font-body border border-green-600/30">
                            🌱 Gratis untuk Warga Desa!
                        </span>
                        <h2 class="font-heading text-4xl md:text-5xl font-bold text-white leading-tight mb-4">
                            Mulai Belajar,<br>Mulai <span class="text-sipetran-orange">Berkembang</span>.
                        </h2>
                        <p class="font-body text-green-200 text-sm md:text-base leading-relaxed max-w-md">
                            Unduh aplikasi Sipetran dan akses semua modul gizi, ekonomi kreatif, serta lingkungan kapan saja dan di mana saja — langsung di smartphone Anda.
                        </p>
                    </div>

                    <div class="relative z-10 flex flex-col gap-4 w-full md:w-auto">
                        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 backdrop-blur-sm">
                            <p class="text-white font-heading font-bold mb-4 text-sm">Dapatkan Aplikasi</p>
                            <div class="flex flex-col gap-3">
                                <a href="https://github.com/Crozer123/Sipetran.git" target="_blank"
                                    class="flex items-center justify-center gap-3 bg-white text-gray-900 px-8 py-4 rounded-xl font-bold text-sm hover:bg-gray-50 transition-all hover:scale-[1.02] group">
                                    <i class="fa-solid fa-download text-sipetran-green text-base"></i>
                                    Unduh Sipetran (.APK)
                                    <i class="fa-solid fa-arrow-right text-gray-400 text-xs ml-auto group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                        <p class="text-green-300 text-xs text-center">Kompatibel Android 7.0+ (Nougat ke atas)</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ============ FOOTER ============ -->
    <footer class="bg-sipetran-green text-white pt-16 pb-8 px-8 rounded-t-[3rem] md:rounded-t-[4rem]">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-8">
            <div class="md:col-span-1">
                <div class="flex items-center gap-2.5 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <i class="fa-solid fa-leaf text-white text-lg"></i>
                    </div>
                    <span class="font-heading font-extrabold text-xl">SIPETRAN</span>
                </div>
                <p class="text-green-100 font-body text-sm leading-relaxed max-w-xs">
                    Sistem Informasi & Edukasi Kesehatan, Ekonomi Kreatif, dan Lingkungan Desa Gunungsari, Bondowoso.
                </p>
            </div>

            <div>
                <h4 class="font-heading font-bold text-lg mb-5">Navigasi</h4>
                <ul class="space-y-4 font-body text-green-200 text-sm">
                    <li><a href="#sijago" class="hover:text-white transition-colors">Nugget SIJAGO & Gizi</a></li>
                    <li><a href="#siloka" class="hover:text-white transition-colors">Kopi SILOKA & UMKM</a></li>
                    <li><a href="#kesehatan" class="hover:text-white transition-colors">10 Indikator PHBS</a></li>
                    <li><a href="#lingkungan" class="hover:text-white transition-colors">Modul Lingkungan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-heading font-bold text-lg mb-5">Modul</h4>
                <ul class="space-y-4 font-body text-green-200 text-sm">
                    <li><a href="#lingkungan" class="hover:text-white transition-colors">Biopori & Kompos EM4</a></li>
                    <li><a href="#lingkungan" class="hover:text-white transition-colors">Pemilahan Sampah</a></li>
                    <li><a href="#lingkungan" class="hover:text-white transition-colors">Reboisasi Lahan</a></li>
                    <li><a href="#lingkungan" class="hover:text-white transition-colors">Incinerator Minim Asap</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-heading font-bold text-lg mb-5">Sipetran</h4>
                <ul class="space-y-4 font-body text-green-200 text-sm">
                    <li><a href="#unduh" class="hover:text-white transition-colors">Unduh Aplikasi</a></li>
                    <li><a href="https://github.com/Crozer123/Sipetran.git" target="_blank" class="hover:text-white transition-colors">Repository GitHub</a></li>
                </ul>
            </div>
        </div>

        <div class="max-w-6xl mx-auto mt-16 pt-8 border-t border-white/20 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <p class="font-body text-green-300 text-xs">
                &copy; {{ date('Y') }} SIPETRAN — Desa Gunungsari, Bondowoso.
            </p>
            <div class="flex gap-4 text-green-300">
                <a href="https://github.com/Crozer123/Sipetran.git" target="_blank" class="hover:text-white transition-colors" aria-label="GitHub">
                    <i class="fa-brands fa-github text-xl"></i>
                </a>
            </div>
        </div>
    </footer>

    </div>
</body>
</html>
