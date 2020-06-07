<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return inertia()->render('Dashboard/users/index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/users/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index');

    }

    public function edit(User $user)
    {
        return inertia()->render('Dashboard/users/edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,' . $user->id,
            'password' => 'sometimes|min:8|confirmed'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
