@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-pencil-square me-2"></i>Edit Pembayaran
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pesanan</label>
                                <select name="pesanan_id" class="form-select" required>
                                    @foreach ($pesanan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('pesanan_id', $pembayaran->pesanan_id) == $item->id ? 'selected' : '' }}>
                                            Pesanan #{{ $item->id }} — {{ $item->pelanggan->nama ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Metode Pembayaran</label>
                                <select name="metode_pembayaran" class="form-select" required>
                                    @foreach (['QRIS', 'Transfer Bank', 'E-Wallet', 'COD'] as $m)
                                        <option value="{{ $m }}"
                                            {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == $m ? 'selected' : '' }}>
                                            {{ $m }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jumlah Bayar (Rp)</label>
                                <input type="number" name="jumlah_bayar" class="form-control"
                                    value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" min="0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status Pembayaran</label>
                                <select name="status_pembayaran" class="form-select" required>
                                    @foreach (['Belum Dibayar', 'Menunggu Verifikasi', 'Lunas'] as $s)
                                        <option value="{{ $s }}"
                                            {{ old('status_pembayaran', $pembayaran->status_pembayaran) == $s ? 'selected' : '' }}>
                                            {{ $s }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tanggal Pembayaran <small
                                        class="text-muted">(opsional)</small></label>
                                <input type="date" name="tanggal_pembayaran" class="form-control"
                                    value="{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran) }}">
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="bi bi-check-circle me-1"></i>Update</button>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-1"></i>Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
