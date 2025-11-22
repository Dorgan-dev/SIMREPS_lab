<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('_customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:customers,email',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil ditambahkan');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.tables-basic');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username,' . $id . ',id',
            'email'         => 'required|string|email|max:255|unique:users,email,' . $id . ',id',
            'no_hp'         => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password'      => 'nullable|string|min:8|confirmed',
        ]);


        // Update data
        $user->name          = $request->name;
        $user->username      = $request->username;
        $user->email         = $request->email;
        $user->no_hp         = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;

        // Jika password diisi → hash baru
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diperbarui!');
    }


    // app/Http/Controllers/CustomerController.php

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('admin.customer')->with('error', 'Akun tidak ditemukan.');
        }

        return redirect()->route('admin.customer')->with('success', 'Akun Customer berhasil dihapus');
    }
}
