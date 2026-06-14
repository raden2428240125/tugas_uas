<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">Data Obat</h2>

    <a href="/obat/create" class="btn btn-primary mb-3">
        Tambah Obat
    </a>

    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari nama obat...">

    <table class="table table-bordered table-striped">

        <thead class="table-danger">

            <tr>

                <th>ID</th>
                <th>Nama Obat</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Kadaluarsa</th>
                <th>Deskripsi</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            <?php $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($obat->id); ?></td>
                    <td><?php echo e($obat->nama_obat); ?></td>
                    <td><?php echo e($obat->jenis_obat); ?></td>
                    <td><?php echo e($obat->kategori->nama_kategori); ?></td>
                    <td>Rp <?php echo e(number_format($obat->harga, 0, ',', '.')); ?></td>
                    <td><?php echo e($obat->satuan); ?></td>
                    <td><?php echo e($obat->stok); ?></td>
                    <td><?php echo e($obat->tanggal_kadaluarsa); ?></td>
                    <td><?php echo e($obat->deskripsi); ?></td>

                    <td>

                        <a href="/obat/<?php echo e($obat->id); ?>/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/obat/<?php echo e($obat->id); ?>" method="POST" class="d-inline">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit" class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

    <script>
        document
            .getElementById('searchInput')
            .addEventListener('keyup', function() {

                let value =
                    this.value.toLowerCase();

                let rows =
                    document.querySelectorAll('tbody tr');

                rows.forEach(function(row) {

                    row.style.display =
                        row.innerText
                        .toLowerCase()
                        .includes(value)

                        ?
                        ''

                        :
                        'none';

                });

            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/obat/index.blade.php ENDPATH**/ ?>