<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with([
            'activeReservation'
        ])
            ->latest()
            ->paginate(10);

        return view(
            'user.home',
            compact('books')
        );
    }

    // public function index(Request $request)
    // {
    //     $books = Book::with([
    //         'activeReservation'
    //     ]);

    //     if ($request->filled('search')) {

    //         $books->where(function ($query) use ($request) {

    //             $query->where(
    //                 'title',
    //                 'like',
    //                 "%{$request->search}%"
    //             )
    //                 ->orWhere(
    //                     'author',
    //                     'like',
    //                     "%{$request->search}%"
    //                 );
    //         });
    //     }

    //     $books = $books
    //         ->latest()
    //         ->paginate(10)
    //         ->withQueryString();

    //     return view(
    //         'user.home',
    //         compact('books')
    //     );
    // }
}
