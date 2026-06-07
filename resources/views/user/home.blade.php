@extends('layouts.user')

@section('content')
    {{-- <form method="GET" class="mb-6">

        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari buku..."
            class="border p-3 rounded w-full">

    </form> --}}
    <h1 class="text-2xl font-bold mb-6">

        Daftar Buku

    </h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">

        @foreach ($books as $book)
            <div class="bg-white p-4 rounded shadow">

                <h2 class="font-bold text-lg">
                    {{ $book->title }}
                </h2>

                <p>
                    {{ $book->author }}
                </p>

                <div class="mt-4">

                    @if ($book->activeReservation)
                        <span class="text-red-600">
                            Sedang Dipinjam
                        </span>
                    @else
                        <form method="POST" action="{{ route('reservations.store', $book) }}">

                            @csrf

                            <button class="bg-blue-600 text-white px-4 py-2 rounded">

                                Reservasi

                            </button>

                        </form>
                    @endif

                </div>

            </div>
        @endforeach

    </div>

    <div class="mt-6">

        {{ $books->links() }}

    </div>
@endsection
