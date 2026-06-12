<?php $__env->startSection('content'); ?>
<!-- Sidebar & Content Layout -->
<div class="flex pt-20">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-full hidden lg:flex flex-col p-4 z-40 bg-surface-container-low border-r border-outline-variant/20 w-72">
<div class="mt-20 px-4 mb-10">
<h2 class="font-headline-md text-headline-md font-bold text-primary">Portal Pengguna</h2>
<p class="text-on-surface-variant text-label-md mt-1">SIPA Digital Health</p>
</div>
<nav class="flex-1 space-y-2">
<a class="flex items-center gap-4 px-4 py-3 bg-secondary-container text-on-secondary-container rounded-lg font-bold transition-transform active:translate-x-1" href="<?php echo e(url('/dashboard')); ?>">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?php echo e(url('/upload-resep')); ?>">
<span class="material-symbols-outlined">description</span>
<span class="font-label-md text-label-md">Resep Saya</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?php echo e(url('/riwayat-pesanan')); ?>">
<span class="material-symbols-outlined">receipt_long</span>
<span class="font-label-md text-label-md">Riwayat Pesanan</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?php echo e(url('/profil')); ?>">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md text-label-md">Pengaturan Akun</span>
</a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="<?php echo e(url('/lokasi-apotek')); ?>">
<span class="material-symbols-outlined">location_on</span>
<span class="font-label-md text-label-md">Lokasi Apotek</span>
</a>
</nav>
<div class="p-4 bg-primary-container rounded-2xl text-on-primary-container mt-auto">
<span class="material-symbols-outlined text-display-lg mb-2">support_agent</span>
<p class="font-label-md text-label-md font-bold mb-2">Butuh Bantuan?</p>
<a href="mailto:support@sipa.com" class="w-full bg-on-primary-container text-primary-container py-2 rounded-lg font-bold hover:opacity-90 transition-opacity flex justify-center text-center text-sm">Bantuan Medis</a>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 lg:ml-72 px-margin-mobile md:px-margin-desktop py-8 max-w-container-max mx-auto overflow-x-hidden">
<!-- Greeting & Quick Actions -->
<div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
<div>
<?php
    $hour = date('H');
    $greeting = 'Selamat Pagi';
    if ($hour >= 11 && $hour < 15) {
        $greeting = 'Selamat Siang';
    } elseif ($hour >= 15 && $hour < 18) {
        $greeting = 'Selamat Sore';
    } elseif ($hour >= 18) {
        $greeting = 'Selamat Malam';
    }
    $userName = auth()->user() ? explode(' ', trim(auth()->user()->name))[0] : 'Pengguna';
?>
<h2 class="font-headline-lg text-headline-lg text-on-surface"><?php echo e($greeting); ?>, <?php echo e($userName); ?> 👋</h2>
<p class="text-on-surface-variant font-body-md mt-1">Ini adalah ringkasan kesehatan dan pesanan Anda hari ini.</p>
</div>
<a href="<?php echo e(url('/katalog')); ?>" class="bg-primary-container text-on-primary-container flex items-center justify-center gap-3 px-8 py-4 rounded-xl font-bold hover:shadow-lg hover:shadow-primary/20 transition-all active:scale-95">
<span class="material-symbols-outlined">medication</span>
<span class="font-label-md text-label-md">Pesan Obat Baru</span>
</a>
</div>
<!-- Stats Grid - Bento Layout -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
<a href="<?php echo e(url('/riwayat-pesanan')); ?>" class="block glass-card p-6 rounded-2xl flex flex-col gap-4 group hover:border-primary/40 transition-all cursor-pointer">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined">local_shipping</span>
</div>
<span class="text-on-surface-variant font-label-sm">+2 Pesanan Hari Ini</span>
</div>
<div>
<p class="text-on-surface-variant font-label-md">Pesanan Aktif</p>
<h3 class="text-display-lg font-display-lg text-primary"><?php echo e(str_pad($totalPesanan, 2, '0', STR_PAD_LEFT)); ?></h3>
</div>
<div class="h-1 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary w-2/3"></div>
</div>
</a>

<a href="<?php echo e(url('/upload-resep')); ?>" class="block glass-card p-6 rounded-2xl flex flex-col gap-4 group hover:border-primary/40 transition-all cursor-pointer">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined">assignment</span>
</div>
<span class="text-on-surface-variant font-label-sm">Total 128 Berkas</span>
</div>
<div>
<p class="text-on-surface-variant font-label-md">Resep Terunggah</p>
<h3 class="text-display-lg font-display-lg text-primary"><?php echo e(str_pad($totalResep, 2, '0', STR_PAD_LEFT)); ?></h3>
</div>
<div class="h-1 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary w-1/4"></div>
</div>
</a>

<a href="<?php echo e(url('/katalog')); ?>" class="block glass-card p-6 rounded-2xl flex flex-col gap-4 group hover:border-primary/40 transition-all cursor-pointer">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">favorite</span>
</div>
<span class="text-on-surface-variant font-label-sm">Hemat s.d 15%</span>
</div>
<div>
<p class="text-on-surface-variant font-label-md">Obat Favorit</p>
<h3 class="text-display-lg font-display-lg text-primary">08</h3>
</div>
<div class="flex -space-x-2">
<div class="w-8 h-8 rounded-full border-2 border-surface bg-slate-200 overflow-hidden">
<img alt="Drug 1" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD44Q5qKzTNgIrYdejvrYdiotY1c2OpN2pMiQPX_23Sn_n261EuaSdHywPq3gqrSKXrsFpzuSKJd78f-cUTNLzf9VnMsWZ1nq1rcIjLqRM7-UJmodyuYq551fTBkbQj5kfwChGzvMWYYVAlg-O9FQRrIbu38W6Qp-TyTTYtVL5OttbfsolVcccTZCK9pwe40wtyepREL-nqNBct3bGPkSfR7J8pC67BRfwhRz7rqYGI3YuNdn5Qg1b_y4PeKVHjs10FbS-oQuC4kUiu"/>
</div>
<div class="w-8 h-8 rounded-full border-2 border-surface bg-slate-200 overflow-hidden">
<img alt="Drug 2" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtp9RqbyeK74TlkYxpZ_GJf7jSAQySrXdhkffJmh0XPCGu4rUGCyFngLJbbqb1VLFcMQj2Cck1MEsOxqmfAuvAFXVmm5F6A8PAh36L2-dW25t3yrEfFXJKGMPEmmdN2VtKGuEBK5l0hUZIz-wlXXoDowxgYYg3ZXW55W_gXMjfrZbXx6wX7I2qm8IHDxDrNgHGZr4VBBurOlEY91eLqORMNCltebCgxfYclQwYQZZaCK3O2LhRJCluXBy1UGCPNTUJIKdlcV7RPXFF"/>
</div>
<div class="w-8 h-8 rounded-full border-2 border-surface bg-primary-fixed flex items-center justify-center text-primary text-[10px] font-bold">+6</div>
</div>
</a>
</div>
<!-- Orders & Tips Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
<!-- Orders Table -->
<div class="lg:col-span-2 glass-card rounded-2xl overflow-hidden">
<div class="p-6 border-b border-outline-variant/20 flex items-center justify-between">
<h3 class="font-headline-md text-headline-md text-on-surface">Pesanan Terbaru</h3>
<a class="text-primary font-label-md hover:underline" href="#">Lihat Semua</a>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant uppercase text-[11px] tracking-widest font-bold">
<th class="px-6 py-4">ID Pesanan</th>
<th class="px-6 py-4">Produk</th>
<th class="px-6 py-4">Status</th>
<th class="px-6 py-4">Total Harga</th>
<th class="px-6 py-4"></th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<?php $__empty_1 = true; $__currentLoopData = $pesananTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr class="hover:bg-primary-container/5 transition-colors">
<td class="px-6 py-4 font-label-md text-primary">#SIP-<?php echo e($pesanan->id); ?></td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-bold"><?php echo e($pesanan->detailPesanans->first()->obat->nama_obat ?? 'Produk'); ?></span>
<span class="text-xs text-on-surface-variant"><?php echo e($pesanan->detailPesanans->sum('jumlah')); ?> Item</span>
</div>
</td>
<td class="px-6 py-4">
<span class="px-3 py-1 rounded-full <?php if($pesanan->status == 'Selesai'): ?> bg-green-100 text-green-700 <?php elseif($pesanan->status == 'Dibatalkan'): ?> bg-error-container text-on-error-container <?php else: ?> bg-secondary-container text-on-secondary-container <?php endif; ?> text-[10px] font-bold uppercase tracking-wider"><?php echo e($pesanan->status); ?></span>
</td>
<td class="px-6 py-4 font-bold">Rp <?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></td>
<td class="px-6 py-4 text-right">
<a href="<?php echo e(url('/riwayat-pesanan')); ?>" class="material-symbols-outlined text-on-surface-variant hover:text-primary">chevron_right</a>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
<td colspan="5" class="px-6 py-8 text-center text-on-surface-variant">Belum ada pesanan terbaru.</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
<!-- Healthcare Tips -->
<div class="flex flex-col gap-6">
<div class="relative overflow-hidden rounded-2xl bg-primary-container p-6 text-on-primary-container min-h-[200px] flex flex-col justify-end">

<div class="relative z-10">
<span class="material-symbols-outlined text-display-lg mb-4">lightbulb</span>
<h4 class="font-headline-md text-headline-md mb-2">Tips Kesehatan</h4>
<p class="font-body-md opacity-90 leading-relaxed">Jangan lupa minum air mineral minimal 2 liter per hari untuk menjaga hidrasi ginjal Anda.</p>
<button class="mt-4 text-label-md font-bold underline">Baca Selengkapnya</button>
</div>
</div>
<div class="glass-card p-6 rounded-2xl">
<h4 class="font-label-md text-label-md font-bold text-on-surface mb-4">Pengingat Obat</h4>
<div class="space-y-4">
<div class="flex items-center gap-4 p-3 rounded-xl bg-surface-container-high border border-primary/10">
<div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center text-on-primary-container">
<span class="material-symbols-outlined">schedule</span>
</div>
<div>
<p class="font-bold text-sm">Amoxicillin</p>
<p class="text-[10px] text-on-surface-variant">Minum setelah makan • 13:00</p>
</div>
</div>
<div class="flex items-center gap-4 p-3 rounded-xl bg-surface-container-high border border-primary/10 opacity-50">
<div class="w-10 h-10 rounded-lg bg-surface-variant flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined">check_circle</span>
</div>
<div>
<p class="font-bold text-sm">Vitamin C</p>
<p class="text-[10px] text-on-surface-variant">Selesai • 08:00</p>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.querySelectorAll('.glass-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-4px)';
            card.style.boxShadow = '0 12px 24px -10px rgba(99, 14, 212, 0.15)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sipa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/dashboard.blade.php ENDPATH**/ ?>