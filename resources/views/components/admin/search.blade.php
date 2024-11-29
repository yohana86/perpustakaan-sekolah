<form class="d-flex w-100 my-4 justify-content-between align-items-center" action="{{ $url ?? url()->current() }}" method="GET" style="max-width: 900px;" id="searchForm">
    <div class="input-group flex-grow-1 me-2" style="max-width: 75%;">
        <input type="text" name="search" value="{{ request()->query('search') }}" class="form-control" placeholder="{{ $placeholder ?? 'Cari...' }}" aria-label="Search" />
        <button class="btn btn-outline-secondary" type="submit">
            <i class="fas fa-search fa-sm"></i>
        </button>
    </div>

    <select name="sort_by" id="sortByDropdown" class="form-select" style="max-width: 20%;" aria-label="Sort By">
        <option value="popular" {{ request('sort_by') == 'popular' ? 'selected' : '' }}>Paling Populer</option>
        <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Terbaru</option>
        <option value="a-z" {{ request('sort_by') == 'a-z' ? 'selected' : '' }}>A - Z</option>
        <option value="z-a" {{ request('sort_by') == 'z-a' ? 'selected' : '' }}>Z - A</option>
        <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Terlama</option>
    </select>
</form>

<script>
    document.getElementById('sortByDropdown').addEventListener('change', function() {
        // Automatically submit the form when a sort option is selected
        document.getElementById('searchForm').submit();
    });
</script>





