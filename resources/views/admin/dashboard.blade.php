@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark fw-bold">Dashboard Admin SIPA</h1>
            <p class="text-muted">Ringkasan operasional apotek hari ini.</p>
        </div>
    </div>

    <!-- Info boxes -->
    <div class="row">
        <!-- Total Obat -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box border shadow-sm rounded">
                <span class="info-box-icon border border-primary text-primary bg-light elevation-1"><i class="bi bi-capsule"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Obat</span>
                    <span class="info-box-number fs-4">{{ $totalObat }}</span>
                </div>
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box border shadow-sm rounded">
                <span class="info-box-icon border border-primary text-primary bg-light elevation-1"><i class="bi bi-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kategori Obat</span>
                    <span class="info-box-number fs-4">{{ $totalKategori }}</span>
                </div>
            </div>
        </div>

        <!-- Total Pesanan -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box border shadow-sm rounded">
                <span class="info-box-icon border border-primary text-primary bg-light elevation-1"><i class="bi bi-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Pesanan</span>
                    <span class="info-box-number fs-4">{{ $totalPesanan }}</span>
                </div>
            </div>
        </div>

        <!-- Total Pelanggan -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box border shadow-sm rounded">
                <span class="info-box-icon border border-primary text-primary bg-light elevation-1"><i class="bi bi-people"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pelanggan Aktif</span>
                    <span class="info-box-number fs-4">{{ $totalPelanggan }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Recent Orders Table -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-clock-history me-2"></i>Pesanan Terbaru</h3>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-hover table-striped m-0">
                        <thead class="table-light text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders as $order)
                            <tr>
                                <td><a href="/admin/pesanan/{{ $order->id }}" class="text-primary fw-bold">#ORD-{{ $order->id }}</a></td>
                                <td>{{ $order->pelanggan->nama ?? 'Umum' }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->tanggal_pesanan)->format('d M Y, H:i') }}</td>
                                <td>
                                    @if($order->status == 'selesai')
                                        <span class="badge bg-primary text-white">Selesai</span>
                                    @elseif($order->status == 'proses')
                                        <span class="badge bg-primary bg-opacity-75">Proses</span>
                                    @else
                                        <span class="badge border border-primary text-primary">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </td>
                                <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada pesanan terbaru.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="/admin/pesanan" class="text-decoration-none text-primary fw-bold">Lihat Semua Pesanan</a>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title fw-bold text-primary m-0"><i class="bi bi-lightning-charge me-2"></i>Aksi Cepat</h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="/admin/obat/create" class="btn btn-primary text-start"><i class="bi bi-plus-circle me-2"></i>Tambah Data Obat</a>
                        <a href="/admin/kategori/create" class="btn btn-outline-primary text-start"><i class="bi bi-tags me-2"></i>Tambah Kategori</a>
                        <a href="/admin/pesanan" class="btn btn-outline-primary text-start"><i class="bi bi-cart-check me-2"></i>Kelola Pesanan Masuk</a>
                        <a href="/admin/resep" class="btn btn-outline-primary text-start"><i class="bi bi-file-medical me-2"></i>Validasi Resep Dokter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

