@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Pembayaran</h2>

    <form action="/pembayaran/{{ $pembayaran->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Pesanan</label>

            <select name="pesanan_id" class="form-control" required>

                @foreach ($pesanan as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $pembayaran->pesanan_id ? 'selected' : '' }}>

                        Pesanan #{{ $item->id }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Metode Pembayaran</label>

            <select name="metode_pembayaran" class="form-control">

                <option value="QRIS" {{ $pembayaran->metode_pembayaran == 'QRIS' ? 'selected' : '' }}>
                    QRIS
                </option>

                <option value="Transfer Bank" {{ $pembayaran->metode_pembayaran == 'Transfer Bank' ? 'selected' : '' }}>
                    Transfer Bank
                </option>

                <option value="E-Wallet" {{ $pembayaran->metode_pembayaran == 'E-Wallet' ? 'selected' : '' }}>
                    E-Wallet
                </option>

                <option value="COD" {{ $pembayaran->metode_pembayaran == 'COD' ? 'selected' : '' }}>
                    COD
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Jumlah Bayar</label>

            <input type="number" name="jumlah_bayar" class="form-control" value="{{ $pembayaran->jumlah_bayar }}" required>

        </div>

        <div class="mb-3">

            <label>Status Pembayaran</label>

            <select name="status_pembayaran" class="form-control">

                <option value="Belum Dibayar" {{ $pembayaran->status_pembayaran == 'Belum Dibayar' ? 'selected' : '' }}>
                    Belum Dibayar
                </option>

                <option value="Menunggu Verifikasi"
                    {{ $pembayaran->status_pembayaran == 'Menunggu Verifikasi' ? 'selected' : '' }}>
                    Menunggu Verifikasi
                </option>

                <option value="Lunas" {{ $pembayaran->status_pembayaran == 'Lunas' ? 'selected' : '' }}>
                    Lunas
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Pembayaran</label>

            <input type="date" name="tanggal_pembayaran" class="form-control"
                value="{{ $pembayaran->tanggal_pembayaran }}">

        </div>

        <button type="submit" class="btn btn-success">

            Update

        </button>

        <a href="/pembayaran" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
