@extends('layouts.user')

@section('content')
    <h1 class="text-2xl font-bold mb-6">

        History Peminjaman

    </h1>

    <table class="w-full bg-white">

        <thead>

            <tr>
                <th>User</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($histories as $history)
                <tr>

                    <td>
                        {{ $history->user->name }}
                    </td>

                    <td>
                        {{ $history->book->title }}
                    </td>

                    <td>
                        {{ $history->status }}
                    </td>

                    <td>
                        {{ $history->reservation_date }}
                    </td>

                    <td>
                        {{ $history->returned_at }}
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    {{ $histories->links() }}
@endsection
