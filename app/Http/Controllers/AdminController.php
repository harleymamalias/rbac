<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        $users = User::with(['roles', 'permissions'])->select('id', 'name', 'email')->get();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers', compact('users', 'roles', 'permissions'));
    }

    public function assignRoles(Request $request)
    {
        $users = User::with('roles')->get();
        foreach ($request->roles as $userId => $roleIds) {
            $user = User::find($userId);
            $user->roles()->sync($roleIds);

            $permissions = Role::whereIn('id', $roleIds)->with('permissions')->get()->pluck('permissions')->flatten()->unique();
            $user->permissions()->sync($permissions->pluck('id'));
        }

        return redirect()->back()->with('success', 'Roles and Permissions updated successfully');
    }
}
