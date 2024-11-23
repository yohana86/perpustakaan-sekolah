<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $sortBy = $request->input('sort_by', 'popular'); // Default to 'popular'
        $search = $request->input('search', null);

        $books = Book::query()->withCount(['borrows' => fn (Builder $query) => $query->where('confirmation', true)]);

        // Apply sorting logic
        switch ($sortBy) {
            case 'newest':
                $books = $books->latest('created_at');
                break;
            case 'oldest':
                $books = $books->oldest('created_at');
                break;
            case 'a-z':
                $books = $books->orderBy('title', 'asc');
                break;
            case 'z-a':
                $books = $books->orderBy('title', 'desc');
                break;
            case 'popular':
            default:
                $books = $books->orderBy('borrows_count', 'desc');
                break;
        }

        $books = $books->limit(10)->get();

        return view('home')->with([
            'books' => $books,
            'sortBy' => $sortBy,
        ]);
    }
}
