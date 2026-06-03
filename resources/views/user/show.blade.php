@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-3">

                        {{ $obat->nama_obat }}

                    </h2>

                    <hr>

                    <p>

                        <strong>Kategori :</strong>

                        {{ $obat->kategori->nama_kategori ?? '-' }}

                    </p>

                    <p>

                        <strong>Jenis :</strong>

                        {{ $obat->jenis_obat }}

                    </p>

                    <p>

                        <strong>Harga :</strong>

                        Rp {{ number_format($obat->harga, 0, ',', '.') }}

                    </p>

                    <p>

                        <strong>Stok :</strong>

                        {{ $obat->stok }}

                    </p>

                    <p>

                        <strong>Tanggal Kadaluarsa :</strong>

                        {{ $obat->tanggal_kadaluarsa }}

                    </p>

                    <p>

                        <strong>Deskripsi :</strong>

                        {{ $obat->deskripsi }}

                    </p>

                    <a href="/pesanan/create" class="btn btn-danger">

                        Pesan Sekarang

                    </a>

                    <a href="/pesanan/create" class="btn btn-primary">

                        Beli Sekarang

                    </a>

                    <a href="/obat-user" class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>
@endsection
