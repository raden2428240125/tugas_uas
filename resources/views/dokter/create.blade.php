@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Dokter</h2>

    <form action="/dokter" method="POST">

        @csrf

        <div class="mb-3">

            <label>ID Dokter</label>

            <input type="text" name="iddokter" class="form-control">

        </div>

        <div class="mb-3">

            <label>Nama Dokter</label>

            <input type="text" name="namadokter" class="form-control">

        </div>

        <div class="mb-3">

            <label>Spesialis</label>

            <input type="text" name="spesialis" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jadwal Praktik</label>

            <input type="text" name="jadwalpraktik" class="form-control">

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

    </form>
@endsection
