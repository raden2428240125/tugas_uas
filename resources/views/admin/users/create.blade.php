@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom">
            <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-person-plus me-2"></i>Tambah Pengguna</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    <small class="text-muted d-block">Gunakan nama yang memuat kata "admin" (cth: admin2@sipa.com) apabila
                        ingin memberikan hak akses Admin.</small>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Pengguna</button>
                    <a href="{{ route('users.index') }}" class="btn text-primary border border-primary bg-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

