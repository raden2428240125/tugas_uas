@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom d-flex align-items-center">
            <h3 class="card-title fw-bold text-primary m-0">
                <i class="bi bi-credit-card me-2"></i>Data Pembayaran
            </h3>

            <a href="{{ route('pembayaran.create') }}" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle me-1"></i>Tambah Pembayaran
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
                        <th>ID Pesanan</th>
                        <th>Metode</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                        <th>Tanggal Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembayaran as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td><span class="badge border border-primary text-primary">#{{ $item->pesanan_id }}</span></td>
                            <td>{{ $item->metode_pembayaran }}</td>
                            <td class="fw-semibold">Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                            <td>
                                @if ($item->status_pembayaran === 'Lunas')
                                    <span class="badge bg-primary">Lunas</span>
                                @elseif($item->status_pembayaran === 'Menunggu Verifikasi')
                                    <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                                @else
                                    <span class="badge bg-danger">Belum Dibayar</span>
                                @endif
                            </td>
                            <td>{{ $item->tanggal_pembayaran ? \Carbon\Carbon::parse($item->tanggal_pembayaran)->format('d M Y') : '-' }}
                            </td>
                            <td>
                                <a href="{{ route('pembayaran.edit', $item->id) }}"
                                    class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus pembayaran ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
