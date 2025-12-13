@extends('_receptionist.layouts.app')

@section('content')
    <div class="m-4">
        {{-- HEADER --}}
        <h1 class="h3 mb-2 text-gray-800">Data Ruangan</h1>
        <p class="mb-4">Daftar ruangan yang tersedia untuk reservasi.</p>

        {{-- CARD --}}
        <div class="card shadow mb-4">
            {{-- CARD HEADER --}}
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Rooms Table</h6>

                {{-- FILTER --}}
                <form method="GET" action="{{ route('receptionist.rooms.index') }}" class="d-flex align-items-center gap-2">
                    <span class="text-muted small">Filter:</span>
                    <select name="category" onchange="this.form.submit()" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Premium" {{ request('category') == 'Premium' ? 'selected' : '' }}>Premium</option>
                        <option value="VIP" {{ request('category') == 'VIP' ? 'selected' : '' }}>VIP</option>
                        <option value="Standard" {{ request('category') == 'Standard' ? 'selected' : '' }}>Standard</option>
                    </select>
                </form>
            </div>

            {{-- CARD BODY --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="custom-table" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Ruangan</th>
                                <th>Kategori</th>
                                <th>Total Console</th>
                                <th>Console Digunakan</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $index => $item)
                                @php
                                    $totalConsole = $item->consoles->count();
                                    $consoleDipakai = $item->consoles->where('status', 'Dipesan')->count();

                                    // Badge kategori
                                    $badgeClass = match ($item->category) {
                                        'Premium' => 'bg-primary',
                                        'VIP' => 'bg-danger',
                                        'Standard' => 'bg-secondary',
                                        default => 'bg-secondary',
                                    };
                                @endphp

                                <tr>
                                    <td class="text-center">{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        <span class="badge {{ $badgeClass }}">{{ $item->category ?? '—' }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info text-dark">{{ $totalConsole }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-warning text-dark">{{ $consoleDipakai }}</span>
                                    </td>
                                    <td class="text-muted">{{ Str::limit($item->description, 80) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Belum ada data ruangan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- PAGINATION --}}
                    <div class="mt-3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- NOTIFICATION --}}
        @if (session('success'))
            <script>
                showNotification("{{ session('success') }}");
            </script>
        @endif
    </div>
@endsection
