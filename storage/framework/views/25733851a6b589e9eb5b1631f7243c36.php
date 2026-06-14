<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Data Kategori</h2>

<a href="/kategori/create" class="btn btn-success mb-3">
    Tambah Kategori
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>

            <td><?php echo e($loop->iteration); ?></td>

            <td><?php echo e($item->nama_kategori); ?></td>

            <td>

                <a href="/kategori/<?php echo e($item->id); ?>/edit"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="/kategori/<?php echo e($item->id); ?>"
                      method="POST"
                      class="d-inline">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus kategori ini?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Nada PAW1\tugas_uas\resources\views/kategori/index.blade.php ENDPATH**/ ?>