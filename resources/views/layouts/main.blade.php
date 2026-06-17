<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apotek Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css">

    <style>
        :root {
            /* M3 Blue 600 - Main Primary */
            --bs-primary: #2563eb;
            --bs-primary-rgb: 37, 99, 235;

            /* Slate 900 - Deep dark blue for sidebar */
            --bs-dark: #0f172a;
            --bs-dark-rgb: 15, 23, 42;

            /* Blue 400 - Secondary accents */
            --bs-info: #60a5fa;
            --bs-info-rgb: 96, 165, 250;

            /* Blue 800 - Darker accents */
            --bs-success: #1e40af;
            --bs-success-rgb: 30, 64, 175;

            /* Blue 300 - Light accents */
            --bs-warning: #93c5fd;
            --bs-warning-rgb: 147, 197, 253;
        }

        /* Ensure sidebar brand links play nicely with dark theme */
        .app-sidebar .brand-link {
            border-bottom-color: rgba(255, 255, 255, 0.1);
            color: #ffffff !important;
        }

        .app-sidebar .nav-link.active {
            background-color: #2563eb !important;
            color: #ffffff !important;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        <!-- NAVBAR -->

        <nav class="app-header navbar navbar-expand bg-white border-bottom">

            <div class="container-fluid">

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link" data-lte-toggle="sidebar" href="#">

                            <i class="bi bi-list"></i>

                        </a>

                    </li>

                </ul>

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">

                        <span class="nav-link fw-semibold">

                            {{ Auth::user()->name }}

                        </span>

                    </li>

                </ul>

            </div>

        </nav>



        <!-- SIDEBAR -->

        <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">

            <div class="sidebar-brand">

                <a href="/admin/dashboard" class="brand-link">

                    <span class="brand-text fw-bold bi-hospital">

                        APOTEK DIGITAL

                    </span>

                </a>

            </div>

            <div class="sidebar-wrapper">

                <nav class="mt-2">

                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview">

                        <li class="nav-item">

                            <a href="/admin/dashboard" class="nav-link">

                                <i class="nav-icon bi bi-speedometer2"></i>

                                <p>Dashboard</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon bi bi-database"></i>

                                <p>

                                    Master Data

                                    <i class="nav-arrow bi bi-chevron-right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="/admin/kategori" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Kategori</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/admin/obat" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Obat</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/admin/pelanggan" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Pelanggan</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/admin/users" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Pengguna / Admin</p>

                                    </a>

                                </li>

                            </ul>

                        </li>


                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon bi bi-cart"></i>

                                <p>

                                    Transaksi

                                    <i class="nav-arrow bi bi-chevron-right"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="/admin/pesanan" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Pesanan</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/admin/detail-pesanan" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Detail Pesanan</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/admin/pembayaran" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Pembayaran</p>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="nav-item">

                            <a href="/admin/resep" class="nav-link">

                                <i class="nav-icon bi bi-file-earmark-medical"></i>

                                <p>Resep</p>

                            </a>

                        </li>

                        <li class="nav-item mt-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="nav-link text-start bg-danger hover:bg-danger/80 border-0 text-white w-100 d-flex align-items-center">
                                    <i class="nav-icon bi bi-box-arrow-right"></i>
                                    <p class="mb-0">Logout</p>
                                </button>
                            </form>
                        </li>

                    </ul>

                </nav>

            </div>

        </aside>



        <!-- CONTENT -->

        <main class="app-main">

            <div class="app-content p-4">

                @yield('content')

            </div>

        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"></script>
</body>

</html>
