<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['title' => 'Edit Peminjaman'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="row" action="<?php echo e(route('admin.borrows.update', $borrow)); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="d-flex w-100 mt-3 justify-content-end">
                    <?php if($borrow->confirmation): ?>
                        <span class="text-success my-auto mr-3">Peminjaman ini telah terkonfirmasi.</span>
                    <?php else: ?>
                        <input type="hidden" name="confirmation" value="1">
                        <button type="submit" class="btn btn-success mx-3">Konfirmasi</button>
                    <?php endif; ?>

                    <a href="<?php echo e(route('admin.borrows.index')); ?>" class="btn btn-warning mx-3">Kembali</a>

                    <?php $__errorArgs = ['confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-center">
                        <img id="borrowCover"
                            src="<?php echo e(isset($borrow->book->cover) ? asset('storage/' . $borrow->book->cover) : asset('storage/placeholder.png')); ?>"
                            alt="<?php echo e($borrow->book->title); ?>" class="rounded" style="width: 300px;">
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <h5 class="text-center"><?php echo e($borrow->book->title); ?></h5>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="name" class="form-label">Peminjam</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="<?php echo e($borrow->user->name); ?>" disabled>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="name" class="form-label">Jumlah Pinjam</label>
                    <input type="text" name="amount" class="form-control" id="amount"
                        value="<?php echo e($borrow->amount . ' buku'); ?>" disabled>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="borrowed_at" class="form-label">Tanggal Peminjaman</label>
                    <input type="text" name="borrowed_at" class="form-control" id="borrowed_at"
                        value="<?php echo e($borrow->borrowed_at->locale('id_ID')->isoFormat('LL')); ?>" disabled>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="duration" class="form-label">Durasi</label>
                    <input type="text" name="duration" class="form-control" id="duration"
                        value="<?php echo e($borrow->duration . ' hari'); ?>" disabled>
                </div>
            </form>
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
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/admin/borrows/edit.blade.php ENDPATH**/ ?>