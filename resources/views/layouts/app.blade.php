<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color:#ffb6c1;">

        <div class="container">

            <a class="navbar-brand fw-bold text-white" href="/">
                Apotek Digital
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/dashboard">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/kategori">
                            Kategori
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/obat">
                            Obat
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/pelanggan">
                            Pelanggan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/resep">
                            Resep
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/pesanan">
                            Pesanan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/pembayaran">
                            Pembayaran
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

</body>

</html>
