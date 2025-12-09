@extends('guest.layouts.app')

@section('content')
    <div class="container py-5">

        <h3 class="fw-bold mb-4 text-center">Jadwal Reservasi Hari Ini</h3>

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Konsol</th>
                    <th>Ruangan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
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
                        <td>{{ $item->waktu_mulai }}</td>
                        <td>{{ $item->waktu_selesai }}</td>
                        <td>{{ $item->durasi_jam }} Jam</td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                {{ $item->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted">Tidak ada reservasi hari ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
