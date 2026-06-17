@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-plus-circle me-2"></i>Tambah Detail
                        Pesanan</h3>
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
                    <form action="{{ route('detail-pesanan.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pesanan</label>
                                <select name="pesanan_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Pesanan --</option>
                                    @foreach ($pesanans as $pesanan)
                                        <option value="{{ $pesanan->id }}"
                                            {{ old('pesanan_id') == $pesanan->id ? 'selected' : '' }}>
                                            #{{ $pesanan->id }} — {{ $pesanan->pelanggan->nama ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Obat</label>
                                <select name="obat_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Obat --</option>
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}" {{ old('obat_id') == $obat->id ? 'selected' : '' }}>
                                            {{ $obat->nama_obat }} (Rp {{ number_format($obat->harga, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', 1) }}"
                                    min="1" required>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="bi bi-check-circle me-1"></i>Simpan</button>
                            <a href="{{ route('detail-pesanan.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-1"></i>Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
