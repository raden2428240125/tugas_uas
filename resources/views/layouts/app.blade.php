<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apotek Digital</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link" data-widget="pushmenu" href="#">

                        <i class="bi bi-list"></i>

                    </a>

                </li>

            </ul>

        </nav>

        <!-- Sidebar -->

        <aside class="main-sidebar elevation-4">

            <a href="/dashboard" class="brand-link text-center">

                <span class="brand-text fw-bold text-white">

                    💊 Apotek Digital

                </span>

            </a>

            <div class="sidebar">

                <nav class="mt-3">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                        <li class="nav-item">

                            <a href="/dashboard" class="nav-link">

                                <i class="nav-icon bi bi-speedometer2"></i>

                                <p>Dashboard</p>

                            </a>

                        </li>

                        <li class="nav-header text-white">

                            MASTER DATA

                        </li>

                        <li class="nav-item">

                            <a href="/kategori" class="nav-link">

                                <i class="nav-icon bi bi-tags"></i>

                                <p>Kategori</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/obat" class="nav-link">

                                <i class="nav-icon bi bi-capsule"></i>

                                <p>Obat</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/pelanggan" class="nav-link">

                                <i class="nav-icon bi bi-people"></i>

                                <p>Pelanggan</p>

                            </a>

                        </li>

                        <li class="nav-header text-white">

                            TRANSAKSI

                        </li>

                        <li class="nav-item">

                            <a href="/pesanan" class="nav-link">

                                <i class="nav-icon bi bi-cart"></i>

                                <p>Pesanan</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/detail-pesanan" class="nav-link">

                                <i class="nav-icon bi bi-receipt"></i>

                                <p>Detail Pesanan</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/pembayaran" class="nav-link">

                                <i class="nav-icon bi bi-credit-card"></i>

                                <p>Pembayaran</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/resep" class="nav-link">

                                <i class="nav-icon bi bi-file-earmark-medical"></i>

                                <p>Resep</p>

                            </a>

                        </li>

                        <li class="nav-header text-white">

                            USER

                        </li>

                        <li class="nav-item">

                            <a href="/obat-user" class="nav-link">

                                <i class="nav-icon bi bi-shop"></i>

                                <p>Katalog Obat</p>

                            </a>

                        </li>

                    </ul>

                </nav>

            </div>

        </aside>

        <!-- Content -->

        <div class="content-wrapper p-4">

            @yield('content')

        </div>

    </div>

</body>

</html>
