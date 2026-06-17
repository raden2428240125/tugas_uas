@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-pencil-square me-2"></i>Edit Pesanan
                        #{{ $pesanan->id }}</h3>
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
                    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pelanggan</label>
                                <select name="pelanggan_id" class="form-select" required>
                                    @foreach ($pelanggan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('pelanggan_id', $pesanan->pelanggan_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Resep <small
                                        class="text-muted">(opsional)</small></label>
                                <select name="resep_id" class="form-select">
                                    <option value="">-- Tanpa Resep --</option>
                                    @foreach ($resep as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('resep_id', $pesanan->resep_id) == $item->id ? 'selected' : '' }}>Resep
                                            #{{ $item->id }} - {{ $item->pelanggan->nama ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tanggal Pesanan</label>
                                <input type="date" name="tanggal_pesanan" class="form-control"
                                    value="{{ old('tanggal_pesanan', $pesanan->tanggal_pesanan) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Total Harga (Rp)</label>
                                <input type="number" name="total_harga" class="form-control"
                                    value="{{ old('total_harga', $pesanan->total_harga) }}" min="0" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select" required>
                                    @foreach (['Menunggu Pembayaran', 'Diproses', 'Siap Diambil', 'Selesai', 'Dibatalkan'] as $s)
                                        <option value="{{ $s }}"
                                            {{ old('status', $pesanan->status) == $s ? 'selected' : '' }}>{{ $s }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="bi bi-check-circle me-1"></i>Update</button>
                            <a href="{{ route('pesanan.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-1"></i>Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
