<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve(['title' => 'Login'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <a href="<?php echo e(route('home')); ?>" class="fw-bold fs-1 text-decoration-none text-black">Perpustakaan</a>
    <h3>Login</h3>

    <form action="<?php echo e(route('login')); ?>" method="POST"
        class="w-100 d-flex flex-column justify-content-center align-items-center gap-4 my-4 px-4 text-start"
        style="max-width: 500px">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>

        <div class="w-100">
            <label for="number" class="form-label">Nomor</label>
            <input type="number" name="number" class="form-control" id="number" value="<?php echo e(old('number')); ?>" />
            <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="w-100">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" />
        </div>

        <div class="w-100 d-flex justify-content-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Ingat saya
                </label>
            </div>
        </div>

        <div class="w-100 d-grid">
            <button type="submit" class="btn btn-primary">
                <span class="fs-5">Login</span>
            </button>
        </div>

        <div class="w-100 d-flex justify-content-end">
            <span>
                Belum punya akun?
                <a href="<?php echo e(route('register')); ?>">Daftar!</a>
            </span>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/login.blade.php ENDPATH**/ ?>