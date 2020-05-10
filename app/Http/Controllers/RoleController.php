<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.list', compact('roles'));
    }

    public function new()
    {
        return view('role.new');
    }

    public function add(Request $request)
    {
        Role::create(['name' => $request->name]);
        return redirect()->route('role.list');
    }

    public function edit($id)
    {
        $role = Role::where('id', (int)$id)->firstOrFail();
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::where('id', (int)$id)->firstOrFail();
        $role->name = $request->name;
        $role->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $role = Role::where('id', (int)$id)->delete();
        return redirect()->back();
    }

    public function permissions($id)
    {
        $role = Role::with('permissions')->where('id', (int)$id)->firstOrFail();
        $permissions = Permission::select('id', 'name')->get();
        return view('role.permissions', compact('role', 'permissions'));
    }

    public function permissionAdd(Request $request, $role_id)
    {
        $role = Role::where('id', (int)$role_id)->first();
        $permission = Permission::where('id', (int)$request->permission_id)->first();
        if ($role->hasPermissionTo($permission)) {
            return redirect()->back();
        }
        $role->givePermissionTo($permission);
        return redirect()->back();
    }

    public function permissionDelete($role_id, $permission_id)
    {
        $role = Role::where('id', (int)$role_id)->first();
        $permission = Permission::where('id', (int)$permission_id)->first();
        $role->revokePermissionTo($permission);
        return redirect()->back();
    }
}
