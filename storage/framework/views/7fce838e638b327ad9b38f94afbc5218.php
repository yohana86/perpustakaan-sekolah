<div class="fixed-top">
    <?php if(auth()->guard()->check()): ?>
        <?php if(in_array(auth()->user()->role, [\App\Models\User::ROLES['Admin'], \App\Models\User::ROLES['Librarian']])): ?>
            <div class="navbar px-5 bg-primary-subtle flex justify-content-between">
                <span>Anda adalah <b><?php echo e(auth()->user()->role); ?></b></span>

                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-primary">Ke Dashboard</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary px-3">
        <div class="container-fluid">
            <a class="navbar-brand fs-4 fw-bold" href="<?php echo e(route('home')); ?>">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarItems"
                aria-controls="navbarItems" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarItems">
                <div class="navbar-nav ms-auto">
                    <?php if(auth()->guard()->check()): ?>
                        <a class="nav-link <?php echo e(request()->routeIs('my-books.*') ? 'active' : ''); ?>" href="<?php echo e(route("my-books.index")); ?>">Buku-ku</a>

                        <form action="<?php echo e(route('logout')); ?>" method="POST"
                            onsubmit="return confirm('Anda yakin ingin keluar?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    <?php endif; ?>

                    <?php if(auth()->guard()->guest()): ?>
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</div>
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>