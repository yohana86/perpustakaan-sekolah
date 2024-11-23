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
    <section class="d-flex flex-column justify-content-center align-items-center text-center mt-5 py-5 px-4">
        <h1 class="mt-4 fs-2 fw-bold">Hasil Pencarian</h1>
        <form action="<?php echo e(route('search')); ?>" method="GET" id="searchForm" class="d-flex w-100 my-4 justify-content-between align-items-center" style="max-width: 900px;">
            <div class="input-group flex-grow-1 me-2" style="max-width: 75%;">
                <!-- Retain the search query in the input -->
                <input type="text" name="search" class="form-control" placeholder="Cari buku..." aria-label="Cari buku..." value="<?php echo e(request('search')); ?>" />
                <button type="submit" class="btn btn-outline-secondary">
                    <svg class="text-body-tertiary" fill="currentColor" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 19.585938 21.585938 C 20.137937 22.137937 21.033938 22.137938 21.585938 21.585938 C 22.137938 21.033938 22.137938 20.137938 21.585938 19.585938 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Keep the selected sort option in the dropdown -->
            <select name="sort_by" id="sortByDropdown" class="form-select" style="max-width: 20%;" aria-label="Sort By">
                <option value="popular" <?php echo e(request('sort_by') == 'popular' ? 'selected' : ''); ?>>Paling Populer</option>
                <option value="newest" <?php echo e(request('sort_by') == 'newest' ? 'selected' : ''); ?>>Terbaru</option>
                <option value="a-z" <?php echo e(request('sort_by') == 'a-z' ? 'selected' : ''); ?>>A - Z</option>
                <option value="z-a" <?php echo e(request('sort_by') == 'z-a' ? 'selected' : ''); ?>>Z - A</option>
                <option value="oldest" <?php echo e(request('sort_by') == 'oldest' ? 'selected' : ''); ?>>Terlama</option>
            </select>
        </form>
    </section>

    <!-- Book List Section -->
    <section class="container pb-5">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
            <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('preview', $book)); ?>" class="col text-dark text-decoration-none">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo e(isset($book->cover) ? asset('storage/' . $book->cover) : asset('storage/placeholder.png')); ?>"
                            alt="<?php echo e($book->title); ?>" class="card-img-top" style="object-fit: cover; height: 200px;">
                        <div class="card-body text-center">
                            <h3 class="card-text fs-6 fw-bold mb-3"><?php echo e($book->title); ?></h3>
                            <span class="fs-6">Karya:
                                <span class="fw-bold"><?php echo e($book->writer); ?></span>
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h1 class="mx-auto text-center">Tidak ada buku</h1>
            <?php endif; ?>
        </div>

        <?php if($books->isNotEmpty()): ?>
            <div class="mt-5">
                <?php echo e($books->withQueryString()->links()); ?>

            </div>
        <?php endif; ?>
    </section>

    <script>
        // JavaScript to submit the form when the dropdown changes
        document.getElementById('sortByDropdown').addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });
    </script>
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
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/search.blade.php ENDPATH**/ ?>