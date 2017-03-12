<?php

namespace RioLibrary\Http\Controllers;

use Illuminate\Http\Request;
use RioLibrary\Book;

class BorrowersController extends Controller
{
    public function borrowBook($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize($book);
        $book->user_id = auth()->user()->id;
        $book->borrowed = 1;
        $book->last_user = auth()->user()->name;
        $book->borrowed_count++;
        $book->save();
        $this->getBookTotals();
        session()->flash('success', 'Book successfully borrowed.');
        return redirect()->back();
    }

    public function borrowedBooks()
    {
        $this->authorize('borrowedBooks', Book::class);
        $books = Book::orderBy('title', 'asc')->where('user_id', auth()->user()->id)->get();
        return view('books.borrowed', compact('books'));
    }

    public function returnBook($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize($book);
        $book->user_id = null;
        $book->borrowed = 0;
        $book->save();
        $this->getBookTotals();
        session()->flash('success', 'Book successfully returned.');
        return redirect()->back();
    }

    protected function getBookTotals()
    {
        $books = Book::where('borrowed', '0')->get();
        session()->forget('totalBooks');
        session()->put('totalBooks', $books->count());
        if (auth()->check()) {
            session()->forget('totalBooksBorrowed');
        }
        session()->put('totalBooksBorrowed', auth()->user()->books()->count());
    }
}
