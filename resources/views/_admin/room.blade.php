@extends('_admin.layouts.app')

@section('content')
    <div class="m-4">

        <h1 class="h3 mb-2 text-gray-800">Data Ruangan</h1>
        <p class="mb-4">Daftar ruangan yang tersedia untuk reservasi.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Rooms Table</h6>

                    <div class="d-flex align-items-center gap-2">
                        <form method="GET" action="{{ route('admin.rooms.index') }}">
                            <select name="category" onchange="this.form.submit()" class="form-select">
                                <option value="">Semua Kategori</option>
                                <option value="Premium" {{ request('category') == 'Premium' ? 'selected' : '' }}>Premium
                                </option>
                                <option value="VIP" {{ request('category') == 'VIP' ? 'selected' : '' }}>VIP</option>
                                <option value="Standard" {{ request('category') == 'Standard' ? 'selected' : '' }}>Standard
                                </option>
                            </select>
                        </form>

                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            Tambah Ruangan
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Ruangan</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category ?? '-' }}</td>
                                    <td>{{ Str::limit($item->description, 80) }}</td>
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

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.rooms.update', $item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')

                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title">Edit Ruangan</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="mb-2">
                                                        <label>Nama Ruangan</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $item->name }}" required>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label>Kategori</label>
                                                        <select name="category" class="form-select">
                                                            <option value="">-- Tidak Ada --</option>
                                                            <option value="Premium"
                                                                {{ $item->category == 'Premium' ? 'selected' : '' }}>
                                                                Premium</option>
                                                            <option value="VIP"
                                                                {{ $item->category == 'VIP' ? 'selected' : '' }}>VIP
                                                            </option>
                                                            <option value="Standard"
                                                                {{ $item->category == 'Standard' ? 'selected' : '' }}>
                                                                Standard</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label>Deskripsi</label>
                                                        <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
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

                                {{-- Modal Delete --}}
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.rooms.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('POST')

                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Hapus Ruangan</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>Yakin ingin menghapus ruangan <b>{{ $item->name }}</b>?</p>
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
                                    <td colspan="7" class="text-center text-muted">Belum ada data ruangan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Tambah --}}
        <div class="modal fade" id="tambahModal" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Tambah Ruangan</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-2">
                                <label>Nama Ruangan</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-2">
                                <label>Kategori</label>
                                <select name="category" class="form-select">
                                    <option value="">-- Tidak Ada --</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                    <option value="Standard" selected>Standard</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
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
