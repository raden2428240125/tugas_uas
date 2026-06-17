@extends('layouts.sipa')

@section('styles')
<style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(243, 232, 255, 0.5);
    }
    .drop-zone-active {
        border-color: var(--color-primary);
        background-color: #F3E8FF;
        transform: scale(1.01);
    }
</style>
@endsection

@section('content')
@if(session('success'))
<div class="fixed top-24 left-1/2 -translate-x-1/2 z-50 bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-xl shadow-lg flex items-center gap-3 max-w-lg" id="flash-msg">
    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">check_circle</span>
    <p class="font-label-md">{{ session('success') }}</p>
    <button onclick="document.getElementById('flash-msg').remove()" class="ml-auto text-green-600 hover:text-green-800">
        <span class="material-symbols-outlined text-[20px]">close</span>
    </button>
</div>
@endif
@if($errors->any())
<div class="fixed top-24 left-1/2 -translate-x-1/2 z-50 bg-red-100 border border-red-400 text-red-800 px-6 py-4 rounded-xl shadow-lg max-w-lg">
    @foreach($errors->all() as $error)
    <p class="font-label-md">{{ $error }}</p>
    @endforeach
</div>
@endif
<main class="pt-32 pb-20 px-4 md:px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left: Instructions & Security -->
<div class="lg:col-span-4 space-y-8">
<section class="space-y-4">
<h1 class="font-headline-lg text-headline-lg text-primary">Kirim Resep</h1>
<p class="font-body-md text-body-md text-on-surface-variant">
                    SIPA memudahkan Anda mendapatkan obat resep langsung di rumah. Cukup unggah foto resep resmi dari dokter Anda.
                </p>
<ul class="space-y-4">
<li class="flex gap-3 items-start">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="font-label-md text-label-md text-on-surface">Foto Harus Jelas</p>
<p class="text-label-sm text-on-surface-variant">Pastikan nama pasien, nama obat, dan tanda tangan dokter terbaca.</p>
</div>
</li>
<li class="flex gap-3 items-start">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="font-label-md text-label-md text-on-surface">Format File</p>
<p class="text-label-sm text-on-surface-variant">Dukungan format: JPG, PNG, atau PDF (Maks. 5MB).</p>
</div>
</li>
</ul>
</section>
<section class="p-6 rounded-xl bg-surface-container-low border border-outline-variant/30 space-y-4">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined">verified_user</span>
<h3 class="font-label-md text-label-md">Keamanan &amp; Privasi</h3>
</div>
<p class="text-label-sm text-on-surface-variant">
                    Semua data resep Anda dienkripsi secara end-to-end. Hanya apoteker berlisensi kami yang memiliki akses untuk memverifikasi kebutuhan medis Anda.
                </p>
</section>
<div class="relative rounded-2xl overflow-hidden aspect-[4/3] hidden lg:block">
<img alt="Pharmacist Review" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCG_TCGcBugiXAM1SB6t7Vi8XSdQlR867qIdg4ObG1ARDVzvtejYap07vpo3KbE_KkP0Bee3DBcdWoLXF_Kmb-eIBJj1HTlcLUyX8qwkWFBZr257oD9oeqhucVX4Ot4UFvsLFF6_LTiXoStfdi-chUzflFYZxO712E3iiNvVQ1Dq9ZMH28Yx7cJptN4-hI9A50JMlwJftiuqlKH5vyT99VAhtncWA6s5bAeB2nO0pFp-Jl6pOOwe3LMCdKSNBEiY6HML2YwSto28yFr"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent flex items-end p-6">
<p class="text-on-primary font-label-md text-label-md italic">"Kami memastikan akurasi setiap dosis obat yang Anda terima."</p>
</div>
</div>
</div>
<!-- Right: Upload Form -->
<div class="lg:col-span-8">
<form method="POST" action="{{ route('upload-resep.store') }}" enctype="multipart/form-data" class="glass-card rounded-2xl p-8 shadow-md space-y-8">
<!-- Drag & Drop Area -->
@csrf
<div class="border-2 border-dashed border-outline-variant rounded-2xl p-12 text-center transition-all duration-300 flex flex-col items-center justify-center gap-4 cursor-pointer hover:bg-secondary-container/20 group" id="drop-zone">
<input accept=".jpg,.jpeg,.png,.pdf" class="hidden" id="file-input" name="file_resep" type="file"/>
<div class="w-16 h-16 rounded-full bg-primary-container/10 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'wght' 300;">cloud_upload</span>
</div>
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Tarik dan lepaskan file di sini</h2>
<p class="text-on-surface-variant font-body-md">atau klik untuk memilih dari perangkat Anda</p>
</div>
<div class="flex gap-2">
<span class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant text-label-sm">JPG</span>
<span class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant text-label-sm">PNG</span>
<span class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant text-label-sm">PDF</span>
</div>
</div>
<!-- Preview Area (Hidden by default) -->
<div class="hidden grid grid-cols-2 sm:grid-cols-3 gap-4" id="preview-container">
<!-- File previews will be injected here -->
</div>
<!-- Note to Pharmacist -->
<div class="space-y-3">
<label class="font-label-md text-label-md text-on-surface flex items-center gap-2" for="pharmacist-note">
<span class="material-symbols-outlined text-primary text-sm">edit_note</span>
                        Catatan untuk Apoteker (Opsional)
                    </label>
<textarea class="w-full rounded-xl border border-outline-variant/50 bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all p-4 font-body-md placeholder:text-on-surface-variant/40" id="pharmacist-note" name="catatan" placeholder="Contoh: 'Tolong ganti ke versi generik' atau 'Saya memiliki alergi terhadap antibiotik tertentu'" rows="4"></textarea>
</div>
<!-- Action Button -->
<div class="flex flex-col sm:flex-row gap-4 items-center justify-between border-t border-outline-variant/20 pt-6">
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-sm">lock</span>
<span class="text-label-sm">Transmisi Data Aman 256-bit</span>
</div>
<button type="submit" class="w-full sm:w-auto px-10 py-4 bg-primary text-on-primary rounded-xl font-label-md text-label-md hover:shadow-lg hover:shadow-primary/30 active:scale-95 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined">send</span>
                        Kirim Resep
                    </button>
</div>
</form>
<!-- Bento Info Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
<div class="p-6 rounded-xl bg-white border border-outline-variant/30 flex items-center gap-4 hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined">speed</span>
</div>
<div>
<h4 class="font-label-md text-label-md">Proses Cepat</h4>
<p class="text-label-sm text-on-surface-variant">Verifikasi dalam 15-30 menit</p>
</div>
</div>
<div class="p-6 rounded-xl bg-white border border-outline-variant/30 flex items-center gap-4 hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined">local_shipping</span>
</div>
<div>
<h4 class="font-label-md text-label-md">Pengiriman Langsung</h4>
<p class="text-label-sm text-on-surface-variant">Dikirim ke depan pintu Anda</p>
</div>
</div>
</div>
</div>
</main>
@endsection

@section('scripts')
<script>
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const previewContainer = document.getElementById('preview-container');

    // Trigger file input on click
    dropZone.addEventListener('click', () => fileInput.click());

    // Drag and drop effects
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropZone.classList.add('drop-zone-active');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropZone.classList.remove('drop-zone-active');
        }, false);
    });

    // Handle dropped files
    dropZone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    });

    fileInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            previewContainer.classList.remove('hidden');
            previewContainer.innerHTML = ''; // Clear previous previews
            
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const div = document.createElement('div');
                    div.className = 'relative group rounded-lg overflow-hidden border border-outline-variant aspect-square bg-surface-container';
                    
                    if (file.type.startsWith('image/')) {
                        div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                    } else {
                        div.innerHTML = `
                            <div class="w-full h-full flex flex-col items-center justify-center gap-2 p-2">
                                <span class="material-symbols-outlined text-primary text-3xl">description</span>
                                <span class="text-label-sm text-on-surface-variant truncate w-full text-center">${file.name}</span>
                            </div>
                        `;
                    }
                    
                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'absolute top-1 right-1 bg-error text-on-error rounded-full p-1 shadow-md opacity-0 group-hover:opacity-100 transition-opacity';
                    removeBtn.innerHTML = '<span class="material-symbols-outlined text-sm">close</span>';
                    removeBtn.onclick = (event) => {
                        event.stopPropagation();
                        div.remove();
                        if (previewContainer.children.length === 0) previewContainer.classList.add('hidden');
                    };
                    
                    div.appendChild(removeBtn);
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }
    }
</script>
@endsection
