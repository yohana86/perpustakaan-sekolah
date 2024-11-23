<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['title' => 'List Buku'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

            <a href="<?php echo e(route('admin.books.create')); ?>" class="btn btn-primary d-block d-sm-inline-block my-3">Tambah</a>

            <!-- Search and Sort Form -->
            <form action="<?php echo e(route('admin.books.index')); ?>" method="GET" id="sortForm" class="d-flex w-100 my-4 justify-content-between align-items-center" style="max-width: 900px;">
                <div class="input-group flex-grow-1 me-2" style="max-width: 75%;">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control" placeholder="Cari buku..." aria-label="Search" />
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>

                <select name="sort_by" id="sortByDropdown" class="form-select" style="max-width: 20%;" onchange="document.getElementById('sortForm').submit()">
                    <option value="popular" <?php echo e(request('sort_by') == 'popular' ? 'selected' : ''); ?>>Paling Populer</option>
                    <option value="newest" <?php echo e(request('sort_by') == 'newest' ? 'selected' : ''); ?>>Terbaru</option>
                    <option value="a-z" <?php echo e(request('sort_by') == 'a-z' ? 'selected' : ''); ?>>A - Z</option>
                    <option value="z-a" <?php echo e(request('sort_by') == 'z-a' ? 'selected' : ''); ?>>Z - A</option>
                    <option value="oldest" <?php echo e(request('sort_by') == 'oldest' ? 'selected' : ''); ?>>Terlama</option>
                </select>
            </form>


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah Tersedia</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <img src="<?php echo e(isset($book->cover) ? asset('storage/' . $book->cover) : asset('storage/placeholder.png')); ?>"
                                        alt="<?php echo e($book->title); ?>" class="rounded" style="width: 100px;">
                                </td>
                                <td><?php echo e($book->category); ?></td>
                                <td><?php echo e($book->title); ?></td>
                                <td><?php echo e($book->writer); ?></td>
                                <td><?php echo e($book->publisher); ?></td>
                                <td><?php echo e($book->publish_year); ?></td>
                                <td><?php echo e($book->amount); ?> buku</td>
                                <td>
                                    <?php switch($book->status):
                                        case (\App\Models\Book::STATUSES['Available']): ?>
                                            <span class="badge badge-success">Tersedia</span>
                                        <?php break; ?>

                                        <?php case (\App\Models\Book::STATUSES['Borrowed']): ?>
                                            <span class="badge badge-warning">Dipinjam</span>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.books.edit', $book)); ?>"
                                        class="btn btn-link">Edit</a>

                                    <form action="<?php echo e(route('admin.books.destroy', $book)); ?>" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin menghapus buku ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-link text-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="mt-5">
                    <?php echo e($books->withQueryString()->links()); ?>

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
<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/admin/books/index.blade.php ENDPATH**/ ?>