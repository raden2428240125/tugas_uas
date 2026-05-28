@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Pasien</h2>

    <form action="/pasien/{{ $pasien->idpasien }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>ID Pasien</label>

            <input type="text" name="idpasien" class="form-control" value="{{ $pasien->idpasien }}" readonly>

        </div>

        <div class="mb-3">

            <label>Nama Pasien</label>

            <input type="text" name="namapasien" class="form-control" value="{{ $pasien->namapasien }}">

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea name="alamat" class="form-control">{{ $pasien->alamat }}</textarea>

        </div>

        <div class="mb-3">

            <label>No Telepon</label>

            <input type="text" name="notelp" class="form-control" value="{{ $pasien->notelp }}">

        </div>

        <div class="mb-3">

            <label>Jenis Kelamin</label>

            <select name="jeniskelamin" class="form-control">

                <option value="Laki-laki" {{ $pasien->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>

                <option value="Perempuan" {{ $pasien->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Golongan Darah</label>

            <input type="text" name="golongandarah" class="form-control" value="{{ $pasien->golongandarah }}">

        </div>

        <div class="mb-3">

            <label>Alergi Obat</label>

            <input type="text" name="alergiobat" class="form-control" value="{{ $pasien->alergiobat }}">

        </div>

        <div class="mb-3">

            <label>Keluhan</label>

            <textarea name="keluhan" class="form-control">{{ $pasien->keluhan }}</textarea>

        </div>

        <button type="submit" class="btn btn-success">

            Update

        </button>

    </form>
@endsection
