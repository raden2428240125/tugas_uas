<!-- SideNavBar -->
<aside id="main-sidebar"
    class="fixed left-0 top-0 h-full flex flex-col p-4 z-40 bg-surface-container-low border-r border-outline-variant/30 w-72 pt-24 shadow-[4px_0_24px_rgba(0,0,0,0.04)]
    -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

    <div class="px-4 mb-8">
        <h2 class="font-headline-md text-headline-md font-bold text-primary tracking-tight">Portal Pelayanan</h2>
        <p class="text-on-surface-variant text-label-md mt-1 font-medium">SIPA Digital Health</p>
    </div>

    <nav class="flex-1 space-y-1.5 overflow-y-auto hide-scrollbar pr-2">
        <div class="px-4 py-2 mb-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-outline-variant">Menu Utama</span>
        </div>

        @auth
            <a class="flex items-center gap-4 px-4 py-3 {{ request()->is('dashboard') ? 'bg-primary/10 text-primary rounded-xl font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-xl' }} transition-all"
                href="{{ url('/dashboard') }}">
                <span
                    class="material-symbols-outlined {{ request()->is('dashboard') ? "font-variation-settings:'FILL' 1" : '' }}">dashboard</span>
                <span class="font-label-md text-[15px]">Dashboard</span>
            </a>
        @endauth

        <a class="flex items-center gap-4 px-4 py-3 {{ request()->is('katalog') ? 'bg-primary/10 text-primary rounded-xl font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-xl' }} transition-all"
            href="{{ url('/katalog') }}">
            <span
                class="material-symbols-outlined {{ request()->is('katalog') ? "font-variation-settings:'FILL' 1" : '' }}">vaccines</span>
            <span class="font-label-md text-[15px]">Katalog Obat</span>
        </a>

        @auth
            <a class="flex items-center gap-4 px-4 py-3 {{ request()->is('upload-resep') ? 'bg-primary/10 text-primary rounded-xl font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-xl' }} transition-all"
                href="{{ url('/upload-resep') }}">
                <span
                    class="material-symbols-outlined {{ request()->is('upload-resep') ? "font-variation-settings:'FILL' 1" : '' }}">description</span>
                <span class="font-label-md text-[15px]">Unggah Resep</span>
            </a>

            <a class="flex items-center gap-4 px-4 py-3 {{ request()->is('riwayat-pesanan') ? 'bg-primary/10 text-primary rounded-xl font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-xl' }} transition-all"
                href="{{ url('/riwayat-pesanan') }}">
                <span
                    class="material-symbols-outlined {{ request()->is('riwayat-pesanan') ? "font-variation-settings:'FILL' 1" : '' }}">receipt_long</span>
                <span class="font-label-md text-[15px]">Pesanan Saya</span>
            </a>

            <div class="px-4 py-2 mt-6 mb-1">
                <span class="text-[11px] font-bold uppercase tracking-wider text-outline-variant">Pengaturan</span>
            </div>

            <a class="flex items-center gap-4 px-4 py-3 {{ request()->is('profil') ? 'bg-primary/10 text-primary rounded-xl font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-xl' }} transition-all"
                href="{{ url('/profil') }}">
                <span
                    class="material-symbols-outlined {{ request()->is('profil') ? "font-variation-settings:'FILL' 1" : '' }}">manage_accounts</span>
                <span class="font-label-md text-[15px]">Profil Akun</span>
            </a>
        @endauth

        <a class="flex items-center gap-4 px-4 py-3 {{ request()->is('lokasi-apotek') ? 'bg-primary/10 text-primary rounded-xl font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-xl' }} transition-all"
            href="{{ url('/lokasi-apotek') }}">
            <span
                class="material-symbols-outlined {{ request()->is('lokasi-apotek') ? "font-variation-settings:'FILL' 1" : '' }}">location_on</span>
            <span class="font-label-md text-[15px]">Lokasi Apotek</span>
        </a>
    </nav>

    <div
        class="p-5 bg-gradient-to-br from-primary-container to-secondary-container rounded-2xl text-on-primary-container mt-6 shadow-sm border border-primary/10 relative overflow-hidden">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-white/20 rounded-full blur-xl"></div>
        <span class="material-symbols-outlined text-[32px] mb-3 text-primary">support_agent</span>
        <p class="font-label-md text-[14px] font-bold mb-3">Butuh Bantuan Medis?</p>
        <a href="https://wa.me/6281234567890?text=Halo%20SIPA,%20saya%20butuh%20bantuan%20medis." target="_blank"
            class="w-full bg-white text-primary py-2.5 rounded-xl font-bold hover:shadow-md transition-all flex justify-center items-center gap-2 text-[13px]">
            <span>Hubungi Kami</span>
        </a>
    </div>
</aside>
