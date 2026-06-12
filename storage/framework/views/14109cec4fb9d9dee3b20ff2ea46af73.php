<!DOCTYPE html>
<html class="light" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SIPA - Solusi Kesehatan Digital Masa Depan</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Scripts & Styles -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "outline": "#7b7487",
                        "on-secondary-fixed": "#1b1735",
                        "secondary-container": "#dcd5fd",
                        "inverse-primary": "#d2bbff",
                        "tertiary-fixed-dim": "#cdc2d9",
                        "error": "#ba1a1a",
                        "surface": "#fcf8ff",
                        "surface-container-high": "#e9e5ff",
                        "tertiary-container": "#6b6376",
                        "on-background": "#181445",
                        "on-surface": "#181445",
                        "surface-container-low": "#f6f2ff",
                        "primary-fixed": "#eaddff",
                        "inverse-on-surface": "#f3eeff",
                        "surface-tint": "#732ee4",
                        "surface-variant": "#e3dfff",
                        "on-secondary-container": "#605b7d",
                        "secondary-fixed": "#e5deff",
                        "primary": "#630ed4",
                        "surface-bright": "#fcf8ff",
                        "outline-variant": "#ccc3d8",
                        "on-primary-fixed-variant": "#5a00c6",
                        "on-primary": "#ffffff",
                        "on-primary-fixed": "#25005a",
                        "secondary-fixed-dim": "#c8c2e9",
                        "tertiary": "#524b5e",
                        "primary-fixed-dim": "#d2bbff",
                        "primary-container": "#7c3aed",
                        "secondary": "#5f5a7c",
                        "surface-container": "#efebff",
                        "on-tertiary-fixed-variant": "#4a4456",
                        "surface-container-highest": "#e3dfff",
                        "on-surface-variant": "#4a4455",
                        "on-secondary-fixed-variant": "#474363",
                        "on-tertiary-fixed": "#1e1929",
                        "error-container": "#ffdad6",
                        "on-error": "#ffffff",
                        "on-error-container": "#93000a",
                        "on-secondary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "surface-dim": "#dad6ff",
                        "tertiary-fixed": "#e9def5",
                        "surface-container-lowest": "#ffffff",
                        "inverse-surface": "#2d2a5b",
                        "background": "#fcf8ff",
                        "on-primary-container": "#ede0ff",
                        "on-tertiary-container": "#ece1f8"
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
                        "label-sm": ["12px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "headline-lg-mobile": ["28px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.02em", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}]
                    }
                }
            }
        }
    </script>
    
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(243, 232, 255, 0.5);
        }
        .text-gradient {
            background: linear-gradient(135deg, #630ed4 0%, #7c3aed 100%);
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
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .float-anim {
            animation: float 6s ease-in-out infinite;
        }
        <?php echo $__env->yieldContent('styles'); ?>
    </style>
</head>
<body class="bg-background font-body-md text-on-surface overflow-x-hidden md:pb-0 pb-20">

    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php echo $__env->make('partials.bottom-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/layouts/sipa.blade.php ENDPATH**/ ?>