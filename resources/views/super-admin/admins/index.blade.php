@extends('layouts.user')

@section('content')
    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">

            Kelola Admin

        </h1>

        <a href="{{ route('super-admin.admins.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">

            Tambah Admin

        </a>

    </div>

    <table class="w-full bg-white">

        <thead>

            <tr>

                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($admins as $admin)
                <tr>

                    <td>
                        {{ $admin->name }}
                    </td>

                    <td>
                        {{ $admin->username }}
                    </td>

                    <td>
                        {{ $admin->email }}
                    </td>

                    <td>

                        <div class="flex gap-2">

                            <a href="{{ route('super-admin.admins.edit', $admin) }}" class="text-blue-600">

                                Edit

                            </a>

                            <form method="POST" action="{{ route('super-admin.admins.destroy', $admin) }}"
                                class="text-red-600">

                                @csrf
                                @method('DELETE')

                                <button>
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    {{ $admins->links() }}
@endsection
