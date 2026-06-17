@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom d-flex align-items-center">
            <h3 class="card-title fw-bold text-primary m-0">
                <i class="bi bi-people me-2"></i>Data Pelanggan
            </h3>

            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle me-1"></i>Tambah Pelanggan
            </a>
        </div>
        <div class="card-body p-0 table-responsive">
            @if (session('success'))
                <div class="alert alert-success m-3">{{ session('success') }}</div>
            @endif
            <table class="table table-hover table-striped m-0">
                <thead class="table-light text-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggan as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td class="text-truncate" style="max-width:180px">{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus pelanggan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data pelanggan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const val = this.value.toLowerCase();
            document.querySelectorAll('tbody tr').forEach(r => {
                r.style.display = r.innerText.toLowerCase().includes(val) ? '' : 'none';
            });
        });
    </script>
@endsection
