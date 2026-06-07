@extends('layouts.user')

@section('content')
    <h1 class="text-2xl font-bold mb-6">

        Tambah Admin

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
    <form method="POST" action="{{ route('super-admin.admins.store') }}" class="bg-white p-6 rounded shadow">

        @csrf

        <input type="text" name="name" placeholder="Nama" class="w-full border p-3 mb-3">

        <input type="text" name="username" placeholder="Username" class="w-full border p-3 mb-3">

        <input type="email" name="email" placeholder="Email" class="w-full border p-3 mb-3">

        <input type="password" name="password" placeholder="Password" class="w-full border p-3 mb-3">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">

            Simpan

        </button>

    </form>
@endsection
