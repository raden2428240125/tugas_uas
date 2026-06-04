<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apotek Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css">
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

                <a href="/dashboard" class="brand-link">

                    <span class="brand-text fw-bold">

                        APOTEK DIGITAL

                    </span>

                </a>

            </div>

            <div class="sidebar-wrapper">

                <nav class="mt-2">

                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview">

                        <li class="nav-item">

                            <a href="/dashboard" class="nav-link">

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

                                    <a href="/kategori" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Kategori</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/obat" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Obat</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/pelanggan" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Pelanggan</p>

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

                                    <a href="/pesanan" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Pesanan</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/detail-pesanan" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Detail Pesanan</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="/pembayaran" class="nav-link">

                                        <i class="bi bi-circle"></i>

                                        <p>Pembayaran</p>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="nav-item">

                            <a href="/resep" class="nav-link">

                                <i class="nav-icon bi bi-file-earmark-medical"></i>

                                <p>Resep</p>

                            </a>

                        </li>

                        <li class="nav-item mt-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="nav-link btn btn-link text-start text-white">
                                    <i class="nav-icon bi bi-box-arrow-right"></i>
                                    <p>Logout</p>
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
