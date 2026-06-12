@extends('layouts.sipa')

@section('styles')
<style>
    .material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .glass-card {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(243, 232, 255, 0.5);
    }
    .timeline-active-gradient {
    background: linear-gradient(135deg, #7c3aed 0%, #630ed4 100%);
    }
</style>
@endsection

@section('content')
<div class="flex max-w-container-max mx-auto min-h-screen pt-20">
<!-- SideNavBar Shell -->
<aside class="fixed left-0 top-0 h-full hidden lg:flex flex-col p-4 z-40 bg-surface-container-low border-r border-outline-variant/20 w-72 pt-24">
<div class="mb-8 px-2">
<h2 class="font-headline-md text-headline-md font-bold text-primary">Portal Pengguna</h2>
<p class="font-body-md text-body-md text-on-surface-variant">SIPA Digital Health</p>
</div>
<nav class="flex-1 space-y-2">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg font-label-md text-label-md" href="{{ url('/dashboard') }}">
<span class="material-symbols-outlined">dashboard</span> Dashboard
            </a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg font-label-md text-label-md" href="{{ url('/upload-resep') }}">
<span class="material-symbols-outlined">description</span> Resep Saya
            </a>
<a class="flex items-center gap-3 px-4 py-3 bg-secondary-container text-on-secondary-container rounded-lg font-bold font-label-md text-label-md translate-x-1 transition-transform" href="{{ url('/riwayat-pesanan') }}">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">receipt_long</span> Riwayat Pesanan
            </a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg font-label-md text-label-md" href="{{ url('/lokasi-apotek') }}">
<span class="material-symbols-outlined">location_on</span> Lokasi Apotek
            </a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg font-label-md text-label-md" href="{{ url('/profil') }}">
<span class="material-symbols-outlined">settings</span> Pengaturan Akun
            </a>
</nav>
<div class="mt-auto p-4 bg-primary-container rounded-2xl text-on-primary-container">
<p class="font-label-md text-label-md font-bold mb-1">Butuh Bantuan?</p>
<p class="text-label-sm mb-3">Tim support kami siap membantu kendala pesanan Anda.</p>
<button class="w-full bg-on-primary-container text-primary-container py-2 rounded-lg font-label-sm text-label-sm hover:opacity-90 transition-opacity">Hubungi CS</button>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 lg:ml-72 px-4 md:px-margin-desktop py-8 overflow-x-hidden">
<div class="mb-10">
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Riwayat Pesanan</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Lacak status pesanan aktif dan lihat riwayat transaksi Anda.</p>
</div>

<!-- Active Order Tracking (Only show if there is an active order) -->
@if($pesananAktif)
<section class="mb-12">
<h2 class="font-headline-md text-headline-md text-on-surface mb-6">Sedang Berjalan</h2>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
<!-- Tracker Card -->
<div class="lg:col-span-2 glass-card rounded-3xl p-6 sm:p-8 shadow-sm">
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
<div>
<p class="font-label-md text-label-md text-primary mb-1">Pesanan #ORD-{{ str_pad($pesananAktif->id, 4, '0', STR_PAD_LEFT) }}</p>
<h3 class="font-headline-md text-headline-md text-on-surface">Estimasi Selesai: Hari Ini</h3>
</div>
<span class="bg-secondary-container text-on-secondary-container px-4 py-2 rounded-full font-label-md text-label-md font-bold">{{ $pesananAktif->status }}</span>
</div>
<!-- Progress Timeline -->
<div class="relative py-8">
<!-- Connecting Line -->
<div class="absolute top-1/2 left-[10%] right-[10%] h-1 bg-surface-container-highest -translate-y-1/2 rounded-full z-0">
<div class="h-full timeline-active-gradient rounded-full transition-all duration-1000 w-[50%]"></div>
</div>
<!-- Steps -->
<div class="relative z-10 flex justify-between">
<!-- Step 1 -->
<div class="flex flex-col items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-lg">receipt</span>
</div>
<div class="text-center">
<p class="font-label-md text-label-md text-on-surface">Pesanan Dibuat</p>
<p class="font-label-sm text-label-sm text-on-surface-variant/70">{{ \Carbon\Carbon::parse($pesananAktif->tanggal_pesanan)->format('d M Y') }}</p>
</div>
</div>
<!-- Step 2 -->
<div class="flex flex-col items-center gap-3">
<div class="w-10 h-10 rounded-full timeline-active-gradient flex items-center justify-center text-white shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-lg">sync</span>
</div>
<div class="text-center">
<p class="font-label-md text-label-md text-primary font-bold">Diproses</p>
<p class="font-label-sm text-label-sm text-on-surface-variant/70">Sekarang</p>
</div>
</div>
<!-- Step 3 -->
<div class="flex flex-col items-center gap-3">
<div class="w-10 h-10 rounded-full bg-surface-container-highest border-2 border-outline-variant/30 flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-lg">storefront</span>
</div>
<div class="text-center">
<p class="font-label-md text-label-md text-on-surface-variant">Siap Diambil</p>
<p class="font-label-sm text-label-sm text-on-surface-variant/40">Menunggu</p>
</div>
</div>
<!-- Step 4 -->
<div class="flex flex-col items-center gap-3">
<div class="w-10 h-10 rounded-full bg-surface-container-highest border-2 border-outline-variant/30 flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-lg">check_circle</span>
</div>
<div class="text-center">
<p class="font-label-md text-label-md text-on-surface-variant">Selesai</p>
</div>
</div>
</div>
</div>
<div class="flex items-center gap-4 pt-4 border-t border-outline-variant/20">
<div class="flex-1 flex items-center gap-4">
<div class="w-12 h-12 bg-primary-container/10 rounded-xl flex items-center justify-center text-primary">
<span class="material-symbols-outlined">medication</span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface">{{ $pesananAktif->detailPesanans->pluck('obat.nama_obat')->implode(', ') }} ({{ $pesananAktif->detailPesanans->count() }} items)</p>
<p class="font-body-md text-body-md text-on-surface-variant">Total: Rp {{ number_format($pesananAktif->total_harga, 0, ',', '.') }}</p>
</div>
</div>
</div>
</div>
<!-- Promo/Status Side Card -->
<div class="rounded-2xl overflow-hidden relative group cursor-pointer shadow-sm min-h-[300px]">
<div class="absolute inset-0 bg-primary/40 group-hover:bg-primary/30 transition-colors z-10"></div>
<div class="absolute inset-0 z-0">
<img alt="Pharmacy background" class="w-full h-full object-cover grayscale transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZa1nP4Y_3yuBWQQ9yybcMjhITYNaXdKpHG6druhIqiH9ZDkxRjwYp4STCMBJx5dmyr311EOlp8bsdlyXoIi9HUoDkQ7qv3kTXosKKrH9_aq9K1CkRtZNurztVDDXvbeHrC107YwJ1xWe_bk9aN32XDIDE-L0nadhoDi7EBvaGHJLP6s1NLiX0lpJvD0Oc0dj2wpFAXEOnAKalgkQCYyy6UUN4HFoAS-_Dkew3_hYC5YDSXKhaKuslQbs-SBk8p1hu_0fWmDKxgOTd"/>
</div>
<div class="absolute inset-0 z-20 p-8 flex flex-col justify-end">
<h4 class="font-headline-md text-headline-md text-white mb-2">Apotek Terdekat</h4>
<p class="font-body-md text-body-md text-primary-fixed leading-snug">Kimia Farma Sudirman siap melayani pengambilan pesanan Anda.</p>
<div class="mt-4 flex items-center gap-2 text-white font-label-md text-label-md">
<span>Lihat Lokasi</span>
<span class="material-symbols-outlined">arrow_forward</span>
</div>
</div>
</div>
</div>
</section>
@endif

<!-- Order History List -->
<section>
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
<h2 class="font-headline-md text-headline-md text-on-surface">Riwayat Transaksi</h2>
<!-- Filter Chips -->
<div class="flex flex-wrap gap-2">
<button class="bg-secondary-container text-on-secondary-container px-4 py-1.5 rounded-full font-label-sm text-label-sm font-bold border border-secondary-container hover:bg-secondary-container/80 transition-colors">Semua</button>
<button class="bg-surface-container-lowest text-on-surface-variant px-4 py-1.5 rounded-full font-label-sm text-label-sm border border-outline-variant/30 hover:bg-surface-container-low transition-colors">Selesai</button>
<button class="bg-surface-container-lowest text-on-surface-variant px-4 py-1.5 rounded-full font-label-sm text-label-sm border border-outline-variant/30 hover:bg-surface-container-low transition-colors">Dibatalkan</button>
</div>
</div>
<div class="space-y-4">
@forelse($pesananSelesai as $pesanan)
<!-- History Card -->
<div class="glass-card rounded-2xl p-6 hover:border-primary/30 transition-colors cursor-pointer group flex flex-col md:flex-row gap-6 md:items-center">
<div class="w-16 h-16 rounded-xl {{ $pesanan->status == 'Dibatalkan' ? 'bg-error-container text-error' : 'bg-surface-container text-primary' }} flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[32px]">{{ $pesanan->status == 'Dibatalkan' ? 'cancel' : 'check_circle' }}</span>
</div>
<div class="flex-1">
<div class="flex items-center gap-3 mb-1">
<h3 class="font-headline-md text-headline-md text-on-surface">Pesanan #ORD-{{ str_pad($pesanan->id, 4, '0', STR_PAD_LEFT) }}</h3>
<span class="{{ $pesanan->status == 'Dibatalkan' ? 'bg-error-container text-error' : 'bg-surface-container-high text-on-surface-variant' }} px-2 py-0.5 rounded text-label-sm">{{ $pesanan->status }}</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-2">{{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d M Y') }} • {{ $pesanan->detailPesanans->count() }} Produk</p>
<p class="font-label-md text-label-md text-on-surface line-clamp-1">{{ $pesanan->detailPesanans->pluck('obat.nama_obat')->implode(', ') }}</p>
</div>
<div class="md:text-right flex flex-col items-start md:items-end gap-3 mt-4 md:mt-0">
<p class="font-headline-md text-headline-md text-primary">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
<button class="text-primary font-label-md text-label-md hover:underline flex items-center gap-1">
                            Beli Lagi <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
@empty
<div class="text-center py-10 bg-surface-container-lowest rounded-2xl border border-outline-variant/30">
    <span class="material-symbols-outlined text-[64px] text-outline-variant mb-4">history</span>
    <h3 class="font-headline-md text-on-surface mb-2">Belum Ada Riwayat</h3>
    <p class="text-on-surface-variant">Anda belum memiliki riwayat pesanan yang selesai.</p>
</div>
@endforelse

<!-- Pagination -->
@if($pesananSelesai->hasPages())
<div class="mt-8 flex justify-center">
    {{ $pesananSelesai->links() }}
</div>
@endif

</div>
</section>
</main>
</div>
@endsection
