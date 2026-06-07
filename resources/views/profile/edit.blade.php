@extends('layouts.user')

@section('content')
    <div class="bg-white p-6 rounded shadow w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">

            Profil

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
        <form method="POST" action="{{ route('profile.update') }}">

            @csrf
            @method('PUT')

            <label for="name" class="block mb-2 font-bold">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                class="w-full border p-3 mb-3" disabled>

            <label for="username" class="block mb-2 font-bold">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username', auth()->user()->username) }}"
                class="w-full border p-3 mb-3" disabled>

            <label for="email" class="block mb-2 font-bold">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                class="w-full border p-3 mb-3" disabled>
            <label for="password" class="block mb-2 font-bold">Password Baru</label>
            <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak diubah"
                class="w-full border p-3 mb-3" disabled>

            <button type="submit" id="submitUpdate"
                class="bg-blue-600 text-white px-4 py-2 rounded hidden w-full cursor-pointer">

                Simpan

            </button>

        </form>
        <div class="mt-4 flex justify-center gap-2">
            <button id="editProfile" onclick="EditProfile()"
                class="bg-blue-600 text-white px-4 py-2 rounded w-40 cursor-pointer">

                Ubah Profil

            </button>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                <button id="deleteAccount" class="bg-red-600 text-white px-4 py-2 rounded w-40 cursor-pointer">

                    Hapus Akun

                </button>
            </form>
        </div>
    </div>
@endsection
<script>
    function EditProfile() {
        document.getElementById('name').disabled = false;
        document.getElementById('username').disabled = false;
        document.getElementById('email').disabled = false;
        document.getElementById('password').disabled = false;
        document.getElementById('submitUpdate').style.display = 'inline-block';
        document.getElementById('deleteAccount').style.display = 'none';
        document.getElementById('editProfile').style.display = 'none';
    }
</script>
