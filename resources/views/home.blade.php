@extends('layouts.sipa')

@section('content')
<main class="pt-24">
<!-- Hero Section -->
<section class="relative px-margin-desktop py-16 overflow-hidden">

<div class="max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
<div class="space-y-8">
<div>
<span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md mb-6">Sistem Informasi Pelayanan Apotek</span>
<h1 class="font-display-lg text-display-lg text-on-background mb-4">
                            Halo, <span class="text-gradient">Pengguna</span>
</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                            Selamat datang di ekosistem kesehatan digital masa depan. Kelola resep, pantau inventaris obat, dan berikan layanan terbaik untuk pasien Anda dalam satu platform yang terintegrasi.
                        </p>
</div>
<!-- Modern Search Bar -->
<form action="{{ route('katalog') }}" method="GET" class="relative max-w-xl group">
<div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-primary">search</span>
</div>
<input name="search" class="w-full pl-12 pr-32 py-5 bg-white border-2 border-outline-variant/30 rounded-xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all font-body-md text-body-md shadow-lg shadow-primary/5 outline-none" placeholder="Cari obat, kategori, atau gejala..." type="text"/>
<button type="submit" class="absolute right-3 top-2.5 px-6 py-2.5 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all active:scale-95 shadow-md shadow-primary/20">Cari Sekarang</button>
</form>
<div class="flex items-center gap-8 pt-4">
<div class="flex -space-x-3">
<img alt="Doctor 1" class="h-10 w-10 rounded-full border-2 border-white" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhFsZ7-t3VVlD0vvGAA7K57RfVAfiV6xgR0fCKIQ75h7dhpKfI93WICe2n5A8gpY3pkH0fAwHra42X2-44MzR87vc-TVPX3uCyxYmXuUeZo64LlhPObMCRPpbUmqT323FY84EjpBOmv8Y-hSfle67y6cb-aHXp-1gMUK7wJviSwqGZjPPB5y6jUnKZEe9v7uq8r5ne9TBeFKP90vUi2wj9kNiIKx1aD-ySRLqgTybhyOm0So98a6SyayYLGW5AEHwcZtw29bJ2BrVK"/>
<img alt="Doctor 2" class="h-10 w-10 rounded-full border-2 border-white" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqf8EVqOojc_e8J6N7XHaHGqPhOHKoL9qJOT_o5h7zX7KT20qnfc0Uwt2yq6dTgxtML-5dPZAo9w73_LhJzf9BJevgcXPkCPA7NNl3vGxFdG9eo6XdOVMok-PXgfny2OHotfDU8kVJrXWSrZNZOLe60GGNJG0lF5mee4EZ3QgzQtDlK11jli7aceLf7VObWdSa3YDjLYLlPtzGzzhrqZvapUTLID8KWTMUFHMRoSqhqilvlB931WbpP1nvY0zsL4foBEm2aE4b0qpu"/>
<img alt="Doctor 3" class="h-10 w-10 rounded-full border-2 border-white" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAocrcvW4D0vjCexDS5Z-mppaMY-UKeYkhjDwjpeklDJQ_pc_5ZGn2_qoEQH1k3NHSEVexdV2MeMU6xg35-vvqJzAVUu7zduGbLN95EDBuznNusgM6oh2nygtGUmx19YU2Q1K9n5Y0c7OGLuTyz6V2pJS1_d5jNfx5Xk8GU1Aly9ECCnikjl06hDi9NTN4LdMlgHtAFMiQBA4Z3EJcsjpYHbLN51whUGCWqu8OEMuPNq8mwYWLQfrgQGlo7RPiV095v4LnADsvtBSyw"/>
</div>
<div class="text-on-surface-variant font-label-sm text-label-sm">
<span class="text-primary font-bold">120+ Dokter</span> telah bergabung<br/>dalam jaringan SIPA minggu ini
                        </div>
</div>
</div>
<div class="relative hidden lg:block">
<div class="absolute -top-10 -right-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
<div class="absolute -bottom-10 -left-10 w-64 h-64 bg-secondary-container/20 rounded-full blur-3xl"></div>
<div class="relative z-10 glass-card rounded-[32px] p-4 float-anim">
<img alt="Medical Visual" class="rounded-[24px] shadow-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAz73m3TU-ZoFCvjRw9iAFJrOd9ctjPsGZYKPuFTHirOY0EQCdK_v5RuC6mGVvWarEu3a1qiCNxKOoNliEEHytGUMR1Mq3TT2tMF_OkdAIsoK51N1QHT3Y-vGbj_-LXss7sF15X-EMxZWeRMmSFjWIvty2VmzofydFn6adFD52Du5V4is1gw_a5s5S5vu4UzSjsTbPsLffGQiZIOWFpDMGEP1HB72I7jlhrgsWfy5spyfi2r6B-7La2wNNPkAsHVrEem7No8T2tO_1A"/>
</div>
<!-- Vitals Badge Overlay -->
<div class="absolute top-1/4 -left-12 glass-card p-4 rounded-2xl shadow-xl flex items-center gap-4 animate-bounce duration-[3000ms]">
<div class="h-12 w-12 bg-primary/10 rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">favorite</span>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Detak Jantung</div>
<div class="font-headline-md text-headline-md text-primary">72 <span class="text-sm font-normal">BPM</span></div>
</div>
</div>
</div>
</div>
</section>
<!-- Category Grid Section -->
<section class="px-margin-desktop py-20 bg-surface-container-lowest">
<div class="max-w-container-max mx-auto">
<div class="flex justify-between items-end mb-12">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Kategori Layanan</h2>
<p class="text-on-surface-variant font-body-md text-body-md">Temukan kebutuhan medis berdasarkan spesialisasi</p>
</div>
<a class="text-primary font-label-md text-label-md flex items-center gap-2 group hover:underline" href="#">
                        Lihat Semua <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
<!-- Cardiology -->
<div class="group cursor-pointer p-6 bg-white border border-outline-variant/30 rounded-2xl hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all text-center">
<div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-primary text-3xl">cardiology</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface">Kardiologi</h3>
</div>
<!-- Pediatrics -->
<div class="group cursor-pointer p-6 bg-white border border-outline-variant/30 rounded-2xl hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all text-center">
<div class="w-16 h-16 mx-auto bg-secondary-container/30 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-on-secondary-container text-3xl">child_care</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface">Pediatri</h3>
</div>
<!-- Neurology -->
<div class="group cursor-pointer p-6 bg-white border border-outline-variant/30 rounded-2xl hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all text-center">
<div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-primary text-3xl">neurology</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface">Neurologi</h3>
</div>
<!-- Dermatology -->
<div class="group cursor-pointer p-6 bg-white border border-outline-variant/30 rounded-2xl hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all text-center">
<div class="w-16 h-16 mx-auto bg-secondary-container/30 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-on-secondary-container text-3xl">dermatology</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface">Dermatologi</h3>
</div>
<!-- Surgery -->
<div class="group cursor-pointer p-6 bg-white border border-outline-variant/30 rounded-2xl hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all text-center">
<div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-primary text-3xl">charger</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface">Bedah Umum</h3>
</div>
<!-- Pharmacy -->
<div class="group cursor-pointer p-6 bg-white border border-outline-variant/30 rounded-2xl hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all text-center">
<div class="w-16 h-16 mx-auto bg-secondary-container/30 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-on-secondary-container text-3xl">medical_services</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface">Farmasi</h3>
</div>
</div>
</div>
</section>
<!-- Featured Products Slider -->
<section class="px-margin-desktop py-20 bg-background overflow-hidden">
<div class="max-w-container-max mx-auto">
<div class="flex justify-between items-end mb-12">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Produk Unggulan</h2>
<p class="text-on-surface-variant font-body-md text-body-md">Kualitas terjamin untuk pemulihan optimal</p>
</div>
<div class="flex gap-4">
<button class="h-12 w-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary-container/10 transition-colors" id="prevBtn">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="h-12 w-12 rounded-full bg-primary text-on-primary flex items-center justify-center hover:bg-primary-container transition-all active:scale-90" id="nextBtn">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
<div class="flex gap-8 overflow-x-auto hide-scrollbar scroll-smooth pb-8" id="productSlider">
@foreach($obatTerbaru as $obat)
<div class="min-w-[320px] bg-white rounded-3xl overflow-hidden border border-outline-variant/20 hover:shadow-2xl hover:shadow-primary/10 transition-all group flex flex-col">
<div class="h-48 overflow-hidden relative bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-[64px] opacity-30 group-hover:scale-110 transition-transform duration-500">medication</span>
@if($loop->first)
<div class="absolute top-4 left-4 bg-primary px-3 py-1 rounded-lg font-label-sm text-label-sm text-on-primary">Terbaru</div>
@endif
</div>
<div class="p-6 flex flex-col flex-1">
<div class="mb-4">
<h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate">{{ $obat->nama_obat }}</h3>
<p class="text-on-surface-variant font-body-md text-body-md truncate">{{ $obat->kategori ? $obat->kategori->nama_kategori : 'Umum' }}</p>
</div>
<div class="flex justify-between items-center mt-auto">
<span class="font-headline-md text-headline-md text-primary">Rp {{ number_format($obat->harga, 0, ',', '.') }}</span>
<a href="{{ route('katalog') }}" class="h-10 w-10 bg-secondary-container text-on-secondary-container rounded-xl flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all">
<span class="material-symbols-outlined">add_shopping_cart</span>
</a>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>
<!-- Stats Bento Grid -->
<section class="px-margin-desktop py-20 bg-surface-container-low">
<div class="max-w-container-max mx-auto">
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Stat Card 1 -->
<div class="md:col-span-2 glass-card p-10 rounded-[32px] flex flex-col md:flex-row items-center gap-10">
<div class="flex-1 space-y-6">
<h2 class="font-headline-lg text-headline-lg text-on-background">Monitor Kesehatan Real-time</h2>
<p class="text-on-surface-variant font-body-md text-body-md">Analisis data kesehatan pasien dengan akurasi tinggi menggunakan integrasi AI kami yang mutakhir.</p>
<div class="flex gap-4">
<div class="px-6 py-3 bg-primary rounded-xl text-on-primary font-label-md text-label-md shadow-lg shadow-primary/20 cursor-pointer">Mulai Analisis</div>
<div class="px-6 py-3 border border-primary/20 rounded-xl text-primary font-label-md text-label-md hover:bg-white transition-colors cursor-pointer">Pelajari Lebih Lanjut</div>
</div>
</div>
<div class="w-full md:w-64 aspect-square bg-white rounded-2xl p-6 border border-primary/10 shadow-inner flex flex-col justify-between">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary text-4xl">monitoring</span>
<span class="text-green-500 font-label-sm text-label-sm">+12% vs Kemarin</span>
</div>
<div>
<div class="text-on-surface-variant font-label-sm text-label-sm">Pasien Hari Ini</div>
<div class="text-display-lg font-display-lg text-primary">48</div>
</div>
</div>
</div>
<!-- Stat Card 2 -->
<div class="bg-primary p-10 rounded-[32px] text-on-primary relative overflow-hidden group">
<div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
<div class="relative z-10 space-y-6 h-full flex flex-col justify-between">
<span class="material-symbols-outlined text-5xl">verified_user</span>
<div>
<div class="font-display-lg text-display-lg mb-2">99.9%</div>
<div class="font-headline-md text-headline-md opacity-90">Keamanan Data Terjamin</div>
</div>
<p class="font-label-sm text-label-sm opacity-80">Sesuai standar global privasi medis (GDPR &amp; HIPAA)</p>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- Floating Action Button (Active only on Home) -->
<button class="fixed bottom-8 right-8 h-16 w-16 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-40 group">
<span class="material-symbols-outlined text-3xl">add</span>
<div class="absolute right-full mr-4 px-4 py-2 bg-inverse-surface text-on-primary-container rounded-lg font-label-md text-label-md whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
            Resep Baru
        </div>
</button>
@endsection

@section('scripts')
<script>
    // Simple slider interaction
    const slider = document.getElementById('productSlider');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    if (slider && nextBtn && prevBtn) {
        nextBtn.addEventListener('click', () => {
            slider.scrollBy({ left: 350, behavior: 'smooth' });
        });

        prevBtn.addEventListener('click', () => {
            slider.scrollBy({ left: -350, behavior: 'smooth' });
        });
    }

    // Hover animation for cards
    const cards = document.querySelectorAll('.group');
    cards.forEach(card => {
        card.addEventListener('mousedown', () => {
            card.style.transform = 'scale(0.98)';
        });
        card.addEventListener('mouseup', () => {
            card.style.transform = 'scale(1)';
        });
    });
</script>
@endsection
