<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPA - Sistem Informasi Pelayanan Apotek</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>

<body class="bg-surface-container-lowest min-h-screen flex items-center justify-center m-0 p-0 overflow-hidden">

    <div class="w-full h-screen flex flex-col md:flex-row">

        <!-- Left Side: Visual / Branding (Elegant Purple) -->
        <div
            class="relative w-full md:w-5/12 lg:w-1/2 bg-gradient-to-br from-on-primary-fixed-variant to-primary p-10 md:p-16 flex flex-col justify-between text-white overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-primary-container/20 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-16">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-primary shadow-lg">
                        <span class="material-symbols-outlined text-[28px]">local_pharmacy</span>
                    </div>
                    <span class="text-[28px] font-black tracking-tight">SIPA</span>
                </div>

                <div class="max-w-md">
                    <h1 class="text-[40px] lg:text-[56px] font-black leading-[1.1] mb-6 drop-shadow-md">
                        Kesehatan Anda,<br />Prioritas Kami.
                    </h1>
                    <p class="text-[16px] text-white/90 font-medium leading-relaxed mb-10">
                        Platform manajemen apotek digital premium yang dirancang untuk memberikan pelayanan medis
                        terpadu, cepat, dan mewah.
                    </p>

                    <div
                        class="glass-panel rounded-2xl p-6 inline-block floating-element shadow-[0_20px_40px_rgba(0,0,0,0.2)]">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <img alt="Doctor" class="h-10 w-10 rounded-full border-2 border-primary"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhFsZ7-t3VVlD0vvGAA7K57RfVAfiV6xgR0fCKIQ75h7dhpKfI93WICe2n5A8gpY3pkH0fAwHra42X2-44MzR87vc-TVPX3uCyxYmXuUeZo64LlhPObMCRPpbUmqT323FY84EjpBOmv8Y-hSfle67y6cb-aHXp-1gMUK7wJviSwqGZjPPB5y6jUnKZEe9v7uq8r5ne9TBeFKP90vUi2wj9kNiIKx1aD-ySRLqgTybhyOm0So98a6SyayYLGW5AEHwcZtw29bJ2BrVK" />
                                <img alt="Doctor" class="h-10 w-10 rounded-full border-2 border-primary"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqf8EVqOojc_e8J6N7XHaHGqPhOHKoL9qJOT_o5h7zX7KT20qnfc0Uwt2yq6dTgxtML-5dPZAo9w73_LhJzf9BJevgcXPkCPA7NNl3vGxFdG9eo6XdOVMok-PXgfny2OHotfDU8kVJrXWSrZNZOLe60GGNJG0lF5mee4EZ3QgzQtDlK11jli7aceLf7VObWdSa3YDjLYLlPtzGzzhrqZvapUTLID8KWTMUFHMRoSqhqilvlB931WbpP1nvY0zsL4foBEm2aE4b0qpu" />
                                <img alt="Doctor" class="h-10 w-10 rounded-full border-2 border-primary"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAocrcvW4D0vjCexDS5Z-mppaMY-UKeYkhjDwjpeklDJQ_pc_5ZGn2_qoEQH1k3NHSEVexdV2MeMU6xg35-vvqJzAVUu7zduGbLN95EDBuznNusgM6oh2nygtGUmx19YU2Q1K9n5Y0c7OGLuTyz6V2pJS1_d5jNfx5Xk8GU1Aly9ECCnikjl06hDi9NTN4LdMlgHtAFMiQBA4Z3EJcsjpYHbLN51whUGCWqu8OEMuPNq8mwYWLQfrgQGlo7RPiV095v4LnADsvtBSyw" />
                            </div>
                            <div>
                                <p class="text-[14px] font-bold text-white">120+ Spesialis</p>
                                <p class="text-[12px] text-white/80">Siap melayani Anda 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 text-[12px] text-white/60 font-medium hidden md:block">
                © {{ date('Y') }} SIPA Digital Health. All rights reserved.
            </div>
        </div>

        <!-- Right Side: Auth Forms (Clean, Elegant White) -->
        <div
            class="w-full md:w-7/12 lg:w-1/2 h-full flex flex-col justify-center items-center p-8 lg:p-16 bg-surface-container-lowest">

            <div class="w-full max-w-md space-y-12">
                <div class="text-left md:text-center">
                    <h2 class="text-[36px] font-extrabold text-on-surface mb-3 tracking-tight">Selamat Datang</h2>
                    <p class="text-on-surface-variant text-[16px] font-medium">Mari mulai perjalanan kesehatan digital
                        Anda.</p>
                </div>

                <div class="space-y-5">
                    <!-- Login Button -->
                    <a href="{{ url('/') }}"
                        class="group relative flex w-full justify-center items-center gap-3 py-4 px-6 bg-primary text-on-primary rounded-2xl font-bold text-[16px] overflow-hidden shadow-[0_8px_25px_var(--color-primary-20)] hover:shadow-[0_12px_30px_var(--color-primary-20)] transition-all hover:-translate-y-1">
                        <div
                            class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out">
                        </div>
                        <span class="material-symbols-outlined relative z-10 text-[22px]">login</span>
                        <span class="relative z-10">Masuk ke Akun Saya</span>
                    </a>

                    <div class="relative py-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-outline-variant/60"></div>
                        </div>
                        <div class="relative flex justify-center text-[12px] font-bold">
                            <span
                                class="px-4 bg-surface-container-lowest text-on-surface-variant uppercase tracking-widest">ATAU
                                PENGGUNA BARU</span>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <a href="{{ route('register') }}"
                        class="flex w-full justify-center items-center gap-3 py-4 px-6 bg-white text-on-surface border-2 border-outline-variant/60 rounded-2xl font-bold text-[16px] hover:border-primary hover:text-primary transition-all shadow-sm hover:shadow-md hover:bg-primary/5">
                        <span class="material-symbols-outlined text-[22px]">person_add</span>
                        Daftar Akun Baru
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="flex justify-center gap-8 pt-10 text-on-surface-variant">
                    <div class="flex flex-col items-center gap-2">
                        <div
                            class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[20px]">verified_user</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider">Aman</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div
                            class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[20px]">speed</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider">Cepat</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div
                            class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[20px]">support_agent</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider">24/7</span>
                    </div>
                </div>

            </div>

            <div class="mt-auto pt-8 text-[12px] text-on-surface-variant font-medium md:hidden">
                © {{ date('Y') }} SIPA Digital Health.
            </div>
        </div>

    </div>
</body>

</html>
