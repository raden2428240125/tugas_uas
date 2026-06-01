@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Resep</h2>

    <form action="/resep" method="POST">

        @csrf

        <div class="mb-3">

            <label>Pelanggan</label>

            <select name="pelanggan_id" class="form-control" required>

                <option value="">
                    -- Pilih Pelanggan --
                </option>

                @foreach ($pelanggan as $item)
                    <option value="{{ $item->id }}">

                        {{ $item->nama }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>File Resep</label>

            <input type="text" name="file_resep" class="form-control" placeholder="contoh: resep_rara.jpg" required>

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control" required>

                <option value="Menunggu Verifikasi">
                    Menunggu Verifikasi
                </option>

                <option value="Disetujui">
                    Disetujui
                </option>

                <option value="Ditolak">
                    Ditolak
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Catatan</label>

            <textarea name="catatan" class="form-control" rows="3"></textarea>

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

        <a href="/resep" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
