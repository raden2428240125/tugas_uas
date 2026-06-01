@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Pembayaran</h2>

    <form action="/pembayaran" method="POST">

        @csrf

        <div class="mb-3">

            <label>Pesanan</label>

            <select name="pesanan_id" class="form-control" required>

                <option value="">
                    -- Pilih Pesanan --
                </option>

                @foreach ($pesanan as $item)
                    <option value="{{ $item->id }}">

                        Pesanan #{{ $item->id }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Metode Pembayaran</label>

            <select name="metode_pembayaran" class="form-control" required>

                <option value="QRIS">QRIS</option>

                <option value="Transfer Bank">
                    Transfer Bank
                </option>

                <option value="E-Wallet">
                    E-Wallet
                </option>

                <option value="COD">
                    COD
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Jumlah Bayar</label>

            <input type="number" name="jumlah_bayar" class="form-control" required>

        </div>

        <div class="mb-3">

            <label>Status Pembayaran</label>

            <select name="status_pembayaran" class="form-control" required>

                <option value="Belum Dibayar">
                    Belum Dibayar
                </option>

                <option value="Menunggu Verifikasi">
                    Menunggu Verifikasi
                </option>

                <option value="Lunas">
                    Lunas
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Pembayaran</label>

            <input type="date" name="tanggal_pembayaran" class="form-control">

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

        <a href="/pembayaran" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
