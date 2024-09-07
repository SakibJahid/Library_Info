<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest('id')->get();
        return view('dashboard', ['books' => $books]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->year_published = $request->input('year_published');
        $book->save();

        return redirect('/dashboard')->with('success', 'Book added successfully!');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->year_published = $request->input('year_published');
        $book->save();

        return redirect('/dashboard')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/dashboard')->with('success', 'Book deleted successfully!');
    }
}
