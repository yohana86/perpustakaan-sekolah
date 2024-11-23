<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['title' => 'List Member'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <div class="card border-left-success">
                    <div class="card-body"><?php echo $success; ?></div>
                </div>
            <?php endif; ?>

            <a href="<?php echo e(route('admin.members.create')); ?>"
                class="btn btn-primary d-block d-sm-inline-block my-3">Tambah</a>

            <?php if (isset($component)) { $__componentOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc85ce7d04e07b8a8b4f86b4c88bcdc93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.search','data' => ['url' => ''.e(route('admin.members.index')).'','placeholder' => 'Cari member...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('admin.members.index')).'','placeholder' => 'Cari member...']); ?>
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
                            <th>Nama</th>
                            <th>Tipe Nomor</th>
                            <th>Nomor</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($member->name); ?></td>
                                <td><?php echo e($member->number_type); ?></td>
                                <td><?php echo e($member->number); ?></td>
                                <td>+<?php echo e($member->telephone); ?></td>
                                <td class="d-flex">
                                    <a href="<?php echo e(route('admin.members.edit', $member)); ?>"
                                        class="btn btn-link p-0 mx-1">Edit</a>

                                    <form action="<?php echo e(route('admin.members.destroy', $member)); ?>" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin menghapus member ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-link text-danger p-0 mx-1">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="mt-5">
                    <?php echo e($members->withQueryString()->links()); ?>

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
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/admin/members/index.blade.php ENDPATH**/ ?>