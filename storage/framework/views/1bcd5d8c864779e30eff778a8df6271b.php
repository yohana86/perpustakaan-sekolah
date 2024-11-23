<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['title' => 'Edit Pengembalian'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="row" action="<?php echo e(route('admin.returns.update', $restore)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-center">
                        <img id="restoreCover"
                            src="<?php echo e(isset($restore->book->cover) ? asset('storage/' . $restore->book->cover) : asset('storage/placeholder.png')); ?>"
                            alt="<?php echo e($restore->book->title); ?>" class="rounded" style="width: 300px;">
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <h5 class="text-center"><?php echo e($restore->book->title); ?></h5>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="name" class="form-label">Peminjam</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="<?php echo e($restore->user->name); ?>" disabled>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="name" class="form-label">Jumlah Pinjam</label>
                    <input type="text" name="amount" class="form-control" id="amount"
                        value="<?php echo e($restore->borrow->amount . ' hari'); ?>" disabled>
                </div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="returned_at" class="form-label">Tanggal Pengembalian</label>
                    <input type="text" name="returned_at" class="form-control" id="returned_at"
                        value="<?php echo e($restore->returned_at->locale('id_ID')->isoFormat('LL')); ?>" disabled>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" id="status"
                        value="<?php echo e($restore->status); ?>" disabled>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="fine" class="form-label">Denda</label>
                    <input type="number" name="fine" class="form-control" id="fine"
                        value="<?php echo e($restore->fine ?? ''); ?>" <?php if(isset($restore->fine) || $restore->returned_at < $restore->borrow->borrowed_at->addDays($restore->borrow->duration)): echo 'disabled'; endif; ?>>
                    <?php $__errorArgs = ['fine'];
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

                <div class="d-flex w-100 mt-3 justify-content-end">
                    <?php switch($restore->status):
                        case (\App\Models\Restore::STATUSES['Returned']): ?>
                            <span class="text-success my-auto mr-3">Pengembalian ini telah dikonfirmasi.</span>
                        <?php break; ?>

                        <?php case (\App\Models\Restore::STATUSES['Not confirmed']): ?>
                        <?php case (\App\Models\Restore::STATUSES['Fine not paid']): ?>
                            <input type="hidden" name="confirmation" value="1">
                            <button type="submit" class="btn btn-success mx-3">Konfirmasi</button>
                        <?php break; ?>

                        <?php case (\App\Models\Restore::STATUSES['Past due']): ?>
                            <input type="hidden" name="confirmation" value="0">
                            <button type="submit" class="btn btn-danger mx-3">Beri denda</button>
                        <?php break; ?>
                    <?php endswitch; ?>

                    <a href="<?php echo e(route('admin.returns.index')); ?>" class="btn btn-warning mx-3">Kembali</a>

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
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/admin/returns/edit.blade.php ENDPATH**/ ?>