<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();

        $totalUsers = User::where(
            'role',
            'user'
        )->count();

        $totalLibrarians = User::where(
            'role',
            'librarian'
        )->count();

        $pendingReservations = Reservation::where(
            'status',
            'menunggu'
        )->count();

        $borrowedBooks = Reservation::where(
            'status',
            'disetujui'
        )->count();

        $returnedBooks = Reservation::where(
            'status',
            'dikembalikan'
        )->count();

        return view(
            'dashboard.index',
            compact(
                'totalBooks',
                'totalUsers',
                'totalLibrarians',
                'pendingReservations',
                'borrowedBooks',
                'returnedBooks'
            )
        );
    }
}
