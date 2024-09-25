<?php

// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::paginate(10);

        if ($request->has('search')) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%')
                ->paginate(10);
        }

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        $comments = $book->comments()->latest()->get();

        return view('books.show', compact('book', 'comments'));

    }
}