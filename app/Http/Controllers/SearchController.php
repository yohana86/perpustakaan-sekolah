<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $sortBy = $request->input('sort_by', 'popular'); // Default to 'popular'
        $search = $request->input('search');

        // Base query with search filter
        $books = Book::query()
            ->withCount(['borrows' => fn ($query) => $query->where('confirmation', true)])
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('publisher', 'LIKE', "%{$search}%")
                        ->orWhere('writer', 'LIKE', "%{$search}%")
                        ->orWhere('publish_year', 'LIKE', "%{$search}%")
                        ->orWhere('category', 'LIKE', "%{$search}%")
                        ->orWhere('status', 'LIKE', "%{$search}%");
                });
            });

        // Apply sorting based on 'sort_by' parameter
        switch ($sortBy) {
            case 'newest':
                $books = $books->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $books = $books->orderBy('created_at', 'asc');
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

        // Paginate the results and retain the current sort and search parameters
        $books = $books->paginate(12)->appends([
            'sort_by' => $sortBy,
            'search' => $search,
        ]);

        return view('search')->with([
            'books' => $books,
            'sortBy' => $sortBy,
            'search' => $search,
        ]);
    }
}
