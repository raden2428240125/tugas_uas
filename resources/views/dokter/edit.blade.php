@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Dokter</h2>

    <form action="/dokter/{{ $dokter->iddokter }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>ID Dokter</label>

            <input type="text" name="iddokter" class="form-control" value="{{ $dokter->iddokter }}" readonly>

        </div>

        <div class="mb-3">

            <label>Nama Dokter</label>

            <input type="text" name="namadokter" class="form-control" value="{{ $dokter->namadokter }}">

        </div>

        <div class="mb-3">

            <label>Spesialis</label>

            <input type="text" name="spesialis" class="form-control" value="{{ $dokter->spesialis }}">

        </div>

        <div class="mb-3">

            <label>Jadwal Praktik</label>

            <input type="text" name="jadwalpraktik" class="form-control" value="{{ $dokter->jadwalpraktik }}">

        </div>

        <button type="submit" class="btn btn-success">

            Update

        </button>

    </form>
@endsection
