<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::with([
            'user',
            'book'
        ]);

        if ($request->filled('start_date')) {

            $query->whereDate(
                'reservation_date',
                '>=',
                $request->start_date
            );
        }

        if ($request->filled('end_date')) {

            $query->whereDate(
                'reservation_date',
                '<=',
                $request->end_date
            );
        }

        $reports = $query
            ->latest()
            ->get();

        return view(
            'reports.index',
            compact('reports')
        );
    }

    public function print(Request $request)
    {
        $query = Reservation::with([
            'user',
            'book'
        ]);

        if ($request->filled('start_date')) {

            $query->whereDate(
                'reservation_date',
                '>=',
                $request->start_date
            );
        }

        if ($request->filled('end_date')) {

            $query->whereDate(
                'reservation_date',
                '<=',
                $request->end_date
            );
        }

        $reports = $query
            ->latest()
            ->get();

        return view(
            'reports.print',
            compact('reports')
        );
    }
}
