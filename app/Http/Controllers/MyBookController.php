<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Restore;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MyBookController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'latest'); // Default to 'latest'

        $currentBorrows = Borrow::query()
            ->with('book')
            ->whereBelongsTo(auth()->user())
            ->whereDoesntHave('restore', function (Builder $query) {
                $query->where('confirmation', true);
            })
            ->when($sortBy === 'a-z', fn($q) => $q->orderBy(Book::select('title')->whereColumn('books.id', 'borrows.book_id'), 'asc'))
            ->when($sortBy === 'z-a', fn($q) => $q->orderBy(Book::select('title')->whereColumn('books.id', 'borrows.book_id'), 'desc'))
            ->when($sortBy === 'newest', fn($q) => $q->latest('id'))
            ->when($sortBy === 'oldest', fn($q) => $q->oldest('id'))
            ->paginate(6);

        // Mendapatkan peminjaman terbaru yang sudah dikonfirmasi
        $recentBorrows = Borrow::query()
            ->with(['book', 'restore'])
            ->whereBelongsTo(auth()->user())
            ->whereHas('restore', function (Builder $query) {
                $query->where('confirmation', true);
            })
            ->when($sortBy === 'a-z', fn($q) => $q->orderBy(Book::select('title')->whereColumn('books.id', 'borrows.book_id'), 'asc'))
            ->when($sortBy === 'z-a', fn($q) => $q->orderBy(Book::select('title')->whereColumn('books.id', 'borrows.book_id'), 'desc'))
            ->when($sortBy === 'newest', fn($q) => $q->latest('id'))
            ->when($sortBy === 'oldest', fn($q) => $q->oldest('id'))
            ->limit(6)
            ->get();

        return view('my-books')->with([
            'currentBorrows' => $currentBorrows,
            'recentBorrows' => $recentBorrows,
            'sortBy' => $sortBy,
        ]);
    }



    public function store(Request $request, Book $book)
    {
        $request->validate([
            'duration' => ['required', 'numeric'],
            'amount' => ['required', 'numeric', 'max:' . $book->amount],
        ]);

        Borrow::create([
            'borrowed_at' => now(),
            'duration' => $request->duration,
            'amount' => $request->amount,
            'confirmation' => false,
            'book_id' => $book->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('my-books.index')->with('success', 'Berhasil mengajukan peminjaman!');
    }

    public function update($id)
    {
        $borrow = Borrow::query()->findOrFail($id);

        if (!$borrow->confirmation || isset($borrow->restore)) {
            return back()->withErrors('Peminjaman ini tidak sesuai!');
        }

        $returnStatus = $borrow->borrowed_at->addDays($borrow->duration) > now() ? Restore::STATUSES['Not confirmed'] : Restore::STATUSES['Past due'];

        Restore::create([
            'returned_at' => now(),
            'status' => $returnStatus,
            'confirmation' => 0,
            'book_id' => $borrow->book->id,
            'user_id' => auth()->id(),
            'borrow_id' => $borrow->id,
        ]);

        return redirect()->route('my-books.index')->with('success', 'Berhasil mengajukan pengembalian!');
    }
}
