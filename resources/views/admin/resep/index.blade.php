@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom d-flex align-items-center">
            <h3 class="card-title fw-bold text-primary m-0">
                <i class="bi bi-file-medical me-2"></i>Data Resep
            </h3>

            <a href="{{ route('resep.create') }}" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle me-1"></i>Tambah Resep
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
                        <th>Pelanggan</th>
                        <th>File Resep</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($resep as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $item->pelanggan->nama ?? '-' }}</td>
                            <td>
                                @if ($item->file_resep)
                                    <a href="{{ asset('storage/' . $item->file_resep) }}" target="_blank"
                                        class="btn btn-sm btn-outline-info"><i class="bi bi-eye me-1"></i>Lihat</a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusMap = [
                                        'Disetujui' => 'bg-primary',
                                        'Ditolak' => 'bg-danger',
                                        'Menunggu Verifikasi' => 'bg-warning text-dark',
                                    ];
                                    $cls = $statusMap[$item->status] ?? 'bg-secondary';
                                @endphp
                                <span class="badge {{ $cls }}">{{ $item->status }}</span>
                            </td>
                            <td>{{ $item->catatan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('resep.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="{{ route('resep.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus resep ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data resep.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
