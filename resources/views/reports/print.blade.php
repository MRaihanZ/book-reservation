@extends('layouts.user')

@section('content')
    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">

            Report Peminjaman

        </h1>
    </div>

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
    window.onload = () => window.print();
    window.onafterprint = () => window.close();
    window.onaftercancle = () => window.close();
</script>
