<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where(
            'role',
            'admin'
        )
            ->latest()
            ->paginate(10);

        return view(
            'super-admin.admins.index',
            compact('admins')
        );
    }

    public function create()
    {
        return view(
            'super-admin.admins.create'
        );
    }

    public function store(
        AdminRequest $request
    ) {

        User::create([

            'name' => $request->name,

            'username' => $request->username,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'admin',

        ]);

        return redirect()
            ->route(
                'super-admin.admins.index'
            )
            ->with(
                'success',
                'Admin berhasil ditambahkan.'
            );
    }

    public function edit(User $admin)
    {
        if (
            $admin->role !== 'admin'
        ) {
            abort(403);
        }

        return view(
            'super-admin.admins.edit',
            compact('admin')
        );
    }

    public function update(
        AdminRequest $request,
        User $admin
    ) {

        if (
            $admin->role !== 'admin'
        ) {
            abort(403);
        }

        $data = [

            'name' => $request->name,

            'username' => $request->username,

            'email' => $request->email,

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

        $admin->update($data);

        return redirect()
            ->route(
                'super-admin.admins.index'
            )
            ->with(
                'success',
                'Admin berhasil diperbarui.'
            );
    }

    public function destroy(
        User $admin
    ) {

        if (
            $admin->role !== 'admin'
        ) {
            abort(403);
        }

        $admin->delete();

        return back()
            ->with(
                'success',
                'Admin berhasil dihapus.'
            );
    }
}
