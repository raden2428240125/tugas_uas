<!-- Top Navigation Bar -->
<nav class="fixed top-0 w-full z-50 flex justify-between items-center px-margin-desktop h-20 bg-surface/80 dark:bg-inverse-surface/80 backdrop-blur-md border-b border-outline-variant/30 shadow-sm">
    <div class="flex items-center gap-12">
        <a href="<?php echo e(url('/')); ?>" class="font-display-lg text-display-lg font-black text-primary dark:text-primary-fixed tracking-tight">SIPA</a>
        <div class="hidden md:flex gap-8">
            <?php if(auth()->guard()->check()): ?>
            <a class="<?php echo e(request()->is('dashboard') ? 'text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary' : 'text-on-surface-variant dark:text-on-surface-variant/70 hover:text-primary transition-colors'); ?> font-label-md text-label-md py-2" href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
            <?php endif; ?>
            <a class="<?php echo e(request()->is('katalog') ? 'text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary' : 'text-on-surface-variant dark:text-on-surface-variant/70 hover:text-primary transition-colors'); ?> font-label-md text-label-md py-2" href="<?php echo e(url('/katalog')); ?>">Katalog Obat</a>
            <?php if(auth()->guard()->check()): ?>
            <a class="<?php echo e(request()->is('upload-resep') ? 'text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary' : 'text-on-surface-variant dark:text-on-surface-variant/70 hover:text-primary transition-colors'); ?> font-label-md text-label-md py-2" href="<?php echo e(url('/upload-resep')); ?>">Resep</a>
            <a class="<?php echo e(request()->is('riwayat-pesanan') ? 'text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary' : 'text-on-surface-variant dark:text-on-surface-variant/70 hover:text-primary transition-colors'); ?> font-label-md text-label-md py-2" href="<?php echo e(url('/riwayat-pesanan')); ?>">Pesanan</a>
            <a class="<?php echo e(request()->is('profil') ? 'text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary' : 'text-on-surface-variant dark:text-on-surface-variant/70 hover:text-primary transition-colors'); ?> font-label-md text-label-md py-2" href="<?php echo e(url('/profil')); ?>">Profil</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="flex items-center gap-6">
        <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(url('/riwayat-pesanan')); ?>" class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors inline-block">notifications</a>
        <a href="<?php echo e(url('/katalog')); ?>" class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors inline-block">shopping_cart</a>
        <?php endif; ?>
        <a href="<?php echo e(url('/lokasi-apotek')); ?>" class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors inline-block" title="Lokasi Apotek">location_on</a>
        <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(url('/profil')); ?>" class="h-10 w-10 rounded-full overflow-hidden border-2 border-primary/20 block cursor-pointer hover:border-primary transition-colors flex items-center justify-center bg-surface-container-high shrink-0">
            <?php $navUserId = auth()->id(); ?>
            <?php if(file_exists(public_path('profiles/user_' . $navUserId . '.jpg'))): ?>
                <img alt="User Profile Avatar" src="<?php echo e(asset('profiles/user_' . $navUserId . '.jpg')); ?>?v=<?php echo e(time()); ?>" class="w-full h-full object-cover"/>
            <?php else: ?>
                <span class="material-symbols-outlined text-on-surface-variant">person</span>
            <?php endif; ?>
        </a>
        <?php else: ?>
        <div class="flex gap-3">
            <a href="<?php echo e(route('login')); ?>" class="hidden md:flex items-center justify-center px-5 py-2 border-2 border-primary text-primary rounded-xl font-bold text-[14px] hover:bg-primary/5 transition-all">Masuk</a>
            <a href="<?php echo e(route('register')); ?>" class="flex items-center justify-center px-5 py-2 bg-primary text-on-primary rounded-xl font-bold text-[14px] hover:opacity-90 transition-all shadow-md">Daftar</a>
        </div>
        <?php endif; ?>
    </div>
</nav>
<?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/partials/navbar.blade.php ENDPATH**/ ?>