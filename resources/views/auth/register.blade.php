@extends('layouts.user')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">

        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow">

            <h1 class="text-2xl font-bold mb-6 text-center">
                Login
            </h1>

            @if (session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700">
                    {{ session('success') }}
                </div>
            @endif
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
            <form method="POST">

                @csrf

                <label for="name" class="block mb-2 font-bold">Name</label>
                <input type="text" name="name" placeholder="Nama" class="w-full border p-3 mb-3">

                <label for="username" class="block mb-2 font-bold">Username</label>
                <input type="text" name="username" placeholder="Username" class="w-full border p-3 mb-3">

                <label for="email" class="block mb-2 font-bold">Email</label>
                <input type="email" name="email" placeholder="Email" class="w-full border p-3 mb-3">

                <label for="password" class="block mb-2 font-bold">Password</label>
                <input type="password" name="password" placeholder="Password" class="w-full border p-3 mb-3">

                <label for="password_confirmation" class="block mb-2 font-bold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                    class="w-full border p-3 mb-3">

                <button class="w-full bg-blue-600 text-white p-3">

                    Register

                </button>

            </form>
            <div class="text-center mt-4">

                <a href="{{ route('login') }}" class="text-blue-600">

                    login

                </a>

            </div>

        </div>

    </div>
@endsection
