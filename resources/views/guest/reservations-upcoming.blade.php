@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h3 class="fw-bold mb-4 text-center">Reservasi Mendatang</h3>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Konsol</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Durasi</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($reservations as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->console->nama_unit ?? '-' }}</td>
                    <td>{{ $item->console->room->name ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}</td>
                    <td>{{ $item->durasi_jam }} Jam</td>
                    <td>
                        <span class="badge bg-info">
                            {{ $item->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-muted">Belum ada reservasi mendatang</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
