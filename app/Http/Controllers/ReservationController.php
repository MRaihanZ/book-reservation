<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with([
            'book'
        ])
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest()
            ->orderBy('reservation_date', 'desc')
            ->paginate(10);

        return view(
            'user.reservations.index',
            compact('reservations')
        );
    }

    public function store(Book $book)
    {
        $isBorrowed = Reservation::where(
            'book_id',
            $book->id
        )
            ->where(
                'status',
                'disetujui'
            )
            ->exists();

        if ($isBorrowed) {
            return back()->with(
                'error',
                'Buku sedang dipinjam.'
            );
        }

        $isSameReservation = Reservation::where(
            'book_id',
            $book->id
        )
            ->where(
                'status',
                'menunggu'
            )
            ->exists();

        if ($isSameReservation) {
            return back()->with(
                'error',
                'Anda sudah memiliki reservasi untuk buku ini.'
            );
        }

        Reservation::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'status' => 'menunggu',
            'reservation_date' => now(),
            'due_date' => Carbon::now()
                ->addDays(7),
        ]);

        return back()->with(
            'success',
            'Reservasi berhasil dibuat.'
        );
    }

    // public function update(
    //     Reservation $reservation
    // ) {
    //     if (
    //         $reservation->status !== 'menunggu'
    //     ) {
    //         return back();
    //     }

    //     $alreadyBorrowed = Reservation::where(
    //         'book_id',
    //         $reservation->book_id
    //     )
    //         ->where(
    //             'status',
    //             'disetujui'
    //         )
    //         ->exists();

    //     if ($alreadyBorrowed) {

    //         return back()->with(
    //             'error',
    //             'Buku sedang dipinjam.'
    //         );
    //     }

    //     $reservation->update([
    //         'status' => 'dibatalkan'
    //     ]);

    //     return back()->with(
    //         'success',
    //         'Reservasi dibatalkan.'
    //     );
    // }

    public function destroy(
        Reservation $reservation
    ) {

        if (
            $reservation->user_id !== auth()->id()
        ) {
            abort(403);
        }

        if (
            $reservation->status !== 'menunggu'
        ) {
            abort(403);
        }

        $reservation->delete();

        return back()->with(
            'success',
            'Reservasi dibatalkan.'
        );
    }
}
