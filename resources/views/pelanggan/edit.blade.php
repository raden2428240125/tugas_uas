@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Pelanggan</h2>

    <form action="/pelanggan/{{ $pelanggan->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Nama</label>

            <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}" required>

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}" required>

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input type="text" name="password" class="form-control" value="{{ $pelanggan->password }}" required>

        </div>

        <div class="mb-3">

            <label>No Telepon</label>

            <input type="text" name="no_telp" class="form-control" value="{{ $pelanggan->no_telp }}" required>

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat" class="form-control" rows="3" required>{{ $pelanggan->alamat }}</textarea>

        </div>

        <button type="submit" class="btn btn-success">

            Update

        </button>

        <a href="/pelanggan" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
