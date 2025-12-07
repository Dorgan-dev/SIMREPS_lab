@extends('layout')

@section('content')
<h2>Data Customers</h2>

<a href="{{ route('admin.customers.create') }}" class="btn btn-primary mb-3">Tambah Customer</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $c)
        <tr>
            <td>{{ $c->cust_id }}</td>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->jenis_kelamin }}</td>
            <td>{{ $c->no_hp }}</td>
            <td>{{ $c->email }}</td>
            <td>
                <a href="{{ route('admin.customers.edit', $c->cust_id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('admin.customers.show', $c->cust_id) }}" class="btn btn-info btn-sm">Detail</a>

                <form action="{{ route('admin.customers.destroy', $c->cust_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
