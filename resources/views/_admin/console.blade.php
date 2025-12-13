@extends('_admin.layouts.app')

@section('content')
    <div class="m-4">
        <h1 class="h3 mb-2 text-gray-800">Data Console PlayStation</h1>
        <p class="mb-4">Daftar unit konsol yang tersedia untuk reservasi.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Console Table</h6>

                    <div class="d-flex align-items-center gap-2">
                        <form method="GET" action="{{ route('admin.consoles.index') }}">
                            <select name="kategori" onchange="this.form.submit()" class="form-select">
                                <option value="">Semua Kategori</option>
                                <option value="PS 3" {{ request('kategori') == 'PS 3' ? 'selected' : '' }}>PS 3</option>
                                <option value="PS 4" {{ request('kategori') == 'PS 4' ? 'selected' : '' }}>PS 4</option>
                                <option value="PS 5" {{ request('kategori') == 'PS 5' ? 'selected' : '' }}>PS 5</option>
                            </select>
                        </form>

                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">
                            Tambah Console
                        </button>
                    </div>
                </div>
            </div>

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
                                            @if ($item->status == 'Tersedia') bg-success text-white
                                            @elseif ($item->status == 'Dipesan') bg-warning text-dark
                                            @elseif ($item->status == 'Perbaikan') bg-danger text-white
                                            @else bg-secondary text-white @endif">
                                            {{ $item->status }}
                                        </span>
                                    </td>

                                    {{-- Action --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal Edit Console --}}
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.consoles.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title">Edit Console</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="room_id" class="form-label">Ruangan</label>
                                                        <select name="room_id" class="form-select" required>
                                                            <option value="">Pilih Ruangan</option>
                                                            @foreach ($rooms as $room)
                                                                <option value="{{ $room->id }}"
                                                                    {{ $item->room_id == $room->id ? 'selected' : '' }}>
                                                                    {{ $room->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_unit" class="form-label">Nama Konsol</label>
                                                        <input type="text" class="form-control" name="nama_unit"
                                                            value="{{ $item->nama_unit }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nomor_unit" class="form-label">Serial Number</label>
                                                        <input type="text" class="form-control" name="nomor_unit"
                                                            value="{{ $item->nomor_unit }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kategori" class="form-label">Kategori</label>
                                                        <select name="kategori" class="form-select">
                                                            <option value="PS 3"
                                                                {{ $item->kategori == 'PS 3' ? 'selected' : '' }}>PS3
                                                            </option>
                                                            <option value="PS 4"
                                                                {{ $item->kategori == 'PS 4' ? 'selected' : '' }}>PS4
                                                            </option>
                                                            <option value="PS 5"
                                                                {{ $item->kategori == 'PS 5' ? 'selected' : '' }}>PS5
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harga_per_jam" class="form-label">Harga per Jam</label>
                                                        <input type="number" class="form-control" name="harga_per_jam"
                                                            value="{{ $item->harga_per_jam }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select name="status" class="form-select">
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
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                {{-- Modal Delete Console --}}
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.consoles.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Hapus Console</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin ingin menghapus console <b>{{ $item->nama_unit }}</b>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Tambah Console --}}
        <div class="modal fade" id="tambahModal" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.consoles.store') }}" method="POST">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Tambah Console</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-2">
                                <label>Ruangan</label>
                                <select name="room_id" class="form-select" required>
                                    <option value="">Pilih Ruangan</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label>Nama Konsol</label>
                                <input type="text" class="form-control" name="nama_unit" required>
                            </div>

                            <div class="mb-2">
                                <label>Serial Number</label>
                                <input type="text" class="form-control" name="nomor_unit" required>
                            </div>

                            <div class="mb-2">
                                <label>Kategori</label>
                                <select name="kategori" class="form-select" required>
                                    <option value="PS 3">PS3</option>
                                    <option value="PS 4">PS4</option>
                                    <option value="PS 5">PS5</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label>Harga per Jam</label>
                                <input type="number" class="form-control" name="harga_per_jam" required>
                            </div>

                            <div class="mb-2">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="Tersedia">Available</option>
                                    <option value="Dipesan">Sedang Dipakai</option>
                                    <option value="Perbaikan">Maintenance</option>
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session('success'))
            <script>
                showNotification("{{ session('success') }}");
            </script>
        @endif
    </div>
@endsection
