<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Tampilkan halaman dashboard dengan tabel users
    public function index()
    {
        $users = User::all(); // Ambil semua user dari DB
        return view('dashboard', compact('users'));
    }

    // Tampilkan form create user
    public function create()
    {
        return view('dashboard.users.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }

    // Tampilkan form edit user
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'role' => 'required|string|max:50'
        ]);

        $user->update($request->only('name','email','role'));

        return redirect()->route('dashboard')->with('success', 'User updated successfully.');
    }

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }
}
