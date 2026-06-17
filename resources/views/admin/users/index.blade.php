@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom d-flex align-items-center">
            <h3 class="card-title fw-bold text-primary m-0">
                <i class="bi bi-people me-2"></i>Data Pengguna / Admin
            </h3>

            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle me-1"></i>Tambah Pengguna
            </a>
        </div>
        <div class="card-body p-0 table-responsive">
            @if (session('success'))
                <div class="alert alert-success m-3">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-hover table-striped m-0">
                <thead class="table-light text-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Ditambahkan Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="fw-bold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm text-primary border border-primary bg-light">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada pengguna (selain Anda).</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
