@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Pasien</h2>

    <form action="{{ route('pasien.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>ID Pasien</label>

            <input type="text" name="idpasien" class="form-control">

        </div>

        <div class="mb-3">

            <label>Nama Pasien</label>

            <input type="text" name="namapasien" class="form-control">

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat" class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>No Telepon</label>

            <input type="text" name="notelp" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jenis Kelamin</label>

            <select name="jeniskelamin" class="form-control">

                <option value="Laki-laki">
                    Laki-laki
                </option>

                <option value="Perempuan">
                    Perempuan
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Golongan Darah</label>

            <input type="text" name="golongandarah" class="form-control">

        </div>

        <div class="mb-3">

            <label>Alergi Obat</label>

            <input type="text" name="alergiobat" class="form-control">

        </div>

        <div class="mb-3">

            <label>Keluhan</label>

            <textarea name="keluhan" class="form-control"></textarea>

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

    </form>
@endsection
