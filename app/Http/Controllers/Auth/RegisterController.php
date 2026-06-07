<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make(
                $request->password
            ),
            'role' => 'user',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Registrasi berhasil.'
            );
    }
}
