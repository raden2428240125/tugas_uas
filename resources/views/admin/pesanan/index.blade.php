@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom d-flex align-items-center">
            <h3 class="card-title fw-bold text-primary m-0">
                <i class="bi bi-cart me-2"></i>Data Pesanan
            </h3>

            <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle me-1"></i>Tambah Pesanan
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
                        <th>Resep</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanan as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $item->pelanggan->nama ?? '-' }}</td>
                            <td>{{ $item->resep ? 'Ada' : '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pesanan)->format('d M Y') }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $statusMap = [
                                        'Selesai' => 'bg-primary',
                                        'Siap Diambil' => 'bg-info',
                                        'Diproses' => 'bg-warning text-dark',
                                        'Dibatalkan' => 'bg-danger',
                                        'Menunggu Pembayaran' => 'bg-secondary',
                                    ];
                                    $cls = $statusMap[$item->status] ?? 'bg-secondary';
                                @endphp
                                <span class="badge {{ $cls }}">{{ $item->status }}</span>
                            </td>
                            <td>
                                <a href="{{ route('pesanan.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="{{ route('pesanan.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus pesanan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
