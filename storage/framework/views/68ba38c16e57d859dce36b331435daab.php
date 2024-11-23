<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="mt-5 py-5">
        <?php if($message = session()->get('success')): ?>
            <div class="container">
                <div class="card bg-success-subtle p-3"><?php echo e($message); ?></div>
            </div>
        <?php endif; ?>

        <?php $__errorArgs = ['default'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="container">
                <div class="card bg-danger-subtle p-3"><?php echo e($message); ?></div>
            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <h2 class="mt-4 fs-4 fw-bold ms-4 mb-4">Sedang di-pinjam</h2>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <?php $__currentLoopData = $currentBorrows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentBorrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('preview', $currentBorrow->book)); ?>" class="col text-dark text-decoration-none">
                        <div class="card">
                            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                <?php if(!$currentBorrow->confirmation): ?>
                                    <span class="text-warning">Belum dikonfirmasi</span>
                                <?php else: ?>
                                    <?php switch($currentBorrow->restore?->status):
                                        case (\App\Models\Restore::STATUSES['Not confirmed']): ?>
                                        <?php case (\App\Models\Restore::STATUSES['Past due']): ?>
                                            <span class="text-secondary">Menunggu konfirmasi pengembalian...</span>
                                        <?php break; ?>

                                        <?php case (\App\Models\Restore::STATUSES['Fine not paid']): ?>
                                            <span class="text-danger">
                                                Denda terlambat: Rp
                                                <?php echo e(number_format($currentBorrow->restore->fine, 0, ',', '.')); ?>,-
                                                <br />
                                            </span>
                                        <?php break; ?>

                                        <?php default: ?>
                                            <span class="text-success">Terkonfirmasi</span>

                                            <form action="<?php echo e(route('my-books.update', $currentBorrow)); ?>" method="POST" onsubmit="return confirm('Anda yakin ingin mengembalikan buku ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-link p-0">Kembalikan</button>
                                            </form>
                                    <?php endswitch; ?>
                                <?php endif; ?>
                            </div>

                            <img src="<?php echo e(isset($currentBorrow->book->cover) ? asset('storage/' . $currentBorrow->book->cover) : asset('storage/placeholder.png')); ?>"
                                alt="<?php echo e($currentBorrow->book->title); ?>" class="card-img-top rounded-0">

                            <div class="card-body text-center">
                                <h3 class="card-text fs-5 fw-bold mb-5"><?php echo e($currentBorrow->book->title); ?></h3>
                                <span class="fs-6">Tenggat
                                    <?php
                                        $due = $currentBorrow->borrowed_at->addDays($currentBorrow->duration);
                                    ?>
                                    <span
                                        class="fw-bold text-decoration-underline text-<?php echo e($due > now() ? 'success' : 'danger'); ?>"><?php echo e($due->locale('id_ID')->diffForHumans()); ?></span>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-4">
                <?php echo e($currentBorrows->links()); ?>

            </div>
        </div>
    </section>

    <section class="py-5 bg-body-tertiary">
        <h2 class="fs-4 fw-bold ms-4 mb-4">Peminjaman terbaru anda</h2>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <?php $__currentLoopData = $recentBorrows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentBorrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('preview', $recentBorrow->book)); ?>" class="col text-dark text-decoration-none">
                        <div class="card">
                            <img src="<?php echo e(isset($recentBorrow->book->cover) ? asset('storage/' . $recentBorrow->book->cover) : asset('storage/placeholder.png')); ?>"
                                alt="<?php echo e($recentBorrow->book->title); ?>" class="card-img-top">
                            <div class="card-body text-center">
                                <h3 class="card-text fs-5 fw-bold mb-5"><?php echo e($recentBorrow->book->title); ?></h3>
                                <span class="fs-6">Meminjam tanggal
                                    <span
                                        class="fw-bold text-decoration-underline"><?php echo e($recentBorrow->restore->returned_at->locale('id_ID')->isoFormat('LL')); ?></span>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/my-books.blade.php ENDPATH**/ ?>