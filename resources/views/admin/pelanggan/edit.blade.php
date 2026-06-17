@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-pencil-square me-2"></i>Edit Pelanggan
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
                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control"
                                    value="{{ old('nama', $pelanggan->nama) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $pelanggan->email) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Password Baru <small class="text-muted">(kosongkan
                                        jika tidak diubah)</small></label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">No Telepon</label>
                                <input type="text" name="no_telp" class="form-control"
                                    value="{{ old('no_telp', $pelanggan->no_telp) }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="bi bi-check-circle me-1"></i>Update</button>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-1"></i>Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
