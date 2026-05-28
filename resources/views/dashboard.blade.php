@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12 mb-4">

        <div class="card border-0 shadow-sm"
            style="background-color:#ffdce5;">

            <div class="card-body p-5">

                <h1 class="fw-bold text-dark">
                    🌸 Selamat Datang di Apotek Digital
                </h1>

                <p class="mt-3">
                    Sistem Informasi Layanan Apotek Digital
                    Terintegrasi berbasis Laravel dan Bootstrap.
                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <h3>💊</h3>

                <h5>Total Obat</h5>

                <h2 class="fw-bold text-danger">
                    10
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <h3>🧑‍⚕️</h3>

                <h5>Total Dokter</h5>

                <h2 class="fw-bold text-danger">
                    8
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <h3>🧑</h3>

                <h5>Total Pasien</h5>

                <h2 class="fw-bold text-danger">
                    10
                </h2>

            </div>

        </div>

    </div>

</div>

@endsection