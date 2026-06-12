<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPA - Daftar</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background: #e9e9f0; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; overflow: hidden; }
        .auth-container { background: #fff; border-radius: 30px; box-shadow: 0 14px 28px rgba(0,0,0,0.1), 0 10px 10px rgba(0,0,0,0.05); position: relative; overflow: hidden; width: 850px; max-width: 100%; height: 520px; display: flex; flex-direction: row; }
        .form-container { display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 0 50px; width: 50%; height: 100%; text-align: center; }
        .overlay-container { width: 50%; height: 100%; background: linear-gradient(135deg, #7c3aed, #4c1d95); border-radius: 0 120px 120px 0; color: white; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 0 50px; position: relative; }
        .back-btn { position: absolute; top: 25px; left: 30px; color: rgba(255,255,255,0.7); text-decoration: none; transition: 0.3s; display: flex; align-items: center; justify-content: center; }
        .back-btn:hover { color: white; transform: scale(1.1); }
        h1 { font-weight: 700; margin: 0 0 15px; font-size: 32px; color: #333; }
        .overlay-container h1 { color: #fff; font-size: 36px; }
        p { font-size: 14px; font-weight: 500; line-height: 20px; letter-spacing: 0.5px; margin: 10px 0 30px; color: #777; }
        .overlay-container p { color: rgba(255,255,255,0.9); font-weight: 400; margin-bottom: 35px; }
        input { background-color: #f3f3f4; border: none; padding: 12px 15px; margin: 6px 0; width: 100%; border-radius: 8px; font-family: 'Montserrat', sans-serif; font-size: 13px; outline: none; transition: 0.3s; }
        input:focus { background-color: #fff; box-shadow: 0 0 0 2px #7c3aed40; }
        button { border-radius: 20px; border: 1px solid #7c3aed; background-color: #7c3aed; color: #FFFFFF; font-size: 13px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in; cursor: pointer; font-family: 'Montserrat', sans-serif; margin-top: 15px; width: 100%; max-width: 200px; }
        button:active { transform: scale(0.95); }
        button:hover { background-color: #6d28d9; border-color: #6d28d9; }
        button.ghost { background-color: transparent; border-color: #FFFFFF; }
        button.ghost:hover { background-color: rgba(255,255,255,0.1); }
        .error-msg { color: #ef4444; font-size: 12px; margin-bottom: 10px; text-align: left; width: 100%; font-weight: 600; }
        form { width: 100%; display: flex; flex-direction: column; align-items: center; }
        
        @media (max-width: 768px) {
            .auth-container { flex-direction: column-reverse; height: 100vh; border-radius: 0; }
            .form-container, .overlay-container { width: 100%; height: 50%; border-radius: 0; padding: 0 30px; }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Overlay for Login -->
        <div class="overlay-container">
            <a href="/login" class="back-btn" title="Kembali ke Beranda">
                <span class="material-symbols-outlined" style="font-size: 28px;">arrow_back</span>
            </a>
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info.</p>
            <a href="<?php echo e(route('login')); ?>" style="width: 100%; display: flex; justify-content: center; text-decoration: none;">
                <button type="button" class="ghost">SIGN IN</button>
            </a>
        </div>

        <!-- Sign Up Form -->
        <div class="form-container">
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <h1>Create Account</h1>
                <p>Silakan gunakan email Anda untuk registrasi</p>
                
                <?php if($errors->any()): ?>
                    <div class="error-msg">
                        <?php echo e($errors->first()); ?>

                    </div>
                <?php endif; ?>
                
                <input type="text" name="name" placeholder="Nama Lengkap" value="<?php echo e(old('name')); ?>" required autofocus />
                <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
                
                <button type="submit">SIGN UP</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/auth/register.blade.php ENDPATH**/ ?>