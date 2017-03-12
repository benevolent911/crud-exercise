<?php

namespace RioLibrary\Http\Controllers;

use Illuminate\Http\Request;
use RioLibrary\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() == null || auth()->user()->role == 'user') {
            $books = Book::where('borrowed', '0')->orderBy('title', 'asc')->paginate(9);
            session()->put('totalBooks', $books->total());
            return view('books.index', compact('books'));
        } else {
            return redirect()->route('admin');
        }
    }

    public function search()
    {
        $this->validate(request(), [
            'searchText' => 'required'
        ]);
        $books = Book::where([
                        [str_replace(' ', '_', request('searchFilter')), 'like', '%' . request('searchText') . '%'],
                        ['borrowed' , '0']])
                      ->orderBy(str_replace(' ', '_', request('searchFilter')), str_replace('ending', '', request('orderBy')))
                      ->paginate(9);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $this->authorize($book);
        return view('admin.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book $book)
    {
        $this->authorize($book);
        $this->validate(request(), [
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'genre' => 'required',
            'library_section' => 'required'
        ]);
        $book->title = ucwords(request('title'));
        $book->author = ucwords(request('author'));
        $book->genre = request('genre');
        $book->library_section = request('library_section');
        $book->save();
        session()->flash('success', 'Book created.');
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize($book);
        return view('admin.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'genre' => 'required',
            'library_section' => 'required'
        ]);
        $book = Book::findOrFail($id);
        $this->authorize($book);
        $book->title = ucwords(request('title'));
        $book->author = ucwords(request('author'));
        $book->genre = request('genre');
        $book->library_section = request('library_section');
        $book->save();
        session()->flash('success', 'Book updated.');
        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        session()->flash('success', 'Book successfully removed.');
        return redirect()->route('admin');
    }
}
