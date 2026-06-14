<?php $__env->startSection('content'); ?>
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
                <span class="info-box-icon bg-info text-white elevation-1"><i class="bi bi-capsule"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Obat</span>
                    <span class="info-box-number fs-4"><?php echo e($totalObat); ?></span>
                </div>
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box border shadow-sm rounded">
                <span class="info-box-icon bg-success text-white elevation-1"><i class="bi bi-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kategori Obat</span>
                    <span class="info-box-number fs-4"><?php echo e($totalKategori); ?></span>
                </div>
            </div>
        </div>

        <!-- Total Pesanan -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box border shadow-sm rounded">
                <span class="info-box-icon bg-warning text-white elevation-1"><i class="bi bi-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Pesanan</span>
                    <span class="info-box-number fs-4"><?php echo e($totalPesanan); ?></span>
                </div>
            </div>
        </div>

        <!-- Total Pelanggan -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box border shadow-sm rounded">
                <span class="info-box-icon bg-primary text-white elevation-1"><i class="bi bi-people"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pelanggan Aktif</span>
                    <span class="info-box-number fs-4"><?php echo e($totalPelanggan); ?></span>
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
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><a href="/pesanan/<?php echo e($order->id); ?>">#ORD-<?php echo e($order->id); ?></a></td>
                                <td><?php echo e($order->pelanggan->nama ?? 'Umum'); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($order->tanggal_pesanan)->format('d M Y, H:i')); ?></td>
                                <td>
                                    <?php if($order->status == 'selesai'): ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php elseif($order->status == 'proses'): ?>
                                        <span class="badge bg-warning">Proses</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><?php echo e(ucfirst($order->status)); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>Rp <?php echo e(number_format($order->total_harga, 0, ',', '.')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada pesanan terbaru.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="/pesanan" class="text-decoration-none text-primary fw-bold">Lihat Semua Pesanan</a>
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
                        <a href="/obat/create" class="btn btn-outline-primary text-start"><i class="bi bi-plus-circle me-2"></i>Tambah Data Obat</a>
                        <a href="/kategori/create" class="btn btn-outline-success text-start"><i class="bi bi-tags me-2"></i>Tambah Kategori</a>
                        <a href="/pesanan" class="btn btn-outline-warning text-start"><i class="bi bi-cart-check me-2"></i>Kelola Pesanan Masuk</a>
                        <a href="/resep" class="btn btn-outline-info text-start"><i class="bi bi-file-medical me-2"></i>Validasi Resep Dokter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>