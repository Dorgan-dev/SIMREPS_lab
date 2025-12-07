@extends('layout')

@section('content')
<h2>Detail Customer</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $customer->cust_id }}</li>
    <li class="list-group-item"><strong>Nama:</strong> {{ $customer->nama }}</li>
    <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $customer->jenis_kelamin }}</li>
    <li class="list-group-item"><strong>No HP:</strong> {{ $customer->no_hp }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
</ul>

<a href="{{ route('admin.customers.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
