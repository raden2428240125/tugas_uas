@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg,#ffd6e0,#ffeef2);">

        <div class="card-body p-5">

            <h1 class="fw-bold">
                💊 Dashboard Administrasi Apotek Digital
            </h1>

            <p class="text-secondary mb-0">
                Sistem informasi untuk membantu pengelolaan obat,
                pemantauan stok, pengelolaan pelanggan, serta
                transaksi pemesanan secara terintegrasi.
            </p>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-body text-center">

                    <h3>💊</h3>

                    <h5>Total Obat</h5>

                    <h2 class="fw-bold text-danger">
                        {{ $totalObat }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-body text-center">

                    <h3>🧑</h3>

                    <h5>Total Pelanggan</h5>

                    <h2 class="fw-bold text-danger">
                        {{ $totalPelanggan }}
                    </h2>

                </div>

            </div>

        </div>


        <div class="col-md-3 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-body text-center">

                    <h3>💳</h3>

                    <h5>Total Pesanan</h5>

                    <h2 class="fw-bold text-danger">
                        {{ $totalPesanan }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-danger text-white">

                    Stok Obat Menipis

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>

                            <tr>

                                <th>Nama Obat</th>
                                <th>Stok</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($stokMenipis as $obat)
                                <tr>

                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->stok }}</td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-warning">

                    Obat Mendekati Kadaluarsa

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>

                            <tr>

                                <th>Nama Obat</th>
                                <th>Kadaluarsa</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($obatKadaluarsa as $obat)
                                <tr>

                                    <td>{{ $obat->nama_obat }}</td>

                                    <td>
                                        {{ $obat->tanggal_kadaluarsa }}
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
