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

                <div class="card shadow-sm h-100 border-0">

                    <div class="card-body">

                        <h4 class="fw-bold">

                            {{ $obat->nama_obat }}

                        </h4>

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

                            {{ $obat->deskripsi }}

                        </p>

                    </div>

                </div>

            </div>
        @endforeach

    </div>
@endsection
