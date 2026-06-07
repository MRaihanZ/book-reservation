<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    @if (!request()->is('print'))
        <nav class="bg-white shadow">

            <div class="container mx-auto">

                <div class="flex justify-between p-4">

                    <a href="{{ route('home') }}">
                        Perpustakaan
                    </a>
                    <div class="flex gap-4">
                        @if (auth()->check())
                            @if (auth()->user()->role === 'user')
                                <a href="{{ route('home') }}">
                                    Buku
                                </a>
                                <a href="{{ route('reservations.index') }}">
                                    Reservasi Saya
                                </a>
                                <a href="{{ route('profile.edit') }}">
                                    Profil
                                </a>
                            @endif

                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'librarian')
                                <a href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>
                            @endif

                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('users.index') }}">
                                    User
                                </a>
                            @endif

                            @if (auth()->user()->role === 'super_admin')
                                <a href="{{ route('super-admin.admins.index') }}">
                                    Admin
                                </a>
                            @endif

                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'librarian')
                                <a href="{{ route('librarian.reservations.index') }}">
                                    Reservasi
                                </a>
                            @endif

                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'librarian')
                                <a href="{{ route('books.index') }}">
                                    Buku
                                </a>
                            @endif

                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'librarian')
                                <a href="{{ route('histories.index') }}">
                                    History
                                </a>
                            @endif

                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'librarian')
                                <a href="{{ route('reports.index') }}">
                                    Report
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button>
                                    Logout
                                </button>

                            </form>
                        @endif
                        @if (!request()->is('login') && !request()->is('register'))
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                            |
                            <a href="{{ route('register') }}">
                                Register
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    @endif
    <div class="container mx-auto p-6">

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>

</html>
