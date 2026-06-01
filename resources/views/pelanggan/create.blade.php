@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Pelanggan</h2>

    <form action="/pelanggan" method="POST">

        @csrf

        <div class="mb-3">

            <label>Nama</label>

            <input type="text" name="nama" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email" name="email" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input type="password" name="password" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>No Telepon</label>

            <input type="text" name="no_telp" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat" class="form-control" rows="3" required></textarea>

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

        <a href="/pelanggan" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
