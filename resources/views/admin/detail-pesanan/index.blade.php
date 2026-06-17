@extends('layouts.main')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom d-flex align-items-center">
            <h3 class="card-title fw-bold text-primary m-0">
                <i class="bi bi-list-check me-2"></i>Detail Pesanan
            </h3>

            <a href="{{ route('detail-pesanan.create') }}" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle me-1"></i>Tambah Detail
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
                        <th>Pesanan</th>
                        <th>Obat</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($detailPesanans as $i => $detail)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td><span
                                    class="badge border border-primary text-primary">#{{ $detail->pesanan->id ?? $detail->pesanan_id }}</span>
                            </td>
                            <td class="fw-semibold">{{ $detail->obat->nama_obat ?? '-' }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('detail-pesanan.edit', $detail->id) }}"
                                    class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('detail-pesanan.destroy', $detail->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus detail pesanan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data detail pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
