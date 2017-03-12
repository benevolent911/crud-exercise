<?php

namespace RioLibrary\Http\Controllers;

use Illuminate\Http\Request;
use RioLibrary\Book;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('view', Book::class);
        $books = Book::orderBy('title', 'asc')->paginate(20);
        session()->put('totalBooks', $books->total());
        return view('admin.index', compact('books'));
    }

    public function search()
    {
        $this->authorize('view', Book::class);
        $this->validate(request(), [
            'searchText' => 'required'
        ]);
        $books = Book::where(str_replace(' ', '_', request('searchFilter')), 'like', '%' . request('searchText') . '%')
                    ->orderBy(str_replace(' ', '_', request('searchFilter')), str_replace('ending', '', request('orderBy')))
                    ->paginate(20);
        return view('admin.index', compact('books'));
    }
}
