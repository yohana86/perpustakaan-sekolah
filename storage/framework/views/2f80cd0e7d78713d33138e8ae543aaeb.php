<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['title' => 'List Peminjaman'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if($success = session()->get('success')): ?>
                <div class="card border-left-success mb-3">
                    <div class="card-body"><?php echo $success; ?></div>
                </div>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.search','data' => ['url' => ''.e(route('admin.borrows.index')).'','placeholder' => 'Cari peminjaman...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('admin.borrows.index')).'','placeholder' => 'Cari peminjaman...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93)): ?>
<?php $attributes = $__attributesOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93; ?>
<?php unset($__attributesOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93)): ?>
<?php $component = $__componentOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93; ?>
<?php unset($__componentOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93); ?>
<?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Buku</th>
                            <th>Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Durasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $borrows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <img src="<?php echo e(isset($borrow->book->cover) ? asset('storage/' . $borrow->book->cover) : asset('storage/placeholder.png')); ?>"
                                        alt="<?php echo e($borrow->book->title); ?>" class="rounded" style="width: 100px;">
                                    <span class="ml-3"><?php echo e($borrow->book->title); ?></span>
                                </td>
                                <td><?php echo e($borrow->user->name); ?></td>
                                <td><?php echo e($borrow->borrowed_at->locale('id_ID')->isoFormat('LL')); ?></td>
                                <td><?php echo e($borrow->duration); ?> hari</td>
                                <td>
                                    <?php switch($borrow->confirmation):
                                        case (true): ?>
                                            <span class="badge badge-success">Terkonfirmasi</span>
                                        <?php break; ?>

                                        <?php case (false): ?>
                                            <span class="badge badge-warning">Menunggu konfirmasi</span>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.borrows.edit', $borrow)); ?>" class="btn btn-link">Edit</a>

                                    <form action="<?php echo e(route('admin.borrows.destroy', $borrow)); ?>" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin menghapus peminjaman ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-link text-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="mt-5">
                        <?php echo e($borrows->withQueryString()->links()); ?>

                    </div>
                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/admin/borrows/index.blade.php ENDPATH**/ ?>