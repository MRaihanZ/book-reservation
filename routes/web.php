<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\Librarian\ReservationController as LibrarianReservationController;

use App\Http\Controllers\BookController;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\SuperAdmin\AdminController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HistoryController;

use App\Http\Controllers\ReportController;

use App\Http\Controllers\ProfileController;

Route::middleware('guest')->group(function () {

    Route::get(
        '/login',
        [LoginController::class, 'create']
    )->name('login');

    Route::post(
        '/login',
        [LoginController::class, 'store']
    );

    Route::get(
        '/register',
        [RegisterController::class, 'create']
    )->name('register');

    Route::post(
        '/register',
        [RegisterController::class, 'store']
    );
});

Route::middleware('auth')->group(function () {

    Route::post(
        '/logout',
        [LoginController::class, 'destroy']
    )->name('logout');
});

Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');

Route::middleware([
    'auth',
    'role:user'
])->group(function () {
    Route::post(
        '/reservations/{book}',
        [ReservationController::class, 'store']
    )->name('reservations.store');

    Route::get(
        '/my-reservations',
        [ReservationController::class, 'index']
    )->name('reservations.index');

    // Route::patch(
    //     '/reservations/{reservation}',
    //     [ReservationController::class, 'update']
    // )->name('reservations.update');

    Route::delete(
        '/reservations/{reservation}',
        [ReservationController::class, 'destroy']
    )->name('reservations.destroy');

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::put(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});

Route::middleware([
    'auth',
    'role:librarian,admin'
])->prefix('librarian')
    ->name('librarian.')
    ->group(function () {

        Route::get(
            '/reservations',
            [LibrarianReservationController::class, 'index']
        )->name('reservations.index');

        Route::patch(
            '/reservations/{reservation}/approve',
            [LibrarianReservationController::class, 'approve']
        )->name('reservations.approve');

        Route::patch(
            '/reservations/{reservation}/reject',
            [LibrarianReservationController::class, 'reject']
        )->name('reservations.reject');

        Route::patch(
            '/reservations/{reservation}/return',
            [LibrarianReservationController::class, 'returnBook']
        )->name('reservations.return');

        Route::patch(
            '/reservations/{reservation}/lost',
            [LibrarianReservationController::class, 'lostBook']
        )->name('reservations.lost');

        Route::delete(
            '/reservations/{reservation}',
            [LibrarianReservationController::class, 'destroy']
        )->name('reservations.destroy');
    });

Route::middleware([
    'auth',
    'role:admin,librarian'
])->group(function () {

    Route::resource(
        'books',
        BookController::class
    )->except([
        'show'
    ]);
});

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {

    Route::resource(
        'users',
        UserController::class
    )->except([
        'show'
    ]);
});

Route::middleware([
    'auth',
    'role:super_admin'
])
    ->prefix('super-admin')
    ->name('super-admin.')
    ->group(function () {

        Route::resource(
            'admins',
            AdminController::class
        )->except([
            'show'
        ]);
    });

Route::middleware([
    'auth',
    'role:admin,librarian'
])->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');
});

Route::middleware([
    'auth',
    'role:admin,librarian'
])->group(function () {

    Route::get(
        '/histories',
        [HistoryController::class, 'index']
    )->name('histories.index');
});

Route::middleware([
    'auth',
    'role:admin,librarian'
])->group(function () {

    Route::get(
        '/reports',
        [ReportController::class, 'index']
    )->name('reports.index');

    Route::get(
        '/print',
        [ReportController::class, 'print']
    )->name('reports.print');
});
