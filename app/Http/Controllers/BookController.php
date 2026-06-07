<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()
            ->paginate(10);

        return view(
            'books.index',
            compact('books')
        );
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(
        BookRequest $request
    ) {

        Book::create(
            $request->validated()
        );

        return redirect()
            ->route('books.index')
            ->with(
                'success',
                'Buku berhasil ditambahkan.'
            );
    }

    public function edit(Book $book)
    {
        return view(
            'books.edit',
            compact('book')
        );
    }

    public function update(
        BookRequest $request,
        Book $book
    ) {

        $book->update(
            $request->validated()
        );

        return redirect()
            ->route('books.index')
            ->with(
                'success',
                'Buku berhasil diperbarui.'
            );
    }

    public function destroy(Book $book)
    {
        $activeReservation = $book
            ->reservations()
            ->where(
                'status',
                'disetujui'
            )
            ->exists();

        if ($activeReservation) {

            return back()->with(
                'error',
                'Buku sedang dipinjam.'
            );
        }

        $book->delete();

        return back()->with(
            'success',
            'Buku berhasil dihapus.'
        );
    }
}
