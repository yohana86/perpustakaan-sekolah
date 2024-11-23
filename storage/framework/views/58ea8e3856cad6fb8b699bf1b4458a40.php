<form class="d-flex w-100 my-4 justify-content-between align-items-center" action="<?php echo e($url ?? url()->current()); ?>" method="GET" style="max-width: 900px;" id="searchForm">
    <div class="input-group flex-grow-1 me-2" style="max-width: 75%;">
        <input type="text" name="search" value="<?php echo e(request()->query('search')); ?>" class="form-control" placeholder="<?php echo e($placeholder ?? 'Cari...'); ?>" aria-label="Search" />
        <button class="btn btn-outline-secondary" type="submit">
            <i class="fas fa-search fa-sm"></i>
        </button>
    </div>

    <select name="sort_by" id="sortByDropdown" class="form-select" style="max-width: 20%;" aria-label="Sort By">
        <option value="popular" <?php echo e(request('sort_by') == 'popular' ? 'selected' : ''); ?>>Paling Populer</option>
        <option value="newest" <?php echo e(request('sort_by') == 'newest' ? 'selected' : ''); ?>>Terbaru</option>
        <option value="a-z" <?php echo e(request('sort_by') == 'a-z' ? 'selected' : ''); ?>>A - Z</option>
        <option value="z-a" <?php echo e(request('sort_by') == 'z-a' ? 'selected' : ''); ?>>Z - A</option>
        <option value="oldest" <?php echo e(request('sort_by') == 'oldest' ? 'selected' : ''); ?>>Terlama</option>
    </select>
</form>

<script>
    document.getElementById('sortByDropdown').addEventListener('change', function() {
        // Automatically submit the form when a sort option is selected
        document.getElementById('searchForm').submit();
    });
</script>





<?php /**PATH C:\xampp\htdocs\perpustakaan-sekolah\resources\views/components/admin/search.blade.php ENDPATH**/ ?>