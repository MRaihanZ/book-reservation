<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = Reservation::with([
            'user',
            'book'
        ])->latest()
            ->paginate(15);

        return view(
            'histories.index',
            compact('histories')
        );
    }
}
