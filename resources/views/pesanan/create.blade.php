@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Pesanan</h2>

    <form action="/pesanan" method="POST">

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

            <label>Resep</label>

            <select name="resep_id" class="form-control">

                <option value="">
                    -- Tanpa Resep --
                </option>

                @foreach ($resep as $item)
                    <option value="{{ $item->id }}">

                        {{ $item->file_resep }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Pesanan</label>

            <input type="date" name="tanggal_pesanan" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>Total Harga</label>

            <input type="number" name="total_harga" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control" required>

                <option value="Menunggu Pembayaran">
                    Menunggu Pembayaran
                </option>

                <option value="Diproses">
                    Diproses
                </option>

                <option value="Siap Diambil">
                    Siap Diambil
                </option>

                <option value="Selesai">
                    Selesai
                </option>

                <option value="Dibatalkan">
                    Dibatalkan
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

        <a href="/pesanan" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
