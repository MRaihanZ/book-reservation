@extends('layouts.user')

@section('content')
    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">

            Report Peminjaman

        </h1>

        <button
            onclick="window.open('/print?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}', '_blank')"
            class="bg-blue-600 text-white px-4 py-2 rounded">

            Print PDF

        </button>

    </div>

    <form method="GET" class="bg-white p-4 rounded shadow mb-6">

        <div class="grid grid-cols-2 gap-4">

            <input type="date" name="start_date" value="{{ request('start_date') }}" class="border p-3">

            <input type="date" name="end_date" value="{{ request('end_date') }}" class="border p-3">

        </div>

        <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">

            Filter

        </button>

    </form>

    <table class="w-full bg-white">

        <thead>

            <tr>

                <th>User</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($reports as $report)
                <tr>

                    <td>
                        {{ $report->user->name }}
                    </td>

                    <td>
                        {{ $report->book->title }}
                    </td>

                    <td>
                        {{ $report->status }}
                    </td>

                    <td>
                        {{ $report->reservation_date }}
                    </td>

                    <td>
                        {{ $report->returned_at }}
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
<script>
    document.getElementById("printButton").onclick = function() {
        window.open("/print", "_blank");
    };
</script>
