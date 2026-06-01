@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Pesanan</h2>

    <form action="/pesanan/{{ $pesanan->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Pelanggan</label>

            <select name="pelanggan_id" class="form-control" required>

                @foreach ($pelanggan as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $pesanan->pelanggan_id ? 'selected' : '' }}>

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
                    <option value="{{ $item->id }}" {{ $item->id == $pesanan->resep_id ? 'selected' : '' }}>

                        {{ $item->file_resep }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Pesanan</label>

            <input type="date" name="tanggal_pesanan" class="form-control" value="{{ $pesanan->tanggal_pesanan }}"
                required>

        </div>

        <div class="mb-3">

            <label>Total Harga</label>

            <input type="number" name="total_harga" class="form-control" value="{{ $pesanan->total_harga }}" required>

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="Menunggu Pembayaran" {{ $pesanan->status == 'Menunggu Pembayaran' ? 'selected' : '' }}>
                    Menunggu Pembayaran
                </option>

                <option value="Diproses" {{ $pesanan->status == 'Diproses' ? 'selected' : '' }}>
                    Diproses
                </option>

                <option value="Siap Diambil" {{ $pesanan->status == 'Siap Diambil' ? 'selected' : '' }}>
                    Siap Diambil
                </option>

                <option value="Selesai" {{ $pesanan->status == 'Selesai' ? 'selected' : '' }}>
                    Selesai
                </option>

                <option value="Dibatalkan" {{ $pesanan->status == 'Dibatalkan' ? 'selected' : '' }}>
                    Dibatalkan
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-success">

            Update

        </button>

        <a href="/pesanan" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
