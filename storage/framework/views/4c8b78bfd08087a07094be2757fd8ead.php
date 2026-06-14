<!DOCTYPE html>
<html>

<head>
    <title>Tambah Obat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Tambah Obat</h2>

        <form action="<?php echo e(route('obat.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Obat</label>
                <input type="text" name="jenis_obat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tanggal Kadaluarsa</label>
                <input type="date" name="tanggal_kadaluarsa" class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control">
            </div>

            <div class="mb-3">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <?php if($kategoris->isEmpty()): ?>
                    <div class="alert alert-warning p-2">
                        Belum ada kategori! Silakan <a href="<?php echo e(route('kategori.create')); ?>">tambah kategori</a> terlebih dahulu.
                    </div>
                <?php else: ?>
                    <select name="kategori_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kategori->id); ?>"><?php echo e($kategori->nama_kategori); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>

</body>

</html>
<?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/obat/create.blade.php ENDPATH**/ ?>