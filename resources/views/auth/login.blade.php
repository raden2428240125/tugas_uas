<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPA - Masuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background: #e9e9f0; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; overflow: hidden; }
        .auth-container { background: #fff; border-radius: 30px; box-shadow: 0 14px 28px rgba(0,0,0,0.1), 0 10px 10px rgba(0,0,0,0.05); position: relative; overflow: hidden; width: 850px; max-width: 100%; height: 520px; display: flex; flex-direction: row; }
        .form-container { display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 0 50px; width: 50%; height: 100%; text-align: center; }
        .overlay-container { width: 50%; height: 100%; background: linear-gradient(135deg, var(--color-primary, #2563eb), var(--color-on-primary-fixed-variant, #1d4ed8)); border-radius: 120px 0 0 120px; color: white; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 0 50px; position: relative; }
        .back-btn { position: absolute; top: 25px; right: 30px; color: rgba(255,255,255,0.7); text-decoration: none; transition: 0.3s; display: flex; align-items: center; justify-content: center; }
        .back-btn:hover { color: white; transform: scale(1.1); }
        h1 { font-weight: 700; margin: 0 0 15px; font-size: 32px; color: #333; }
        .overlay-container h1 { color: #fff; font-size: 36px; }
        p { font-size: 14px; font-weight: 500; line-height: 20px; letter-spacing: 0.5px; margin: 10px 0 30px; color: #777; }
        .overlay-container p { color: rgba(255,255,255,0.9); font-weight: 400; margin-bottom: 35px; }
        input { background-color: #f3f3f4; border: none; padding: 14px 15px; margin: 8px 0; width: 100%; border-radius: 8px; font-family: 'Montserrat', sans-serif; font-size: 14px; outline: none; transition: 0.3s; }
        input:focus { background-color: #fff; box-shadow: 0 0 0 2px var(--color-primary-40); }
        button { border-radius: 20px; border: 1px solid var(--color-primary, #2563eb); background-color: var(--color-primary, #2563eb); color: #FFFFFF; font-size: 13px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in; cursor: pointer; font-family: 'Montserrat', sans-serif; margin-top: 15px; width: 100%; max-width: 200px; }
        button:active { transform: scale(0.95); }
        button:hover { background-color: var(--color-primary-hover); border-color: var(--color-primary-hover); }
        button.ghost { background-color: transparent; border-color: #FFFFFF; }
        button.ghost:hover { background-color: rgba(255,255,255,0.1); }
        .checkbox-container { display: flex; justify-content: space-between; width: 100%; margin-top: 10px; align-items: center; }
        .checkbox-container label { font-size: 13px; color: #666; display: flex; align-items: center; cursor: pointer; font-weight: 500; }
        .checkbox-container input { width: auto; margin: 0 8px 0 0; }
        .forgot-password { font-size: 13px; color: #666; text-decoration: none; font-weight: 500; }
        .forgot-password:hover { color: var(--color-primary); text-decoration: underline; }
        .error-msg { color: #ef4444; font-size: 12px; margin-bottom: 10px; text-align: left; width: 100%; font-weight: 600; }
        form { width: 100%; display: flex; flex-direction: column; align-items: center; }
        
        @media (max-width: 768px) {
            .auth-container { flex-direction: column; height: 100vh; border-radius: 0; }
            .form-container, .overlay-container { width: 100%; height: 50%; border-radius: 0; padding: 0 30px; }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Sign In Form -->
        <div class="form-container">
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <h1>Sign In</h1>
                <p>Silakan masuk dengan email dan password Anda</p>
                
                @if ($errors->any())
                    <div class="error-msg">
                        {{ $errors->first() }}
                    </div>
                @endif
                
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus />
                <div style="position: relative; width: 100%;">
                    <input type="password" name="password" id="password" placeholder="Password" required style="padding-right: 40px;" />
                    <span class="material-symbols-outlined" onclick="togglePassword('password', this)" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #666; font-size: 20px;">visibility_off</span>
                </div>
                
                <div class="checkbox-container">
                    <label>
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                    <a href="{{ route('password.request') }}" class="forgot-password">Lupa password?</a>
                </div>
                
                <button type="submit">SIGN IN</button>
            </form>
        </div>

        <!-- Overlay for Register -->
        <div class="overlay-container">

            <h1>Hello, Friend!</h1>
            <p>Register with your personal details to use all of site features.</p>
            <a href="{{ route('register') }}" style="width: 100%; display: flex; justify-content: center; text-decoration: none;">
                <button type="button" class="ghost">SIGN UP</button>
            </a>
        </div>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility_off';
            }
        }
    </script>
</body>
</html>
