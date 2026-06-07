<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        // dd($request->all());
        // logger($request->all());
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Username atau password salah.'
                );
        }

        $request->session()->regenerate();

        $user = Auth::user();

        return match ($user->role) {

            'super_admin'
            => redirect()->route(
                'super-admin.admins.index'
            ),

            'admin'
            => redirect()->route('dashboard'),

            'librarian'
            => redirect()->route('dashboard'),

            default
            => redirect()->route(
                'home'
            ),
        };
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
