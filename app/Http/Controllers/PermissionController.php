<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::select('id', 'name')->get();
        return view('permission.list', compact('permissions'));
    }

    public function new()
    {
        return view('permission.new');
    }

    public function add(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return redirect()->route('permission.list');
    }

    public function edit($id)
    {
        $permission = Permission::where('id', (int)$id)->firstOrFail();
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::where('id', (int)$id)->firstOrFail();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $permission = Permission::where('id', (int)$id)->delete();
        return redirect()->back();
    }
}
