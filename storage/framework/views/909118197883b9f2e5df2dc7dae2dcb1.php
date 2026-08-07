<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kegiatan — SIPETRAN Admin</title>
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
    </style>
</head>
<body class="font-body text-gray-800 antialiased">

    <!-- Top Bar -->
    <header class="bg-sipetran-green text-white px-6 py-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.kegiatan.index')); ?>" class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-colors">
                <i class="fa-solid fa-arrow-left text-sm"></i>
            </a>
            <div>
                <p class="font-heading font-bold text-base leading-none">Tambah Kegiatan Baru</p>
                <p class="text-green-300 text-[10px]">SIPETRAN Admin Panel</p>
            </div>
        </div>
        <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="inline">
            <?php echo csrf_field(); ?>
            <button type="submit" class="bg-white/10 hover:bg-white/20 text-white text-xs px-4 py-2 rounded-xl transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </header>

    <main class="max-w-3xl mx-auto px-6 py-8">
        <form method="POST" action="<?php echo e(route('admin.kegiatan.store')); ?>" enctype="multipart/form-data" id="form-kegiatan">
            <?php echo csrf_field(); ?>

            <!-- Card: Info Dasar -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-7 mb-5">
                <h2 class="font-heading font-bold text-gray-900 text-lg mb-5 flex items-center gap-2">
                    <span class="w-7 h-7 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600 text-sm">
                        <i class="fa-solid fa-circle-info"></i>
                    </span>
                    Informasi Kegiatan
                </h2>

                <div class="space-y-4">
                    <!-- Urutan & Judul (grid) -->
                    <div class="grid grid-cols-[100px_1fr] gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">No. Urutan</label>
                            <input type="number" name="urutan" value="<?php echo e(old('urutan', $nextUrutan)); ?>" min="1"
                                class="input-field w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Judul Kegiatan <span class="text-red-400">*</span></label>
                            <input type="text" name="judul" value="<?php echo e(old('judul')); ?>"
                                placeholder="Contoh: Koordinasi dengan Kelompok Petani Kopi..."
                                class="input-field w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-gray-50" required>
                            <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-400 text-xs mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Tanggal & Lokasi -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Tanggal Kegiatan</label>
                            <input type="text" name="tanggal" value="<?php echo e(old('tanggal')); ?>"
                                placeholder="Misal: 15 Januari 2025"
                                class="input-field w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Lokasi Kegiatan</label>
                            <input type="text" name="lokasi" value="<?php echo e(old('lokasi')); ?>"
                                placeholder="Misal: Balai Desa Gunungsari"
                                class="input-field w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-gray-50">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="4"
                            placeholder="Tuliskan deskripsi singkat tentang kegiatan ini..."
                            class="input-field w-full border border-gray-200 rounded-xl px-4 py-3 text-sm bg-gray-50 resize-none"><?php echo e(old('deskripsi')); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Card: Upload Foto -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-7 mb-5">
                <h2 class="font-heading font-bold text-gray-900 text-lg mb-2 flex items-center gap-2">
                    <span class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 text-sm">
                        <i class="fa-solid fa-images"></i>
                    </span>
                    Upload Foto Dokumentasi
                </h2>
                <p class="text-gray-400 text-xs mb-5">Format: JPG, PNG, WebP. Maksimal 5 MB per foto. Bisa pilih banyak foto sekaligus.</p>

                <!-- Drop Zone -->
                <div class="drop-zone rounded-2xl p-8 text-center cursor-pointer hover:border-sipetran-green hover:bg-green-50/50 transition-all"
                    id="drop-zone" onclick="document.getElementById('foto-input').click()">
                    <div id="drop-placeholder">
                        <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-2xl"></i>
                        </div>
                        <p class="text-gray-600 font-medium text-sm">Klik atau drag & drop foto di sini</p>
                        <p class="text-gray-400 text-xs mt-1">Bisa pilih banyak foto sekaligus</p>
                    </div>
                </div>

                <input type="file" name="foto[]" id="foto-input" multiple accept="image/*" class="hidden" onchange="previewFotos(this)">

                <!-- Preview Grid -->
                <div id="preview-grid" class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-5 hidden"></div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 justify-end">
                <a href="<?php echo e(route('admin.kegiatan.index')); ?>"
                    class="px-6 py-3 bg-white border border-gray-200 text-gray-700 font-semibold text-sm rounded-2xl hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-sipetran-green hover:bg-sipetran-lightgreen text-white font-semibold text-sm rounded-2xl transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Kegiatan
                </button>
            </div>
        </form>
    </main>

    <script>
        // Drag & Drop
        const dropZone = document.getElementById('drop-zone');
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('dragover'); });
        dropZone.addEventListener('dragleave', () => { dropZone.classList.remove('dragover'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            const input = document.getElementById('foto-input');
            const dt = new DataTransfer();
            [...files].forEach(f => dt.items.add(f));
            input.files = dt.files;
            previewFotos(input);
        });

        function previewFotos(input) {
            const grid = document.getElementById('preview-grid');
            const placeholder = document.getElementById('drop-placeholder');
            grid.innerHTML = '';

            if (input.files.length === 0) {
                grid.classList.add('hidden');
                placeholder.innerHTML = `
                    <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 font-medium text-sm">Klik atau drag & drop foto di sini</p>
                    <p class="text-gray-400 text-xs mt-1">Bisa pilih banyak foto sekaligus</p>
                `;
                return;
            }

            placeholder.innerHTML = `
                <p class="text-sipetran-green font-semibold text-sm">${input.files.length} foto dipilih</p>
                <p class="text-gray-400 text-xs mt-1">Klik untuk ganti pilihan</p>
            `;
            grid.classList.remove('hidden');

            [...input.files].forEach((file, i) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const div = document.createElement('div');
                    div.className = 'relative group';
                    div.innerHTML = `
                        <img src="${e.target.result}" alt="" class="w-full h-36 object-cover rounded-2xl border border-gray-100">
                        <div class="absolute inset-0 bg-black/30 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-2">
                            <input type="text" name="keterangan[]" placeholder="Keterangan foto..."
                                class="w-full bg-white/90 text-gray-800 text-xs rounded-lg px-2 py-1.5 focus:outline-none">
                        </div>
                        <div class="absolute top-2 left-2 w-5 h-5 bg-sipetran-green rounded-full flex items-center justify-center text-white text-[9px] font-bold">${i+1}</div>
                    `;
                    grid.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\Desktop\Wesbite Sipetran\Website_Sipetran\resources\views/admin/kegiatan/create.blade.php ENDPATH**/ ?>