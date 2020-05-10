<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }

    public function permissions($id)
    {
        $roles = Role::all();
        $user  = User::where('id', (int)$id)->firstOrFail();
        return view('users.permissions', compact('user', 'roles'));
    }

    public function removeRole($user_id, $role_id)
    {
        if (auth()->guard('admin')->user()->hasPermissionTo('user edit', 'admin')) {
            $user = User::where('id', (int)$user_id)->firstOrFail();
            $role = Role::where('id', (int)$role_id)->firstOrFail();
            $user->removeRole($role);
        }
        return redirect()->back();
    }

    public function addRole(Request $request, $user_id)
    {
        if (auth()->guard('admin')->user()->hasPermissionTo('user edit', 'admin')) {
            $role_id = (int)$request->role_id;
            $user    = User::where('id', (int)$user_id)->firstOrFail();
            $role    = Role::where('id', (int)$role_id)->firstOrFail();
            $user->assignRole($role);
        }

        return redirect()->back();
    }
}
