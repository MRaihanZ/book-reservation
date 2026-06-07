@extends('layouts.user')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        Tambah User
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
    <form method="POST" action="{{ route('users.update', $user) }}">

        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nama"
            class="w-full border p-3 mb-3">

        <input type="text" name="username" value="{{ old('username', $user->username) }}" placeholder="Username"
            class="w-full border p-3 mb-3">

        <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email"
            class="w-full border p-3 mb-3">

        <select name="role" class="w-full border p-3 mb-3">

            <option value="user" @selected(old('role', $user->role) === 'user')>
                User
            </option>

            <option value="librarian" @selected(old('role', $user->role) === 'librarian')>
                Librarian
            </option>

        </select>

        <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="w-full border p-3 mb-3">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">

            Simpan

        </button>

    </form>
@endsection
