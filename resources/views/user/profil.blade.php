@extends('layouts.sipa')

@section('styles')
<style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .premium-shadow {
        box-shadow: 0 4px 20px -2px var(--color-primary-20);
    }
</style>
@endsection

@section('content')
<div class="p-6 md:p-10 space-y-8 w-full pt-28 pb-16 max-w-container-max mx-auto">
<!-- Welcome Header -->
<header>
<h1 class="text-[32px] font-extrabold text-on-surface tracking-tight">Profil Anda</h1>
<p class="text-on-surface-variant mt-1">Kelola informasi pribadi, keamanan, dan preferensi kesehatan Anda.</p>
</header>
<!-- Profile Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
<!-- Personal Info Card (Table: pelanggans) -->
<div class="md:col-span-8 bg-surface-container-lowest border border-outline-variant rounded-2xl p-8 premium-shadow">
<div class="flex justify-between items-center mb-8">
<div class="flex items-center gap-4">
@php
    $userId = auth()->id() ?? 1;
@endphp
@if(file_exists(public_path('profiles/user_' . $userId . '.jpg')))
    <img src="{{ asset('profiles/user_' . $userId . '.jpg') }}?v={{ time() }}" alt="Profile" class="w-16 h-16 rounded-full object-cover border-2 border-primary-fixed premium-shadow">
@else
    <div class="w-16 h-16 rounded-xl bg-primary-fixed flex items-center justify-center text-primary">
        <span class="material-symbols-outlined text-[32px]">badge</span>
    </div>
@endif
<h3 class="text-[20px] font-bold text-on-surface">Informasi Pribadi</h3>
</div>
<a href="{{ route('profile.edit') }}" class="text-primary font-bold text-[14px] px-4 py-2 hover:bg-primary/5 rounded-lg transition-all inline-block">Ubah Profil</a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-12">
<div class="space-y-1">
<label class="text-[12px] font-bold text-on-surface-variant uppercase tracking-wide">Nama Lengkap</label>
<p class="text-[16px] font-semibold text-on-surface">{{ $pelanggan ? $pelanggan->nama : 'Pengguna Tamu' }}</p>
</div>
<div class="space-y-1">
<label class="text-[12px] font-bold text-on-surface-variant uppercase tracking-wide">Email</label>
<p class="text-[16px] font-semibold text-on-surface">{{ $pelanggan ? $pelanggan->email : '-' }}</p>
</div>
<div class="space-y-1">
<label class="text-[12px] font-bold text-on-surface-variant uppercase tracking-wide">No. Telp</label>
<p class="text-[16px] font-semibold text-on-surface">{{ $pelanggan ? $pelanggan->no_telp : '-' }}</p>
</div>
<div class="space-y-1">
<label class="text-[12px] font-bold text-on-surface-variant uppercase tracking-wide">Member Sejak</label>
<p class="text-[16px] font-semibold text-on-surface">{{ $pelanggan ? \Carbon\Carbon::parse($pelanggan->created_at)->format('d F Y') : '-' }}</p>
</div>
</div>
</div>
<!-- Quick Stats -->
<div class="md:col-span-4 space-y-4">
<div class="p-6 bg-secondary-container rounded-2xl flex items-center justify-between border border-outline-variant/30">
<div>
<p class="text-[14px] font-bold text-on-secondary-container">Poin SIPA</p>
<p class="text-[24px] font-extrabold text-on-secondary-container">2,450</p>
</div>
<span class="material-symbols-outlined text-[40px] text-on-secondary-container opacity-40">loyalty</span>
</div>
<div class="p-6 bg-surface-container-highest rounded-2xl flex items-center justify-between border border-outline-variant">
<div>
<p class="text-[14px] font-bold text-on-surface">Resep Aktif</p>
<p class="text-[24px] font-extrabold text-on-surface">{{ $totalResepAktif ?? 0 }}</p>
</div>
<span class="material-symbols-outlined text-[40px] text-primary opacity-40">prescriptions</span>
</div>
</div>
<!-- Address Management -->
<div class="md:col-span-7 bg-surface-container-lowest border border-outline-variant rounded-2xl p-8 premium-shadow">
<div class="flex justify-between items-center mb-8">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[28px]">location_on</span>
</div>
<h3 class="text-[20px] font-bold text-on-surface">Alamat Pengiriman</h3>
</div>
<button onclick="document.getElementById('modal-alamat').classList.remove('hidden')" class="flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-full font-bold text-[12px] shadow-sm hover:opacity-90 transition-all">
<span class="material-symbols-outlined text-[18px]">add</span>
                        Ubah Alamat
                    </button>
</div>
<div class="space-y-4">
<div class="p-5 bg-surface-container border-2 border-primary/20 rounded-xl relative">
<div class="absolute top-4 right-4 flex gap-2">
<button onclick="document.getElementById('modal-alamat').classList.remove('hidden')" class="text-primary hover:bg-primary/10 p-1.5 rounded-lg"><span class="material-symbols-outlined text-[20px]">edit</span></button>
</div>
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary mt-1" style="font-variation-settings: 'FILL' 1;">home</span>
<div>
<div class="flex items-center gap-2 mb-1">
<span class="font-bold text-on-surface">Rumah</span>
<span class="px-2 py-0.5 bg-primary-fixed text-primary text-[10px] font-extrabold rounded-full uppercase">Utama</span>
</div>
<p class="text-[14px] text-on-surface-variant leading-relaxed">
                                    {{ $pelanggan ? $pelanggan->alamat : 'Belum ada alamat' }}
                                </p>
</div>
</div>
</div>
<div class="p-5 bg-surface-container-low border border-outline-variant rounded-xl group cursor-pointer hover:border-primary/40 transition-colors">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-on-surface-variant mt-1">apartment</span>
<div>
<span class="font-bold text-on-surface block mb-1">Kantor</span>
<p class="text-[14px] text-on-surface-variant leading-relaxed">
                                    Pacific Century Place, Lt. 25, SCBD Lot 10<br/>
                                    Jakarta Selatan, DKI Jakarta 12190
                                </p>
</div>
</div>
</div>
</div>
</div>
<!-- Security & Preferences -->
<div class="md:col-span-5 bg-surface-container-lowest border border-outline-variant rounded-2xl p-8 premium-shadow">
<div class="flex items-center gap-4 mb-8">
<div class="w-12 h-12 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[28px]">settings</span>
</div>
<h3 class="text-[20px] font-bold text-on-surface">Preferensi Akun</h3>
</div>
<div class="space-y-6">
<div class="space-y-4">
<h4 class="text-[12px] font-bold text-outline uppercase tracking-widest">Keamanan</h4>
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-on-surface-variant">lock</span>
<div>
<p class="text-[14px] font-bold text-on-surface">Kata Sandi</p>
<p class="text-[12px] text-on-surface-variant">Terakhir diubah 3 bulan lalu</p>
</div>
</div>
<a href="{{ route('profile.edit') }}" class="px-3 py-1.5 border border-outline-variant rounded-lg text-[12px] font-bold hover:bg-surface-container transition-colors inline-block">Ubah</a>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-on-surface-variant">phonelink_lock</span>
<div>
<p class="text-[14px] font-bold text-on-surface">2FA</p>
<p class="text-[12px] text-primary font-bold">Aktif</p>
</div>
</div>
<div class="w-10 h-5 bg-primary rounded-full relative cursor-pointer toggle-switch" data-active="true">
<div class="absolute right-1 top-1 w-3 h-3 bg-white rounded-full toggle-knob transition-all"></div>
</div>
</div>
</div>
<div class="pt-4 border-t border-outline-variant space-y-4">
<h4 class="text-[12px] font-bold text-outline uppercase tracking-widest">Notifikasi</h4>
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-on-surface-variant">notifications</span>
<p class="text-[14px] font-bold text-on-surface">Pembaruan Pesanan</p>
</div>
<div id="toggle-pesanan" class="w-10 h-5 {{ isset($preferences) && $preferences['notif_pesanan'] ? 'bg-primary' : 'bg-outline-variant' }} rounded-full relative cursor-pointer toggle-switch" data-active="{{ isset($preferences) && $preferences['notif_pesanan'] ? 'true' : 'false' }}">
<div class="absolute {{ isset($preferences) && $preferences['notif_pesanan'] ? 'right-1' : 'left-1' }} top-1 w-3 h-3 bg-white rounded-full toggle-knob transition-all"></div>
</div>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-on-surface-variant">health_metrics</span>
<p class="text-[14px] font-bold text-on-surface">Pengingat Obat</p>
</div>
<div id="toggle-obat" class="w-10 h-5 {{ isset($preferences) && $preferences['notif_obat'] ? 'bg-primary' : 'bg-outline-variant' }} rounded-full relative cursor-pointer toggle-switch" data-active="{{ isset($preferences) && $preferences['notif_obat'] ? 'true' : 'false' }}">
<div class="absolute {{ isset($preferences) && $preferences['notif_obat'] ? 'right-1' : 'left-1' }} top-1 w-3 h-3 bg-white rounded-full toggle-knob transition-all"></div>
</div>
</div>
</div>
@if(auth()->check())
<div class="pt-6 mt-6 border-t border-outline-variant">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full py-3 bg-error/10 text-error border border-error/20 rounded-xl font-bold text-[14px] hover:bg-error/20 transition-all flex justify-center items-center gap-2 shadow-sm">
            <span class="material-symbols-outlined text-[20px]">logout</span>
            Keluar dari Akun (Logout)
        </button>
    </form>
</div>
@else
<div class="pt-6 mt-6 border-t border-outline-variant flex gap-4">
    <a href="{{ route('login') }}" class="flex-1 py-3 bg-surface-container-high text-on-surface border border-outline-variant rounded-xl font-bold text-[14px] hover:bg-surface-container-highest transition-all flex justify-center items-center gap-2">
        <span class="material-symbols-outlined text-[20px]">login</span>
        Masuk
    </a>
    <a href="{{ route('register') }}" class="flex-1 py-3 bg-primary text-on-primary rounded-xl font-bold text-[14px] hover:opacity-90 transition-all flex justify-center items-center gap-2 shadow-md shadow-primary/20">
        <span class="material-symbols-outlined text-[20px]">person_add</span>
        Daftar Akun
    </a>
</div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
</div>
</div>

<!-- Modal Ubah Alamat -->
<div id="modal-alamat" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/50 backdrop-blur-sm transition-opacity">
    <div class="bg-surface border border-outline-variant rounded-2xl w-full max-w-md p-6 shadow-2xl animate-fade-in-up">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-headline-sm font-bold text-on-surface">Ubah Alamat Pengiriman</h3>
            <button onclick="document.getElementById('modal-alamat').classList.add('hidden')" class="text-on-surface-variant hover:text-on-surface hover:bg-surface-container p-2 rounded-full transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="{{ route('profil.alamat') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="alamat" class="block text-sm font-bold text-on-surface mb-2">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" rows="4" class="w-full px-4 py-3 bg-surface-container-lowest border border-outline-variant rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all resize-none text-on-surface" placeholder="Masukkan alamat lengkap rumah Anda..." required>{{ $pelanggan ? $pelanggan->alamat : '' }}</textarea>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('modal-alamat').classList.add('hidden')" class="px-6 py-2 rounded-full font-bold text-on-surface-variant hover:bg-surface-container transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2 rounded-full font-bold bg-primary text-on-primary hover:opacity-90 transition-opacity shadow-md">Simpan Alamat</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Simple UI transitions
    document.querySelectorAll('a, button').forEach(el => {
        el.addEventListener('mouseenter', () => {
            if(!el.classList.contains('bg-primary')) {
                el.classList.add('transition-transform', 'duration-200');
            }
        });
    });

    // Toggle switch logic
    document.querySelectorAll('.toggle-switch').forEach(toggle => {
        toggle.addEventListener('click', function() {
            let isActive = this.getAttribute('data-active') === 'true';
            let knob = this.querySelector('.toggle-knob');
            
            if (isActive) {
                this.classList.remove('bg-primary');
                this.classList.add('bg-outline-variant');
                knob.classList.remove('right-1');
                knob.classList.add('left-1');
                this.setAttribute('data-active', 'false');
            } else {
                this.classList.remove('bg-outline-variant');
                this.classList.add('bg-primary');
                knob.classList.remove('left-1');
                knob.classList.add('right-1');
                this.setAttribute('data-active', 'true');
            }
            
            // Save preference via AJAX
            let notifPesanan = document.getElementById('toggle-pesanan') ? document.getElementById('toggle-pesanan').getAttribute('data-active') === 'true' : true;
            let notifObat = document.getElementById('toggle-obat') ? document.getElementById('toggle-obat').getAttribute('data-active') === 'true' : false;
            
            fetch("{{ route('profil.preferences') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    notif_pesanan: notifPesanan,
                    notif_obat: notifObat
                })
            }).then(response => response.json())
              .then(data => { console.log('Preferences updated:', data); })
              .catch(err => { console.error('Error updating preferences:', err); });
        });
    });
</script>
@endsection
