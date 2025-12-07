<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Tampilkan daftar customer (role = 3)
    public function index()
    {
        $user = User::where('role', 3)->get();
        return view('_admin.customer', compact('user'));
    }

    // Halaman form tambah customer
    public function create()
    {
        return view('customers.create');
    }

    // Simpan customer baru
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
            'role'          => 3, // customer
        ]);

        return redirect()->back()->with('success', 'Akun berhasil dibuat!');
    }

    // Detail customer
    public function show($id)
    {
        $customer = User::where('role', 3)->findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    // Halaman edit customer
    public function edit($id)
    {
        $customer = User::where('role', 3)->findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // Update customer
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username,' . $id,
            'email'         => 'required|string|email|max:255|unique:users,email,' . $id,
            'no_hp'         => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'role'          => 'required|integer|in:1,2,3',
            'password'      => 'nullable|string|min:8|confirmed',
        ]);

        $user->name          = $request->name;
        $user->username      = $request->username;
        $user->email         = $request->email;
        $user->no_hp         = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Akun pengguna berhasil diperbarui!');
    }

    // Hapus customer
    public function destroy($id)
    {
        $user = User::where('role', 3)->findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun Customer berhasil dihapus');
    }
}
