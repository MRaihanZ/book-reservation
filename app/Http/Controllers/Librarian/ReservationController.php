<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Reservation;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with([
            'user',
            'book'
        ])
            ->latest()
            ->paginate(15);

        return view(
            'librarian.reservations.index',
            compact('reservations')
        );
    }

    public function approve(
        Reservation $reservation
    ) {

        // if (
        //     $reservation->status !== 'menunggu'
        // ) {
        //     return back();
        // }

        $alreadyBorrowed = Reservation::where(
            'book_id',
            $reservation->book_id
        )
            ->where(
                'status',
                'disetujui'
            )
            ->exists();

        if ($alreadyBorrowed) {

            return back()->with(
                'error',
                'Buku sedang dipinjam.'
            );
        }

        $reservation->update([
            'status' => 'disetujui',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return back()->with(
            'success',
            'Reservasi disetujui.'
        );
    }

    public function reject(
        Reservation $reservation
    ) {

        // if (
        //     $reservation->status !== 'menunggu'
        // ) {
        //     return back();
        // }

        $reservation->update([
            'status' => 'ditolak',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return back()->with(
            'success',
            'Reservasi ditolak.'
        );
    }

    public function returnBook(
        Reservation $reservation
    ) {

        // if (
        //     $reservation->status !== 'disetujui'
        // ) {
        //     return back();
        // }

        $reservation->update([
            'status' => 'dikembalikan',
            'returned_at' => now(),
        ]);

        return back()->with(
            'success',
            'Buku dikembalikan.'
        );
    }

    public function lostBook(
        Reservation $reservation
    ) {

        // if (
        //     $reservation->status !== 'disetujui'
        // ) {
        //     return back();
        // }

        $reservation->update([
            'status' => 'hilang',
        ]);

        return back()->with(
            'success',
            'Buku ditandai hilang.'
        );
    }

    public function destroy(
        Reservation $reservation
    ) {
        $reservation->delete();

        return back()->with(
            'success',
            'Reservasi dibatalkan.'
        );
    }
}
