@extends('layouts.user')

@section('content')
    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">
            Kelola User
        </h1>

        <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">

            Tambah User

        </a>

    </div>

    <table class="w-full bg-white">

        <thead>

            <tr>

                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($users as $user)
                <tr>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->username }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->role }}
                    </td>

                    <td>

                        <div class="flex gap-2">

                            <a href="{{ route('users.edit', $user) }}"
                                class="text-blue-600">

                                Edit

                            </a>

                            <form method="POST"
                                action="{{ route('users.destroy', $user) }}">

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

        {{ $users->links() }}

    </div>
@endsection
