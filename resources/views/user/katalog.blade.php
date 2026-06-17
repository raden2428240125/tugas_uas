@extends('layouts.sipa')

@section('styles')
<style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        display: inline-block;
        vertical-align: middle;
    }
    
</style>
@endsection

@section('content')
<main class="pt-24 pb-20 px-margin-desktop max-w-container-max mx-auto flex gap-gutter">
<!-- Sidebar Filters -->
<aside class="hidden lg:flex flex-col w-72 shrink-0 gap-8">
<form method="GET" action="{{ route('katalog') }}" class="bg-surface-container-low rounded-xl p-6 border border-outline-variant/20 sticky top-28">
<h2 class="font-headline-md text-headline-md text-primary mb-6">Filter Produk</h2>
<!-- Category Filter -->
<div class="mb-8">
<p class="font-label-md text-label-md mb-4 text-on-surface">Kategori</p>
<div class="space-y-3">
<label class="flex items-center gap-3 cursor-pointer group">
<input type="radio" name="kategori_id" value="" {{ !request('kategori_id') ? 'checked' : '' }} class="w-5 h-5 rounded-full border-outline-variant text-primary focus:ring-primary"/>
<span class="text-body-md group-hover:text-primary transition-colors">Semua Obat</span>
</label>
@foreach($kategoris as $kategori)
<label class="flex items-center gap-3 cursor-pointer group">
<input type="radio" name="kategori_id" value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'checked' : '' }} class="w-5 h-5 rounded-full border-outline-variant text-primary focus:ring-primary shrink-0"/>
<span class="text-body-md group-hover:text-primary transition-colors line-clamp-2" title="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</span>
</label>
@endforeach
</div>
</div>
<!-- Stock Toggle -->
<div class="mb-8">
<label class="flex items-center justify-between cursor-pointer">
<span class="font-label-md text-label-md text-on-surface">Tersedia Saja</span>
<div class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox" name="tersedia" value="1" {{ request('tersedia') ? 'checked' : '' }}/>
<div class="w-11 h-6 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</div>
</label>
</div>
<button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-lg font-label-md hover:bg-primary/90 transition-all active:scale-[0.98]">
                    Terapkan Filter
                </button>
</form>
</aside>
<!-- Main Content Area -->
<section class="flex-1">
<!-- Search & Sort Header -->
<form method="GET" action="{{ route('katalog') }}" class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
@if(request('kategori_id'))
<input type="hidden" name="kategori_id" value="{{ request('kategori_id') }}">
@endif
<div class="relative w-full md:w-96">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">search</span>
<input name="search" value="{{ request('search') }}" class="w-full pl-12 pr-4 py-3 bg-surface-container border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="Cari nama obat atau merek..." type="text"/>
</div>
<div class="flex items-center gap-4 w-full md:w-auto">
<span class="text-label-md text-outline-variant hidden md:block">Urutkan:</span>
<select name="sort" onchange="this.form.submit()" class="flex-1 md:flex-none bg-surface-container border border-outline-variant/30 rounded-xl px-4 py-3 font-label-md outline-none focus:ring-2 focus:ring-primary">
<option value="terpopuler" {{ request('sort') == 'terpopuler' ? 'selected' : '' }}>Terpopuler</option>
<option value="harga_terendah" {{ request('sort') == 'harga_terendah' ? 'selected' : '' }}>Harga Terendah</option>
<option value="harga_tertinggi" {{ request('sort') == 'harga_tertinggi' ? 'selected' : '' }}>Harga Tertinggi</option>
<option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>Alphabet A-Z</option>
</select>
</div>
</form>

<!-- Medicine Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-gutter">
@forelse($obats as $obat)
<div class="group bg-surface-container-lowest border border-outline-variant/10 rounded-2xl overflow-hidden shadow-[0_4px_20px_-4px_theme(colors.primary\/12%)] hover:shadow-[0_10px_30px_-4px_theme(colors.primary\/20%)] transition-all duration-300 hover:-translate-y-1 flex flex-col">
<div class="relative h-56 w-full bg-surface-container overflow-hidden flex items-center justify-center">
    <span class="material-symbols-outlined text-primary text-[64px] opacity-30">medication</span>
    @if($obat->kategori)
    <div class="absolute top-4 left-4 bg-secondary-container/90 backdrop-blur-sm text-on-secondary-container px-3 py-1 rounded-full text-label-sm font-label-sm max-w-[80%] truncate" title="{{ $obat->kategori->nama_kategori }}">{{ $obat->kategori->nama_kategori }}</div>
    @endif
    @if($obat->stok <= 0)
    <div class="absolute inset-0 bg-surface/40 backdrop-grayscale flex items-center justify-center">
        <div class="bg-inverse-surface/90 text-inverse-on-surface px-4 py-2 rounded-lg font-bold text-label-md">Stok Habis</div>
    </div>
    @endif
</div>
<div class="p-6 flex flex-col flex-1">
    <div class="flex justify-between items-start mb-2">
        <h3 class="font-headline-md text-headline-md text-on-surface leading-tight {{ $obat->stok <= 0 ? 'text-outline' : '' }}">{{ $obat->nama_obat }}</h3>
        <button class="text-outline hover:text-error transition-colors">
            <span class="material-symbols-outlined">favorite</span>
        </button>
    </div>
    @if($obat->jenis_obat == 'Resep')
    <div class="flex items-center gap-2 mb-4">
        <span class="material-symbols-outlined text-error text-[18px]">clinical_notes</span>
        <span class="text-label-sm text-error font-bold">Butuh Resep Dokter</span>
    </div>
    @else
    <p class="text-body-md text-on-surface-variant mb-4">{{ Str::limit($obat->deskripsi, 60) }}</p>
    @endif
    <div class="mt-auto">
        <div class="flex items-baseline gap-1 mb-2">
            <span class="{{ $obat->stok <= 0 ? 'text-outline' : 'text-primary' }} font-bold text-headline-md">Rp {{ number_format($obat->harga, 0, ',', '.') }}</span>
            <span class="text-outline-variant text-label-sm">/ {{ $obat->satuan }}</span>
        </div>
        <div class="flex items-center justify-between">
            @if($obat->stok > 0)
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-primary"></span>
                <span class="text-label-sm text-primary">Stok: {{ $obat->stok }}</span>
            </div>
            <form action="{{ route('beli-langsung') }}" method="POST">
                @csrf
                <input type="hidden" name="obat_id" value="{{ $obat->id }}">
                <input type="hidden" name="jumlah" value="1">
                <button type="submit" class="bg-primary-container text-on-primary-container p-2 rounded-lg hover:brightness-110 active:scale-95 transition-all">
                    <span class="material-symbols-outlined">add_shopping_cart</span>
                </button>
            </form>
            @else
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-outline-variant"></span>
                <span class="text-label-sm text-outline-variant">Stok Habis</span>
            </div>
            <button class="bg-outline-variant/30 text-outline p-2 rounded-lg cursor-not-allowed" disabled>
                <span class="material-symbols-outlined">add_shopping_cart</span>
            </button>
            @endif
        </div>
    </div>
</div>
</div>
@empty
<div class="col-span-full text-center py-20">
    <span class="material-symbols-outlined text-outline-variant text-[64px] mb-4 block">search_off</span>
    <h3 class="font-headline-md text-headline-md text-on-surface-variant mb-2">Obat Tidak Ditemukan</h3>
    <p class="text-body-md text-on-surface-variant">Coba ubah kata kunci pencarian atau filter Anda.</p>
    <a href="{{ route('katalog') }}" class="inline-block mt-4 bg-primary text-on-primary px-6 py-3 rounded-xl font-label-md hover:opacity-90 transition-all">Reset Filter</a>
</div>
@endforelse
</div>

<!-- Pagination -->
@if($obats->hasPages())
<div class="mt-12 flex justify-center">
    {{ $obats->appends(request()->query())->links() }}
</div>
@endif
</section>
</main>
@endsection

@section('scripts')
<script>
    // Micro-interactions for favorite toggle
    document.querySelectorAll('button .material-symbols-outlined').forEach(icon => {
        if (icon.innerText === 'favorite') {
            icon.parentElement.addEventListener('click', (e) => {
                const isFilled = icon.style.fontVariationSettings?.includes("'FILL' 1");
                icon.style.fontVariationSettings = isFilled ? "'FILL' 0" : "'FILL' 1";
                icon.classList.toggle('text-error', !isFilled);
                icon.classList.toggle('text-outline', isFilled);
            });
        }
    });
</script>
@endsection
