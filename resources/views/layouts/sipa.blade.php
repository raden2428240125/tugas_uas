<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>SIPA - Solusi Kesehatan Digital Masa Depan</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "outline": "#94a3b8",
                        "on-secondary-fixed": "#172554",
                        "secondary-container": "#eff6ff",
                        "inverse-primary": "#60a5fa",
                        "tertiary-fixed-dim": "#7dd3fc",
                        "error": "#dc2626",
                        "surface": "#ffffff",
                        "surface-container-high": "#e2e8f0",
                        "tertiary-container": "#e0f2fe",
                        "on-background": "#0f172a",
                        "on-surface": "#0f172a",
                        "surface-container-low": "#f8fafc",
                        "primary-fixed": "#dbeafe",
                        "inverse-on-surface": "#f8fafc",
                        "surface-tint": "#2563eb",
                        "surface-variant": "#f1f5f9",
                        "on-secondary-container": "#1e40af",
                        "secondary-fixed": "#eff6ff",
                        "primary": "#2563eb",
                        "surface-bright": "#ffffff",
                        "outline-variant": "#cbd5e1",
                        "on-primary-fixed-variant": "#1d4ed8",
                        "on-primary": "#ffffff",
                        "on-primary-fixed": "#172554",
                        "secondary-fixed-dim": "#bfdbfe",
                        "tertiary": "#0ea5e9",
                        "primary-fixed-dim": "#93c5fd",
                        "primary-container": "#dbeafe",
                        "secondary": "#3b82f6",
                        "surface-container": "#f1f5f9",
                        "on-tertiary-fixed-variant": "#0284c7",
                        "surface-container-highest": "#cbd5e1",
                        "on-surface-variant": "#475569",
                        "on-secondary-fixed-variant": "#2563eb",
                        "on-tertiary-fixed": "#082f49",
                        "error-container": "#fecaca",
                        "on-error": "#ffffff",
                        "on-error-container": "#7f1d1d",
                        "on-secondary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "surface-dim": "#e2e8f0",
                        "tertiary-fixed": "#e0f2fe",
                        "surface-container-lowest": "#ffffff",
                        "inverse-surface": "#1e293b",
                        "background": "#f8fafc",
                        "on-primary-container": "#1e3a8a",
                        "on-tertiary-container": "#0c4a6e"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "margin-desktop": "40px",
                        "unit": "8px",
                        "gutter": "24px",
                        "container-max": "1280px",
                        "margin-mobile": "16px"
                    },
                    fontFamily: {
                        "label-sm": ["Plus Jakarta Sans"],
                        "headline-lg-mobile": ["Plus Jakarta Sans"],
                        "body-lg": ["Plus Jakarta Sans"],
                        "label-md": ["Plus Jakarta Sans"],
                        "body-md": ["Plus Jakarta Sans"],
                        "display-lg": ["Plus Jakarta Sans"],
                        "headline-md": ["Plus Jakarta Sans"],
                        "headline-lg": ["Plus Jakarta Sans"]
                    },
                    fontSize: {
                        "label-sm": ["12px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "headline-lg-mobile": ["28px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "1.4",
                            "letterSpacing": "0.02em",
                            "fontWeight": "600"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "display-lg": ["48px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "800"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }]
                    }
                }
            }
        }
    </script>

    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid var(--color-primary-20);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--color-on-primary-fixed-variant) 0%, var(--color-primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float-anim {
            animation: float 6s ease-in-out infinite;
        }

        @yield('styles')
    </style>
</head>

<body class="bg-background font-body-md text-on-surface overflow-x-hidden">

    @include('partials.navbar')

    <!-- Sidebar Overlay (mobile) -->
    <div id="sidebar-overlay"
        class="fixed inset-0 bg-black/40 backdrop-blur-sm z-30 hidden lg:hidden transition-opacity duration-300"></div>

    <div class="flex relative min-h-screen">
        @include('partials.sidebar')

        <main class="flex-1 w-full lg:ml-72 flex flex-col min-h-screen transition-all duration-300">
            <div class="flex-1">
                @yield('content')
            </div>
            @include('partials.footer')
        </main>
    </div>

    <!-- Hamburger Toggle Script -->
    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const sidebar = document.getElementById('main-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const ham1 = document.getElementById('ham-1');
        const ham2 = document.getElementById('ham-2');
        const ham3 = document.getElementById('ham-3');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            // Animate to X
            ham1.style.transform = 'translateY(8px) rotate(45deg)';
            ham2.style.opacity = '0';
            ham3.style.transform = 'translateY(-8px) rotate(-45deg)';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            // Reset bars
            ham1.style.transform = '';
            ham2.style.opacity = '1';
            ham3.style.transform = '';
        }

        hamburgerBtn.addEventListener('click', () => {
            if (sidebar.classList.contains('-translate-x-full')) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });

        overlay.addEventListener('click', closeSidebar);

        // Close sidebar on link click (mobile UX)
        sidebar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) closeSidebar();
            });
        });
    </script>

    @yield('scripts')
</body>

</html>
