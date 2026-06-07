@extends('layouts.user')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        Tambah Buku
    </h1>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4">

            <ul>

                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach

            </ul>

        </div>
    @endif
    <form method="POST" action="{{ route('books.update', $book) }}">

        @csrf
        @method('PUT')

        <label for="title" class="block mb-2 font-bold">Judul</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" placeholder="Judul"
            class="w-full border p-3 mb-3">

        <label for="author" class="block mb-2 font-bold">Penulis</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" placeholder="Penulis"
            class="w-full border p-3 mb-3">

        <label for="publisher" class="block mb-2 font-bold">Penerbit</label>
        <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" placeholder="Penerbit"
            class="w-full border p-3 mb-3">

        <label for="category" class="block mb-2 font-bold">Kategori</label>
        <input type="text" name="category" value="{{ old('category', $book->category) }}" placeholder="Kategori"
            class="w-full border p-3 mb-3">

        <label for="publish_year" class="block mb-2 font-bold">Tahun Terbit</label>
        <input type="number" name="publish_year" value="{{ old('publish_year', $book->publish_year) }}" placeholder="Tahun"
            class="w-full border p-3 mb-3">

        <label for="description" class="block mb-2 font-bold">Deskripsi</label>
        <textarea name="description" class="w-full border p-3 mb-3">{{ old('description', $book->description) }}</textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">

            Simpan

        </button>

    </form>
@endsection
