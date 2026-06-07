@extends('layouts.user')

@section('content')
    <h1 class="text-2xl font-bold mb-6">

        Reservasi Saya

    </h1>

    <table class="w-full bg-white">

        <thead>

            <tr>

                <th>Buku</th>

                <th>Status</th>

                <th>Tanggal</th>

                <th>Jatuh Tempo</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($reservations as $item)
                <tr>

                    <td>
                        {{ $item->book->title }}
                    </td>

                    <td>
                        {{ $item->status }}
                    </td>

                    <td>
                        {{ $item->reservation_date }}
                    </td>

                    <td>
                        {{ $item->due_date }}
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="mt-6">

        {{ $reservations->links() }}

    </div>
@endsection
