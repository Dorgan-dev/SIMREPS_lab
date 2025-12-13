@extends('_receptionist.layouts.app')

@section('content')
    <div class="m-4">
        {{-- HEADER --}}
        <h1 class="h3 mb-2 text-gray-800">Data Console PlayStation</h1>
        <p class="mb-4">Daftar unit konsol yang tersedia untuk reservasi.</p>

        {{-- CARD --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Console Table</h6>

                {{-- Filter Kategori --}}
                <form method="GET" action="{{ route('receptionist.consoles.index') }}"
                    class="d-flex align-items-center gap-2">
                    <select name="kategori" onchange="this.form.submit()" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="PS 3" {{ request('kategori') == 'PS 3' ? 'selected' : '' }}>PS 3</option>
                        <option value="PS 4" {{ request('kategori') == 'PS 4' ? 'selected' : '' }}>PS 4</option>
                        <option value="PS 5" {{ request('kategori') == 'PS 5' ? 'selected' : '' }}>PS 5</option>
                    </select>
                </form>
            </div>

            {{-- TABLE --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="custom-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Console ID</th>
                                <th>Nama Konsol</th>
                                <th>Serial Number</th>
                                <th>Kategori</th>
                                <th>Harga/Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $i => $item)
                                <tr>
                                    <td>{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
                                    <td>{{ optional($item->room)->name ?? '—' }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_unit }}</td>
                                    <td>{{ $item->nomor_unit }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>Rp {{ number_format($item->harga_per_jam, 0, ',', '.') }}</td>

                                    {{-- Badge Status --}}
                                    <td>
                                        <span
                                            class="badge
                                            @if ($item->status == 'Tersedia') bg-success
                                            @elseif ($item->status == 'Dipesan') bg-warning
                                            @elseif ($item->status == 'Perbaikan') bg-danger
                                            @else bg-secondary @endif">
                                            {{ $item->status }}
                                        </span>
                                    </td>

                                    {{-- Action --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#statusModal{{ $item->id }}">
                                            Update Status
                                        </button>
                                    </td>
                                </tr>

                                {{-- MODAL UPDATE STATUS --}}
                                <div class="modal fade" id="statusModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('receptionist.consoles.update', $item->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning text-white">
                                                    <h5 class="modal-title">Update Status Console</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="status_{{ $item->id }}"
                                                            class="form-label">Status</label>
                                                        <select id="status_{{ $item->id }}" name="status"
                                                            class="form-select" required>
                                                            <option value="Tersedia"
                                                                {{ $item->status == 'Tersedia' ? 'selected' : '' }}>
                                                                Tersedia</option>
                                                            <option value="Dipesan"
                                                                {{ $item->status == 'Dipesan' ? 'selected' : '' }}>Sedang
                                                                Dipesan</option>
                                                            <option value="Perbaikan"
                                                                {{ $item->status == 'Perbaikan' ? 'selected' : '' }}>
                                                                Perbaikan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted">Belum ada data console.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Notification --}}
        @if (session('success'))
            <script>
                showNotification("{{ session('success') }}");
            </script>
        @endif
    </div>
@endsection
