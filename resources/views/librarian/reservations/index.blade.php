@extends('layouts.user')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        Kelola Reservasi
    </h1>

    <table class="w-full bg-white">

        <thead>

            <tr>
                <th>User</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($reservations as $item)
                <tr>

                    <td>
                        {{ $item->user->name }}
                    </td>

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
                        <div class="flex gap-2">

                            <form method="POST" action="{{ route('librarian.reservations.approve', $item) }}">

                                @csrf
                                @method('PATCH')

                                <button class="bg-green-600 text-white px-2 py-1 rounded">

                                    Setujui

                                </button>

                            </form>

                            <form method="POST" action="{{ route('librarian.reservations.reject', $item) }}">

                                @csrf
                                @method('PATCH')

                                <button class="bg-red-600 text-white px-2 py-1 rounded">

                                    Tolak

                                </button>

                            </form>

                            <form method="POST" action="{{ route('librarian.reservations.return', $item) }}">

                                @csrf
                                @method('PATCH')

                                <button class="bg-blue-600 text-white px-2 py-1 rounded">

                                    Dikembalikan

                                </button>

                            </form>

                            <form method="POST" action="{{ route('librarian.reservations.lost', $item) }}">

                                @csrf
                                @method('PATCH')

                                <button class="bg-yellow-600 text-white px-2 py-1 rounded">

                                    Hilang

                                </button>

                            </form>

                            |

                            <form method="POST" action="{{ route('librarian.reservations.destroy', $item) }}">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-600 text-white px-2 py-1 rounded">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="mt-6">
        {{ $reservations->links() }}
    </div>
@endsection
