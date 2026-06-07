<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotIn(
            'role',
            [
                'admin',
                'super_admin'
            ]
        )
            ->latest()
            ->paginate(10);

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function create()
    {
        return view(
            'admin.users.create'
        );
    }

    public function store(
        UserRequest $request
    ) {

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make(
                $request->password
            ),
        ]);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil ditambahkan.'
            );
    }

    public function edit(User $user)
    {
        if (
            in_array(
                $user->role,
                ['admin', 'super_admin']
            )
        ) {
            abort(403);
        }

        return view(
            'admin.users.edit',
            compact('user')
        );
    }

    public function update(
        UserRequest $request,
        User $user
    ) {

        if (
            in_array(
                $user->role,
                ['admin', 'super_admin']
            )
        ) {
            abort(403);
        }

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {

            $data['password'] = Hash::make(
                $request->password
            );
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil diperbarui.'
            );
    }

    public function destroy(User $user)
    {
        if (
            in_array(
                $user->role,
                ['admin', 'super_admin']
            )
        ) {
            abort(403);
        }

        $user->delete();

        return back()
            ->with(
                'success',
                'User berhasil dihapus.'
            );
    }
}
