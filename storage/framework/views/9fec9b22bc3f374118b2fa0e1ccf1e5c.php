<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — SIPETRAN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700;9..40,800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green-deep:  #1a3a0e;
            --green-main:  #2b5219;
            --green-light: #4a7c2f;
            --amber:       #F5C400;
            --amber-dark:  #d97706;
        }

        html, body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background-color: #f4f6f2;
            position: relative;
            overflow: hidden;
        }

        /* ─── Animated background blobs ─── */
        .bg-blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.25;
            animation: float 10s ease-in-out infinite;
            pointer-events: none;
        }
        .bg-blob-1 { width: 520px; height: 520px; background: #2b5219; top: -180px; left: -160px; animation-delay: 0s; }
        .bg-blob-2 { width: 400px; height: 400px; background: #F5C400; bottom: -150px; right: -120px; animation-delay: -4s; }
        .bg-blob-3 { width: 280px; height: 280px; background: #4a7c2f; top: 60%; left: 10%; animation-delay: -2s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-28px) scale(1.04); }
        }

        /* ─── Main card ─── */
        .card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 2rem;
            padding: 2.5rem 2.5rem 2rem;
            box-shadow:
                0 4px 6px -1px rgba(0,0,0,0.06),
                0 20px 60px -12px rgba(43, 82, 25, 0.20),
                0 0 0 1px rgba(255,255,255,0.5) inset;
            animation: slideUp 0.55s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(32px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ─── Logo block ─── */
        .logo-wrap {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .logo-icon {
            width: 52px; height: 52px;
            background: linear-gradient(135deg, var(--green-main), var(--green-light));
            border-radius: 1.1rem;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 8px 24px rgba(43,82,25,0.30);
            flex-shrink: 0;
        }
        .logo-icon i { color: white; font-size: 1.35rem; }
        .logo-text-main {
            font-family: 'DM Sans', sans-serif;
            font-weight: 800;
            font-size: 1.4rem;
            color: #111;
            line-height: 1;
        }
        .logo-text-sub {
            font-size: 0.65rem;
            font-weight: 600;
            color: var(--green-light);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-top: 3px;
        }

        /* ─── Heading ─── */
        .heading-block { margin-bottom: 1.75rem; }
        .heading-block h1 {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.55rem;
            font-weight: 800;
            color: #111;
            line-height: 1.2;
        }
        .heading-block p {
            font-size: 0.8rem;
            color: #6b7280;
            margin-top: 0.35rem;
        }

        /* ─── Badge ─── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #fef3c7;
            color: var(--amber-dark);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 99px;
            border: 1px solid #fde68a;
            margin-bottom: 0.85rem;
        }

        /* ─── Alert ─── */
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            font-size: 0.8rem;
            padding: 0.75rem 1rem;
            border-radius: 0.9rem;
            margin-bottom: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* ─── Form ─── */
        .form-label {
            display: block;
            font-size: 0.72rem;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0.5rem;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 1.25rem;
        }
        .input-wrap .icon-left {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 0.85rem;
            pointer-events: none;
        }
        .input-wrap .icon-right {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 0.85rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            transition: color 0.15s;
        }
        .input-wrap .icon-right:hover { color: var(--green-main); }

        .field-input {
            width: 100%;
            padding: 0.85rem 2.75rem 0.85rem 2.75rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 0.9rem;
            font-size: 0.88rem;
            font-family: 'Inter', sans-serif;
            color: #111;
            background: #f9fafb;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }
        .field-input:focus {
            border-color: var(--green-main);
            background: #fff;
            box-shadow: 0 0 0 3.5px rgba(43,82,25,0.10);
        }
        .field-input.has-error {
            border-color: #f87171;
            background: #fff;
        }
        .error-msg {
            font-size: 0.72rem;
            color: #ef4444;
            margin-top: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* ─── Submit button ─── */
        .btn-submit {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--green-main) 0%, var(--green-light) 100%);
            color: white;
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            border: none;
            border-radius: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 6px 20px rgba(43,82,25,0.28);
            transition: transform 0.15s, box-shadow 0.15s, opacity 0.15s;
            margin-top: 0.5rem;
        }
        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(43,82,25,0.35);
            opacity: 0.95;
        }
        .btn-submit:active { transform: translateY(0); }

        /* ─── Divider ─── */
        .divider {
            border: none;
            border-top: 1px solid #f0f0f0;
            margin: 1.5rem 0 1.1rem;
        }

        /* ─── Back link ─── */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: #6b7280;
            text-decoration: none;
            transition: color 0.15s;
        }
        .back-link:hover { color: var(--green-main); }

        /* ─── Footer hint ─── */
        .footer-hint {
            text-align: center;
            font-size: 0.68rem;
            color: #9ca3af;
            margin-top: 1.5rem;
        }

        /* Shake animation for wrong password */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            15%       { transform: translateX(-6px); }
            30%       { transform: translateX(6px); }
            45%       { transform: translateX(-4px); }
            60%       { transform: translateX(4px); }
            75%       { transform: translateX(-2px); }
            90%       { transform: translateX(2px); }
        }
        .shake { animation: shake 0.5s ease both; }
    </style>
</head>
<body>

    <!-- Animated background blobs -->
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>
    <div class="bg-blob bg-blob-3"></div>

    <div class="card" id="loginCard">

        <!-- Logo -->
        <div class="logo-wrap">
            <div class="logo-icon">
                <i class="fa-solid fa-leaf"></i>
            </div>
            <div>
                <div class="logo-text-main">SIPETRAN</div>
                <div class="logo-text-sub">Desa Gunungsari</div>
            </div>
        </div>

        <!-- Badge + Heading -->
        <div class="heading-block">
            <div class="badge">
                <i class="fa-solid fa-user-shield"></i>
                Panel Administrasi
            </div>
            <h1>Masuk ke Admin<br>Panel 🌿</h1>
            <p>Kelola dokumentasi kegiatan program SIPETRAN.</p>
        </div>

        <!-- Error Alert -->
        <?php if(session('error')): ?>
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="POST" action="<?php echo e(route('admin.login.post')); ?>" id="loginForm">
            <?php echo csrf_field(); ?>

            <div>
                <label class="form-label" for="password">Password Admin</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password…"
                        autocomplete="current-password"
                        autofocus
                        class="field-input <?php echo e($errors->has('password') ? 'has-error' : ''); ?>"
                    >
                    <button type="button" class="icon-right" id="togglePwd" title="Lihat/Sembunyikan Password">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error-msg">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fa-solid fa-right-to-bracket"></i>
                Masuk ke Panel Admin
            </button>
        </form>

        <hr class="divider">

        <a href="<?php echo e(route('kegiatan.index')); ?>" class="back-link">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            Kembali ke Halaman Kegiatan
        </a>
    </div>

    <p class="footer-hint" style="position:fixed; bottom:1.25rem; left:50%; transform:translateX(-50%); white-space:nowrap;">
        &copy; <?php echo e(date('Y')); ?> SIPETRAN &mdash; Desa Gunungsari, Bondowoso
    </p>

    <script>
        // Toggle show/hide password
        const pwdInput = document.getElementById('password');
        const eyeIcon  = document.getElementById('eyeIcon');
        document.getElementById('togglePwd').addEventListener('click', function () {
            const isHidden = pwdInput.type === 'password';
            pwdInput.type  = isHidden ? 'text' : 'password';
            eyeIcon.className = isHidden ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye';
        });

        // Shake card on validation error
        <?php if($errors->has('password')): ?>
            document.getElementById('loginCard').classList.add('shake');
        <?php endif; ?>
    </script>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\Desktop\Wesbite Sipetran\Website_Sipetran\resources\views/admin/login.blade.php ENDPATH**/ ?>