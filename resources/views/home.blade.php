@extends('layouts.app')

@section('content')
    <div class="p-5 mb-5 rounded shadow-sm" style="background-color:#ffdce5;">

        <h1 class="fw-bold">
            🌸 Apotek Digital XYZ
        </h1>

        <p class="mt-3 fs-5">

            Solusi layanan kesehatan yang praktis dan modern.
            Pesan obat secara online, unggah resep dokter,
            dan nikmati proses pembelian yang lebih cepat
            tanpa antre panjang.

        </p>

        <a href="/obat" class="btn btn-danger mt-3">

            Lihat Katalog Obat

        </a>

    </div>

    <div class="row">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <h2>💊</h2>

                    <h5>Katalog Obat</h5>

                    <p>
                        Informasi obat lengkap dan stok tersedia.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <h2>📄</h2>

                    <h5>Upload Resep</h5>

                    <p>
                        Unggah resep dokter secara online.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center">

                    <h2>🚚</h2>

                    <h5>Pemesanan Mudah</h5>

                    <p>
                        Proses pembelian obat lebih cepat dan praktis.
                    </p>

                </div>

            </div>

        </div>

    </div>
@endsection
