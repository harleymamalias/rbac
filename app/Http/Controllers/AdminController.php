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


    public function assignPermissions(Request $request, User $user)
    {
        $user->permissions()->sync($request->permissions);
        return redirect()->back()->with('success', 'Permissions updated successfully');
    }

    public function assignRoles(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->back()->with('success', 'Roles updated successfully');
    }
}
