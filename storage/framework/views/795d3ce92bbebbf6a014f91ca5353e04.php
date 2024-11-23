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
    <section class="container min-vh-100">
        <div class="row row-cols-1 row-cols-lg-2 g-5" style="padding-top: 7rem; padding-bottom: 3rem">
            <div class="col">
                <img class="d-block rounded-4 mx-auto" style="width: 70%"
                    src="<?php echo e(isset($book->cover) ? asset('storage/' . $book->cover) : asset('storage/placeholder.png')); ?>"
                    alt="<?php echo e($book->title); ?>" />
            </div>
            <div class="col">
                <div class="d-flex align-items-center">
                    <h1 class="m-0 fw-bold"><?php echo e($book->title); ?> (<?php echo e($book->publish_year); ?>)</h1>

                    <div class="ms-3 px-3 py-1 text-white bg-primary rounded-5">
                        <?php echo e($book->category); ?>

                    </div>
                </div>

                <h2 class="my-3 fs-5">
                    Karya: <span class="fw-bold"><?php echo e($book->writer); ?></span>
                </h2>
                
                <h2 class="my-3 fs-5">
                    Jumlah tersedia: <span class="fw-bold"><?php echo e($book->amount); ?> buku</span>
                </h2>

                <div class="mt-5">
                    <?php echo $book->synopsis; ?>

                </div>

                <?php if(auth()->check()): ?>
                    <form class="my-5" action="<?php echo e(route('my-books.store', $book)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        
                        <div class="row row-cols-1 row-cols-lg-2 mb-3">
                            <div>
                                <label for="duration">Durasi</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="duration" value="<?php echo e(old('duration')); ?>">
                                    <span class="input-group-text">hari</span>
                                </div>
                                <?php $__errorArgs = ['duration'];
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
                            <div>
                                <label for="amount">Jumlah Buku (maks: <?php echo e($book->amount); ?> buku)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="amount" value="<?php echo e(old('amount')); ?>">
                                    <span class="input-group-text">buku</span>
                                </div>
                                <?php $__errorArgs = ['amount'];
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
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg d-block mx-auto px-5">Pinjam
                            Buku</button>
                    </form>
                <?php elseif($book->amount > 0): ?>
                    <button type="button" class="btn btn-outline-secondary btn-lg d-block mx-auto px-5 my-5"
                        disabled>Anda harus login untuk bisa meminjam</button>
                <?php else: ?>
                    <button type="button" class="btn btn-outline-secondary btn-lg d-block mx-auto px-5 my-5"
                        disabled>Buku tidak tersedia</button>
                <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/preview.blade.php ENDPATH**/ ?>