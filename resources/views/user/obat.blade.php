@extends('layouts.app')

@section('content')
    <div class="mb-5 text-center">

        <h1 class="fw-bold">

            Katalog Obat

        </h1>

        <p class="text-muted">

            Temukan berbagai kebutuhan obat Anda dengan mudah.

        </p>

    </div>

    <div class="row">

        @foreach ($obats as $obat)
            <div class="col-md-4 mb-4">

                <div class="card shadow border-0">

                    <div class="card-body p-5">

                        <h2 class="fw-bold">

                            {{ $obat->nama_obat }}

                        </h2>

                        <hr>

                        <p>

                            <strong>Kategori :</strong>

                            {{ $obat->kategori->nama_kategori }}

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

                            <strong>Deskripsi :</strong>

                            {{ $obat->deskripsi }}

                        </p>

                    </div>

                </div>
            </div>
        @endforeach

    </div>
@endsection
