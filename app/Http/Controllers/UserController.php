<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::with('roles')->get();
        return inertia('User/Index', ['users' => $users]);
    }

    public function create()
    {
        return inertia('User/Create', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ]);
    }
    // Create a user
    public function store(Request $request)
    {
        $data = $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'suffix' => 'nullable|string',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users',
            'contact_no' => 'required',
            'password' => 'required|string',
            'role' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']); // Hash the password

        unset($data['role']);

        $role = $request->role;

        $user = User::create($data);

        $user->assignRole($role);

        return redirect()->route('user.index');
    }
}
