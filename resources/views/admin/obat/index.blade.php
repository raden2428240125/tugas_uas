@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom d-flex align-items-center">
            <h3 class="card-title fw-bold text-primary m-0">
                <i class="bi bi-capsule me-2"></i>Data Obat
            </h3>

            <a href="{{ route('obat.create') }}" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle me-1"></i>Tambah Obat
            </a>
        </div>

        <div class="card-body border-bottom py-2">
            <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari nama obat...">
        </div>
        <div class="card-body p-0 table-responsive">
            @if (session('success'))
                <div class="alert alert-success m-3">{{ session('success') }}</div>
            @endif
            <table class="table table-hover table-striped m-0">
                <thead class="table-light text-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Kadaluarsa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obats as $i => $obat)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->jenis_obat }}</td>
                            <td>{{ $obat->kategori->nama_kategori ?? '-' }}</td>
                            <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                            <td>{{ $obat->satuan }}</td>
                            <td>
                                @if ($obat->stok <= 10)
                                    <span class="badge bg-danger">{{ $obat->stok }}</span>
                                @elseif($obat->stok <= 30)
                                    <span class="badge bg-warning text-dark">{{ $obat->stok }}</span>
                                @else
                                    <span class="badge bg-success">{{ $obat->stok }}</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-sm btn-outline-primary"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus obat ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">Belum ada data obat.</td>
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
