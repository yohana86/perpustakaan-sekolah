<x-app-layout>
    <section class="d-flex flex-column justify-content-center align-items-center text-center mt-5 py-5 px-3">
        <h1 class="mt-4 fs-2 fw-bold">Selamat Datang di Perpustakaan Online!</h1>
        <form action="{{ route('search') }}" method="GET" class="d-flex w-100 my-4 justify-content-between align-items-center" style="max-width: 900px;">
            <div class="input-group flex-grow-1 me-2" style="max-width: 75%;">
                <input type="text" name="search" class="form-control" placeholder="Cari buku..." aria-label="Cari buku..." />
                <button type="submit" class="btn btn-outline-secondary">
                    <svg class="text-body-tertiary" fill="currentColor" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 19.585938 21.585938 C 20.137937 22.137937 21.033938 22.137938 21.585938 21.585938 C 22.137938 21.033938 22.137938 20.137938 21.585938 19.585938 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"></path>
                    </svg>
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
    </section>

    <section>
        <h2 class="fs-4 fw-bold ms-4 mb-4">Daftar Buku</h2>

        <div class="container">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
                @foreach ($books as $book)
                    <a href="{{ route('preview', $book) }}" class="col text-dark text-decoration-none">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ isset($book->cover) ? asset('storage/' . $book->cover) : asset('storage/placeholder.png') }}" alt="{{ $book->title }}" class="card-img-top" style="object-fit: cover; height: 200px;">
                            <div class="card-body text-center">
                                <h3 class="card-text fs-6 fw-bold mb-3">{{ $book->title }}</h3>
                                <span class="fs-6">
                                    @if (request('sort_by') == 'popular')
                                        Dipinjam <span class="fw-bold text-decoration-underline">{{ $book->borrows_count }}</span> kali
                                    @else
                                        Terbit <span class="fw-bold text-decoration-underline">{{ $book->created_at->locale('id_ID')->diffForHumans() }}</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.getElementById('sortByDropdown').addEventListener('change', function() {
            const selectedSort = this.value;
            const searchQuery = new URLSearchParams(window.location.search);
            searchQuery.set('sort_by', selectedSort);

            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput && searchInput.value) {
                searchQuery.set('search', searchInput.value);
            }

            window.location.search = searchQuery.toString();
        });
    </script>

</x-app-layout>
