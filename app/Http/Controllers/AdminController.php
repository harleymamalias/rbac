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
    public function storeRole(Request $request)
    {
        $request->validate([
            'roleName' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::create(['name' => $request->roleName]);
        $role->permissions()->attach($request->permissions);

        return redirect()->back()->with('success', 'New role added successfully');
    }
    public function deleteRole(Request $request)
    {
        $request->validate([
            'roleId' => 'required|exists:roles,id',
        ]);

        $role = Role::find($request->roleId);
        $role->permissions()->detach();
        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully');
    }

}
