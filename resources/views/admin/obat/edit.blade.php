@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-pencil-square me-2"></i>Edit Obat</h3>
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
                    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Obat</label>
                                <input type="text" name="nama_obat" class="form-control"
                                    value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jenis Obat</label>
                                <select name="jenis_obat" class="form-select" required>
                                    @foreach (['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Injeksi', 'Puyer'] as $j)
                                        <option value="{{ $j }}"
                                            {{ old('jenis_obat', $obat->jenis_obat) == $j ? 'selected' : '' }}>{{ $j }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Satuan</label>
                                <select name="satuan" class="form-select" required>
                                    @foreach (['Strip', 'Botol', 'Tube', 'Pcs', 'Papan', 'Box'] as $s)
                                        <option value="{{ $s }}"
                                            {{ old('satuan', $obat->satuan) == $s ? 'selected' : '' }}>{{ $s }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="kategori_id" class="form-select" required>
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('kategori_id', $obat->kategori_id) == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control"
                                    value="{{ old('harga', $obat->harga) }}" min="0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Stok</label>
                                <input type="number" name="stok" class="form-control"
                                    value="{{ old('stok', $obat->stok) }}" min="0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Tanggal Kadaluarsa</label>
                                <input type="date" name="tanggal_kadaluarsa" class="form-control"
                                    value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa) }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="bi bi-check-circle me-1"></i>Update</button>
                            <a href="{{ route('obat.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-1"></i>Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
