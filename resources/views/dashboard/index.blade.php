@extends('layouts.user')

@section('content')
    <h1 class="text-2xl font-bold mb-6">

        Dashboard

    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

        <div class="bg-white p-5 rounded shadow">
            <h2>Total Buku</h2>
            <p class="text-3xl font-bold">
                {{ $totalBooks }}
            </p>
        </div>

        <div class="bg-white p-5 rounded shadow">
            <h2>Total User</h2>
            <p class="text-3xl font-bold">
                {{ $totalUsers }}
            </p>
        </div>

        <div class="bg-white p-5 rounded shadow">
            <h2>Total Librarian</h2>
            <p class="text-3xl font-bold">
                {{ $totalLibrarians }}
            </p>
        </div>

        <div class="bg-white p-5 rounded shadow">
            <h2>Menunggu</h2>
            <p class="text-3xl font-bold">
                {{ $pendingReservations }}
            </p>
        </div>

        <div class="bg-white p-5 rounded shadow">
            <h2>Dipinjam</h2>
            <p class="text-3xl font-bold">
                {{ $borrowedBooks }}
            </p>
        </div>

        <div class="bg-white p-5 rounded shadow">
            <h2>Dikembalikan</h2>
            <p class="text-3xl font-bold">
                {{ $returnedBooks }}
            </p>
        </div>

    </div>
@endsection
