<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo e($title ?? 'Perpustakaan'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>

<body
    class="d-flex flex-column justify-content-center align-items-center text-center min-vh-100 py-5 bg-light">
    <?php echo e($slot); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/layouts/guest.blade.php ENDPATH**/ ?>