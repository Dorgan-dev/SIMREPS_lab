<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 3)->get();
        return view('_admin.user', compact('user'));
    }

    public function staff()
    {
        $user = User::where('role', '!=', 3)->get();
        return view('_admin.user', compact('user'));
    }


    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username',
            'email'         => 'required|string|email|max:255|unique:users,email',
            'no_hp'         => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password'      => Hash::make($request->password),
            'role'          => 3,
        ]);

        return redirect()->back()->with('success', 'Akun berhasil dibuat!');
    }

    public function show($id)
    {
        $customer = User::where('role', 3)->findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = User::where('role', 3)->findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name'          => 'required|string|max:255',
            'no_hp'         => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'role'          => 'required|integer|in:1,2,3',
            'password'      => 'nullable|string|min:8|confirmed',
        ];

        if ($request->username !== $user->username) {
            $rules['username'] = 'required|string|max:255|unique:users,username';
        }

        if ($request->email !== $user->email) {
            $rules['email'] = 'required|string|email|max:255|unique:users,email';
        }

        $request->validate($rules);

        $user->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role'          => $request->role,
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->back()->with('success', 'Akun pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::where('role', 3)->findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun Customer berhasil dihapus');
    }
}
