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
    .map-placeholder {
        background: linear-gradient(135deg, #eaddff 0%, #e3dfff 30%, #efebff 60%, #f6f2ff 100%);
        position: relative;
        overflow: hidden;
    }
    .map-placeholder::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            linear-gradient(90deg, transparent 49.5%, #ccc3d830 49.5%, #ccc3d830 50.5%, transparent 50.5%),
            linear-gradient(0deg, transparent 49.5%, #ccc3d830 49.5%, #ccc3d830 50.5%, transparent 50.5%);
        background-size: 60px 60px;
    }
    .map-pin {
        filter: drop-shadow(0 4px 12px rgba(99, 14, 212, 0.3));
        animation: bounce-pin 2s ease-in-out infinite;
    }
    @keyframes bounce-pin {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    .pharmacy-card:hover .pharmacy-icon {
        transform: scale(1.1) rotate(-5deg);
    }
    .status-pulse {
        animation: pulse-dot 2s ease-in-out infinite;
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
</style>
@endsection

@section('content')
<main class="pt-28 pb-20 px-4 md:px-margin-desktop max-w-container-max mx-auto space-y-10">
    <!-- Header -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="font-headline-lg text-headline-lg text-on-background mb-2">Lokasi Apotek</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Temukan apotek mitra SIPA terdekat untuk kebutuhan kesehatan Anda.</p>
        </div>
        <div class="flex gap-2">
            <div class="relative flex-1 md:w-80">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]">search</span>
                <input id="search-lokasi" class="w-full pl-10 pr-4 py-2.5 bg-surface-container border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all font-body-md" placeholder="Cari apotek atau alamat..." type="text" />
            </div>
            <button id="btn-lokasi-saya" class="flex items-center gap-2 px-4 py-2.5 bg-primary text-on-primary rounded-xl font-label-md text-label-md hover:opacity-90 transition-all">
                <span class="material-symbols-outlined text-[20px]">my_location</span>
                Lokasi Saya
            </button>
        </div>
    </section>

    <!-- Map & Sidebar Layout -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-6 min-h-[600px]">
        <!-- Map Area -->
        <div class="lg:col-span-8 rounded-2xl overflow-hidden relative min-h-[400px] border border-outline-variant/30 shadow-sm">
            <iframe
                id="maps-iframe"
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31722.97808839498!2d106.79!3d-6.24!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sapotek+jakarta+selatan!5e0!3m2!1sid!2sid!4v1718000000000!5m2!1sid!2sid"
                width="100%"
                height="100%"
                style="border:0; min-height:600px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <!-- Overlay Badges -->
            <div class="absolute bottom-4 left-4 flex gap-2 z-10">
                <span class="bg-white/90 backdrop-blur-sm border border-outline-variant/30 text-on-surface-variant px-3 py-1.5 rounded-full text-label-sm flex items-center gap-1.5 shadow-md">
                    <span class="material-symbols-outlined text-[16px] text-primary">near_me</span> Radius 5 km
                </span>
                <span class="bg-primary text-on-primary px-3 py-1.5 rounded-full text-label-sm flex items-center gap-1.5 shadow-md cursor-pointer hover:opacity-90 transition-all">
                    <span class="material-symbols-outlined text-[16px]">tune</span> Filter
                </span>
            </div>
        </div>

        <!-- Pharmacy List Sidebar -->
        <div class="lg:col-span-4 space-y-4 overflow-y-auto max-h-[650px] pr-1 custom-scrollbar">
            <p class="font-label-md text-label-md text-on-surface-variant sticky top-0 bg-background pb-2 z-10">5 Apotek Terdekat</p>

            <!-- Pharmacy Card 1 -->
            <div class="pharmacy-card bg-white border-2 border-primary/20 rounded-2xl p-5 cursor-pointer hover:shadow-lg hover:shadow-primary/10 transition-all group">
                <div class="flex items-start gap-4">
                    <div class="pharmacy-icon w-14 h-14 rounded-xl bg-primary-container flex items-center justify-center text-on-primary-container transition-transform shrink-0">
                        <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">local_pharmacy</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-label-md text-label-md text-on-surface truncate">Kimia Farma Sudirman</h3>
                            <span class="shrink-0 w-2 h-2 rounded-full bg-green-500 status-pulse"></span>
                        </div>
                        <p class="text-label-sm text-on-surface-variant leading-relaxed mb-2">Jl. Jend. Sudirman No.28, Karet, Setiabudi</p>
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="text-label-sm text-primary font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">directions_walk</span> 0.8 km
                            </span>
                            <span class="text-label-sm text-green-600 font-bold">Buka • 24 Jam</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Kimia+Farma+Sudirman+Jakarta" target="_blank" class="flex-1 py-2 bg-primary text-on-primary rounded-lg font-label-sm text-label-sm hover:opacity-90 transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">directions</span> Rute
                    </a>
                    <a href="tel:+6281234567890" class="flex-1 py-2 border border-outline-variant text-on-surface-variant rounded-lg font-label-sm text-label-sm hover:bg-surface-container transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">call</span> Hubungi
                    </a>
                </div>
            </div>

            <!-- Pharmacy Card 2 -->
            <div class="pharmacy-card bg-white border border-outline-variant/30 rounded-2xl p-5 cursor-pointer hover:shadow-lg hover:shadow-primary/10 hover:border-primary/20 transition-all group">
                <div class="flex items-start gap-4">
                    <div class="pharmacy-icon w-14 h-14 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container transition-transform shrink-0">
                        <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">local_pharmacy</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-label-md text-label-md text-on-surface truncate">Apotek Century SCBD</h3>
                            <span class="shrink-0 w-2 h-2 rounded-full bg-green-500 status-pulse"></span>
                        </div>
                        <p class="text-label-sm text-on-surface-variant leading-relaxed mb-2">Pacific Century Place, SCBD Lot 10, Lt. GF</p>
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="text-label-sm text-primary font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">directions_walk</span> 1.2 km
                            </span>
                            <span class="text-label-sm text-green-600 font-bold">Buka • s/d 22:00</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Apotek+Century+SCBD" target="_blank" class="flex-1 py-2 bg-primary text-on-primary rounded-lg font-label-sm text-label-sm hover:opacity-90 transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">directions</span> Rute
                    </a>
                    <a href="tel:+6281234567891" class="flex-1 py-2 border border-outline-variant text-on-surface-variant rounded-lg font-label-sm text-label-sm hover:bg-surface-container transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">call</span> Hubungi
                    </a>
                </div>
            </div>

            <!-- Pharmacy Card 3 -->
            <div class="pharmacy-card bg-white border border-outline-variant/30 rounded-2xl p-5 cursor-pointer hover:shadow-lg hover:shadow-primary/10 hover:border-primary/20 transition-all group">
                <div class="flex items-start gap-4">
                    <div class="pharmacy-icon w-14 h-14 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary transition-transform shrink-0">
                        <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">local_pharmacy</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-label-md text-label-md text-on-surface truncate">Apotek Guardian Senayan City</h3>
                            <span class="shrink-0 w-2 h-2 rounded-full bg-green-500 status-pulse"></span>
                        </div>
                        <p class="text-label-sm text-on-surface-variant leading-relaxed mb-2">Senayan City Mall, Lt. LG, Jl. Asia Afrika No.19</p>
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="text-label-sm text-primary font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">directions_car</span> 2.5 km
                            </span>
                            <span class="text-label-sm text-green-600 font-bold">Buka • s/d 21:00</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Guardian+Senayan+City" target="_blank" class="flex-1 py-2 bg-primary text-on-primary rounded-lg font-label-sm text-label-sm hover:opacity-90 transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">directions</span> Rute
                    </a>
                    <a href="tel:+6281234567892" class="flex-1 py-2 border border-outline-variant text-on-surface-variant rounded-lg font-label-sm text-label-sm hover:bg-surface-container transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">call</span> Hubungi
                    </a>
                </div>
            </div>

            <!-- Pharmacy Card 4 -->
            <div class="pharmacy-card bg-white border border-outline-variant/30 rounded-2xl p-5 cursor-pointer hover:shadow-lg hover:shadow-primary/10 hover:border-primary/20 transition-all group">
                <div class="flex items-start gap-4">
                    <div class="pharmacy-icon w-14 h-14 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container transition-transform shrink-0">
                        <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">local_pharmacy</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-label-md text-label-md text-on-surface truncate">Apotek K-24 Blok M</h3>
                            <span class="shrink-0 w-2 h-2 rounded-full bg-green-500 status-pulse"></span>
                        </div>
                        <p class="text-label-sm text-on-surface-variant leading-relaxed mb-2">Jl. Melawai Raya No.191, Blok M, Kebayoran Baru</p>
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="text-label-sm text-primary font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">directions_car</span> 3.1 km
                            </span>
                            <span class="text-label-sm text-green-600 font-bold">Buka • 24 Jam</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Apotek+K-24+Blok+M" target="_blank" class="flex-1 py-2 bg-primary text-on-primary rounded-lg font-label-sm text-label-sm hover:opacity-90 transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">directions</span> Rute
                    </a>
                    <a href="tel:+6281234567893" class="flex-1 py-2 border border-outline-variant text-on-surface-variant rounded-lg font-label-sm text-label-sm hover:bg-surface-container transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">call</span> Hubungi
                    </a>
                </div>
            </div>

            <!-- Pharmacy Card 5 -->
            <div class="pharmacy-card bg-white border border-outline-variant/30 rounded-2xl p-5 cursor-pointer hover:shadow-lg hover:shadow-primary/10 hover:border-primary/20 transition-all group opacity-80">
                <div class="flex items-start gap-4">
                    <div class="pharmacy-icon w-14 h-14 rounded-xl bg-surface-container-high flex items-center justify-center text-on-surface-variant transition-transform shrink-0">
                        <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">local_pharmacy</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-label-md text-label-md text-on-surface truncate">Apotek Viva Generik Fatmawati</h3>
                            <span class="shrink-0 w-2 h-2 rounded-full bg-outline-variant"></span>
                        </div>
                        <p class="text-label-sm text-on-surface-variant leading-relaxed mb-2">Jl. RS Fatmawati Raya No.15, Cilandak</p>
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="text-label-sm text-primary font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">directions_car</span> 4.8 km
                            </span>
                            <span class="text-label-sm text-outline font-bold">Tutup • Buka 08:00</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 mt-4">
                    <button disabled class="flex-1 py-2 bg-outline-variant/30 text-outline rounded-lg font-label-sm text-label-sm cursor-not-allowed flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">directions</span> Rute
                    </button>
                    <a href="tel:+6281234567894" class="flex-1 py-2 border border-outline-variant text-on-surface-variant rounded-lg font-label-sm text-label-sm hover:bg-surface-container transition-all flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">call</span> Hubungi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Bento Cards -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="glass-card rounded-2xl p-6 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 rounded-xl bg-primary-container flex items-center justify-center text-on-primary-container shrink-0">
                <span class="material-symbols-outlined text-[28px]">schedule</span>
            </div>
            <div>
                <h4 class="font-label-md text-label-md text-on-surface">Apotek 24 Jam</h4>
                <p class="text-label-sm text-on-surface-variant">2 apotek buka 24 jam di sekitar Anda</p>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-6 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
                <span class="material-symbols-outlined text-[28px]">local_shipping</span>
            </div>
            <div>
                <h4 class="font-label-md text-label-md text-on-surface">Antar Obat</h4>
                <p class="text-label-sm text-on-surface-variant">3 apotek mendukung pengiriman ke rumah</p>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-6 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary shrink-0">
                <span class="material-symbols-outlined text-[28px]">verified</span>
            </div>
            <div>
                <h4 class="font-label-md text-label-md text-on-surface">Mitra Resmi SIPA</h4>
                <p class="text-label-sm text-on-surface-variant">Semua apotek terverifikasi & berlisensi</p>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    // Highlight card on click
    document.querySelectorAll('.pharmacy-card').forEach(card => {
        card.addEventListener('click', () => {
            document.querySelectorAll('.pharmacy-card').forEach(c => {
                c.classList.remove('border-primary/20', 'border-2');
                c.classList.add('border-outline-variant/30', 'border');
            });
            card.classList.remove('border-outline-variant/30', 'border');
            card.classList.add('border-primary/20', 'border-2');
        });
    });

    // Search lokasi apotek
    const searchInput = document.getElementById('search-lokasi');
    const mapsIframe = document.getElementById('maps-iframe');
    const btnLokasiSaya = document.getElementById('btn-lokasi-saya');

    function updateMap(query) {
        const encodedQuery = encodeURIComponent('apotek ' + query);
        mapsIframe.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50000!2d106.8!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s' + encodedQuery + '!5e0!3m2!1sid!2sid!4v1718000000000!5m2!1sid!2sid';
    }

    // Search on Enter key
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = this.value.trim();
            if (query) {
                updateMap(query);
            }
        }
    });

    // Geolocation - Lokasi Saya
    btnLokasiSaya.addEventListener('click', function() {
        const originalText = this.innerHTML;
        this.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">progress_activity</span> Mencari...';
        this.disabled = true;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    mapsIframe.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15000!2d' + lng + '!3d' + lat + '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sapotek!5e0!3m2!1sid!2sid!4v1718000000000!5m2!1sid!2sid';
                    searchInput.value = 'Lokasi saat ini';
                    btnLokasiSaya.innerHTML = '<span class="material-symbols-outlined text-[20px]">my_location</span> Lokasi Saya';
                    btnLokasiSaya.disabled = false;
                },
                function(error) {
                    alert('Tidak dapat mengakses lokasi Anda. Pastikan GPS aktif dan izin lokasi diberikan.');
                    btnLokasiSaya.innerHTML = '<span class="material-symbols-outlined text-[20px]">my_location</span> Lokasi Saya';
                    btnLokasiSaya.disabled = false;
                },
                { enableHighAccuracy: true, timeout: 10000 }
            );
        } else {
            alert('Browser Anda tidak mendukung geolokasi.');
            btnLokasiSaya.innerHTML = '<span class="material-symbols-outlined text-[20px]">my_location</span> Lokasi Saya';
            btnLokasiSaya.disabled = false;
        }
    });
</script>
@endsection
