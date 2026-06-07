@extends('layouts.user')

@section('content')
    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">
            Data Buku
        </h1>

        <a href="{{ route('books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">

            Tambah Buku

        </a>

    </div>

    <table class="w-full bg-white">

        <thead>

            <tr>

                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($books as $book)
                <tr>

                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->publish_year }}</td>

                    <td>

                        <div class="flex gap-2">

                            <a href="{{ route('books.edit', $book) }}" class="text-blue-600">

                                Edit

                            </a>

                            <form method="POST" action="{{ route('books.destroy', $book) }}">

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600">

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
        {{ $books->links() }}
    </div>
@endsection
