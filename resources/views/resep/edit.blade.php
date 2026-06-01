@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Resep</h2>

    <form action="/resep/{{ $resep->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Pelanggan</label>

            <select name="pelanggan_id" class="form-control" required>

                @foreach ($pelanggan as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $resep->pelanggan_id ? 'selected' : '' }}>

                        {{ $item->nama }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>File Resep</label>

            <input type="text" name="file_resep" class="form-control" value="{{ $resep->file_resep }}" required>

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="Menunggu Verifikasi" {{ $resep->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>
                    Menunggu Verifikasi
                </option>

                <option value="Disetujui" {{ $resep->status == 'Disetujui' ? 'selected' : '' }}>
                    Disetujui
                </option>

                <option value="Ditolak" {{ $resep->status == 'Ditolak' ? 'selected' : '' }}>
                    Ditolak
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Catatan</label>

            <textarea name="catatan" class="form-control" rows="3">{{ $resep->catatan }}</textarea>

        </div>

        <button type="submit" class="btn btn-success">

            Update

        </button>

        <a href="/resep" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
