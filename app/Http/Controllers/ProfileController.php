<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view(
            'profile.edit'
        );
    }

    public function update(
        ProfileRequest $request
    ) {

        $user = auth()->user();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ];

        if (
            $request->filled(
                'password'
            )
        ) {

            $data['password']
                = Hash::make(
                    $request->password
                );
        }

        $user->update($data);

        return back()
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }

    public function destroy()
    {
        $user = auth()->user();

        Auth::logout();

        $user->delete();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Akun berhasil dihapus.'
            );
    }
}
