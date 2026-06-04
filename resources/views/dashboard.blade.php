@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $totalObat }}</h3>
                    <p>Total Obat</p>
                </div>
                <div class="icon">
                    <i class="bi bi-capsule"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ $totalPesanan }}</h3>
                    <p>Total Pesanan</p>
                </div>
                <div class="icon">
                    <i class="bi bi-cart"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>{{ $totalPelanggan }}</h3>
                    <p>Total Pelanggan</p>
                </div>
                <div class="icon">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>{{ $totalPembayaran }}</h3>
                    <p>Total Pembayaran</p>
                </div>
                <div class="icon">
                    <i class="bi bi-credit-card"></i>
                </div>
            </div>
        </div>

    </div>


    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">
                        Stok Obat Menipis
                    </h3>
                </div>

                <div class="card-body p-0">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($stokMenipis as $obat)
                                <tr>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">
                                        Tidak ada data
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">
                        Obat Mendekati Kadaluarsa
                    </h3>
                </div>

                <div class="card-body p-0">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Kadaluarsa</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($obatKadaluarsa as $obat)
                                <tr>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->tanggal_kadaluarsa }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">
                                        Tidak ada data
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
