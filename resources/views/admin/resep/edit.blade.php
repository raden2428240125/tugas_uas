@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-pencil-square me-2"></i>Edit Resep</h3>
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
                    <form action="{{ route('resep.update', $resep->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pelanggan</label>
                                <select name="pelanggan_id" class="form-select" required>
                                    @foreach ($pelanggan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('pelanggan_id', $resep->pelanggan_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select" required>
                                    @foreach (['Menunggu Verifikasi', 'Disetujui', 'Ditolak'] as $s)
                                        <option value="{{ $s }}"
                                            {{ old('status', $resep->status) == $s ? 'selected' : '' }}>{{ $s }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">File Resep</label>
                                <input type="text" name="file_resep" class="form-control"
                                    value="{{ old('file_resep', $resep->file_resep) }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Catatan</label>
                                <textarea name="catatan" class="form-control" rows="3">{{ old('catatan', $resep->catatan) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="bi bi-check-circle me-1"></i>Update</button>
                            <a href="{{ route('resep.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-1"></i>Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
