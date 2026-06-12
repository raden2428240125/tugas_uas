<!-- Bottom Navigation Bar (Mobile Only) -->
<nav class="md:hidden fixed bottom-0 w-full z-50 bg-surface/90 backdrop-blur-md border-t border-outline-variant/30 shadow-[0_-4px_10px_rgba(0,0,0,0.05)] pb-safe">
    <div class="flex justify-around items-center h-16 px-2">
        @auth
        <a href="{{ url('/dashboard') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('dashboard') ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors">
            <div class="{{ request()->is('dashboard') ? 'bg-secondary-container px-3 py-0.5 rounded-full mb-1 text-primary' : 'mb-1 text-on-surface-variant' }} flex items-center justify-center transition-all">
                <span class="material-symbols-outlined {{ request()->is('dashboard') ? 'font-variation-settings:\'FILL\' 1' : '' }} text-[24px]">dashboard</span>
            </div>
            <span class="text-[9px] font-bold">Dashboard</span>
        </a>
        @endauth

        <a href="{{ url('/katalog') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('katalog') ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors">
            <div class="{{ request()->is('katalog') ? 'bg-secondary-container px-3 py-0.5 rounded-full mb-1 text-primary' : 'mb-1 text-on-surface-variant' }} flex items-center justify-center transition-all">
                <span class="material-symbols-outlined {{ request()->is('katalog') ? 'font-variation-settings:\'FILL\' 1' : '' }} text-[24px]">vaccines</span>
            </div>
            <span class="text-[9px] font-bold">Katalog</span>
        </a>

        @auth
        <a href="{{ url('/upload-resep') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('upload-resep') ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors">
            <div class="{{ request()->is('upload-resep') ? 'bg-secondary-container px-3 py-0.5 rounded-full mb-1 text-primary' : 'mb-1 text-on-surface-variant' }} flex items-center justify-center transition-all">
                <span class="material-symbols-outlined {{ request()->is('upload-resep') ? 'font-variation-settings:\'FILL\' 1' : '' }} text-[24px]">description</span>
            </div>
            <span class="text-[9px] font-bold">Resep</span>
        </a>

        <a href="{{ url('/riwayat-pesanan') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('riwayat-pesanan') ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors">
            <div class="{{ request()->is('riwayat-pesanan') ? 'bg-secondary-container px-3 py-0.5 rounded-full mb-1 text-primary' : 'mb-1 text-on-surface-variant' }} flex items-center justify-center transition-all">
                <span class="material-symbols-outlined {{ request()->is('riwayat-pesanan') ? 'font-variation-settings:\'FILL\' 1' : '' }} text-[24px]">receipt_long</span>
            </div>
            <span class="text-[9px] font-bold">Pesanan</span>
        </a>
        @endauth

        <a href="{{ url('/lokasi-apotek') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('lokasi-apotek') ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors">
            <div class="{{ request()->is('lokasi-apotek') ? 'bg-secondary-container px-3 py-0.5 rounded-full mb-1 text-primary' : 'mb-1 text-on-surface-variant' }} flex items-center justify-center transition-all">
                <span class="material-symbols-outlined {{ request()->is('lokasi-apotek') ? 'font-variation-settings:\'FILL\' 1' : '' }} text-[24px]">location_on</span>
            </div>
            <span class="text-[9px] font-bold">Lokasi</span>
        </a>

        <a href="{{ url('/profil') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->is('profil') ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors">
            <div class="{{ request()->is('profil') ? 'bg-secondary-container px-3 py-0.5 rounded-full mb-1 text-primary' : 'mb-1 text-on-surface-variant' }} flex items-center justify-center transition-all">
                <span class="material-symbols-outlined {{ request()->is('profil') ? 'font-variation-settings:\'FILL\' 1' : '' }} text-[24px]">person</span>
            </div>
            <span class="text-[9px] font-bold">Profil</span>
        </a>
    </div>
</nav>

<style>
    /* Support for iOS safe area padding at the bottom */
    .pb-safe {
        padding-bottom: env(safe-area-inset-bottom);
    }
</style>
