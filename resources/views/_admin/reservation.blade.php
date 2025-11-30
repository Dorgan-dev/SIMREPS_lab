@extends('_admin.layouts.app')
@section('content')
    <div class="m-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">item pengajuan booking</h1>
        <p class="mb-4">item pelanggan yang mengajukan pemesanan akan tampil disini.</p>

        <!-- itemTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Reservation Table</h6>
                    <div class="d-flex align-items-center gap-2">
                        <form method="GET" action="{{ route('admin.reservation') }}">
                            <select name="status" onchange="this.form.submit()" class="form-select">
                                <option value="">Semua Status</option>
                                <option value="Dipesan" {{ request('status') == 'Dipesan' ? 'selected' : '' }}>Dipesan
                                </option>
                                <option value="Berlangsung" {{ request('status') == 'Berlangsung' ? 'selected' : '' }}>
                                    Berlangsung</option>
                                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                                <option value="Dibatalkan" {{ request('status') == 'Dibatalkan' ? 'selected' : '' }}>
                                    Dibatalkan
                                </option>
                            </select>
                        </form>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">
                            Tambah Item
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="itemTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer ID</th>
                                <th>Console ID</th>
                                <th>Durasi</th>
                                <th>Waktu mulai</th>
                                <th>Waktu selesai</th>
                                <th>Disetujui oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Customer ID</th>
                                <th>Console ID</th>
                                <th>Durasi</th>
                                <th>Waktu mulai</th>
                                <th>Waktu selesai</th>
                                <th>Disetujui oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($data as $i => $item)
                                <tr>
                                    <td>{{ $data->firstItem() + $i }}</td>
                                    <td>{{ $item->cust_id }}</td>
                                    <td>{{ $item->console_id }}</td>
                                    <td>{{ $item->durasi_jam }}</td>
                                    <td>{{ $item->waktu_mulai }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->waktu_mulai)->addSeconds(\Carbon\Carbon::parse($item->durasi_jam)->secondsSinceMidnight())->format('H:i') }}
                                    </td>
                                    <td>{{ $item->disetujui_oleh }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <!-- Button trigger modal edit -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->res_id }}">
                                            Edit
                                        </button> <!-- Button trigger modal hapus -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->res_id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Update item -->
                                <div class="modal fade" id="editModal{{ $item->res_id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel{{ $item->res_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('reservation.update', $item->res_id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="editModalLabel{{ $item->res_id }}">
                                                        Edit item Reservasi
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <!-- Customer ID -->
                                                    <div class="mb-3">
                                                        <label for="cust_id" class="form-label">Customer ID</label>
                                                        <input type="text" class="form-control" name="cust_id"
                                                            value="{{ $item->cust_id }}" required>
                                                    </div>

                                                    <!-- Console ID -->
                                                    <div class="mb-3">
                                                        <label for="console_id" class="form-label">Console
                                                            ID</label>
                                                        <input type="text" class="form-control" name="console_id"
                                                            value="{{ $item->console_id }}" required>
                                                    </div>

                                                    <!-- Waktu Mulai -->
                                                    <div class="mb-3">
                                                        <label for="waktu_mulai" class="form-label">Waktu
                                                            Mulai</label>
                                                        <input type="time" class="form-control" name="waktu_mulai"
                                                            value="{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}"
                                                            required>
                                                    </div>

                                                    <!-- Durasi (Jam) -->
                                                    <div class="mb-3">
                                                        <label for="durasi_jam" class="form-label">Durasi
                                                            (Jam)
                                                        </label>
                                                        <input type="time" class="form-control" id="durasi_jam"
                                                            name="durasi_jam"
                                                            value="{{ \Carbon\Carbon::parse($item->durasi_jam)->format('H:i') }}"
                                                            required>
                                                    </div>

                                                    <!-- Disetujui Oleh -->
                                                    <div class="mb-3">
                                                        <label for="disetujui_oleh" class="form-label">Disetujui
                                                            Oleh</label>
                                                        <input type="text" class="form-control" name="disetujui_oleh"
                                                            value="{{ $item->disetujui_oleh }}" required>
                                                    </div>

                                                    <!-- Status -->
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" name="status" required>
                                                            <option value="Dipesan"
                                                                {{ $item->status == 'Dipesan' ? 'selected' : '' }}>
                                                                Dipesan</option>
                                                            <option value="Berlangsung"
                                                                {{ $item->status == 'Berlangsung' ? 'selected' : '' }}>
                                                                Berlangsung</option>
                                                            <option value="Selesai"
                                                                {{ $item->status == 'Selesai' ? 'selected' : '' }}>
                                                                Selesai</option>
                                                            <option value="Dibatalkan"
                                                                {{ $item->status == 'Dibatalkan' ? 'selected' : '' }}>
                                                                Dibatalkan</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Hapus item -->
                                <div class="modal fade" id="deleteModal{{ $item->res_id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $item->res_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('reservation.destroy', $item->res_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->res_id }}">
                                                        Konfirmasi Hapus
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus item reservasi ini?</p>

                                                    <ul>
                                                        <li><b>ID Reservasi :</b> {{ $item->res_id }}</li>
                                                        <li><b>Customer ID :</b> {{ $item->cust_id }}</li>
                                                        <li><b>Console ID :</b> {{ $item->console_id }}</li>
                                                    </ul>

                                                    <p class="text-danger"><b>Tindakan ini tidak dapat
                                                            dibatalkan.</b>
                                                    </p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <button type="submit" class="btn btn-danger">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah item -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah item Reservasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Customer ID -->
                            <div class="mb-3">
                                <label for="cust_id" class="form-label">Customer ID</label>
                                <input type="text" class="form-control" id="cust_id" name="cust_id"
                                    placeholder="Masukkan ID pelanggan" required>
                            </div>

                            <!-- Console ID -->
                            <div class="mb-3">
                                <label for="console_id" class="form-label">Console ID</label>
                                <input type="text" class="form-control" id="console_id" name="console_id"
                                    placeholder="Masukkan ID konsol" required>
                            </div>

                            <!-- Waktu Mulai -->
                            <div class="mb-3">
                                <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                            </div>

                            <!-- Durasi (Jam) -->
                            <div class="mb-3">
                                <label for="durasi_jam" class="form-label">Durasi (Jam)</label>
                                <input type="time" class="form-control" id="durasi_jam" name="durasi_jam"
                                    placeholder="Masukkan durasi jam" required>
                            </div>

                            <!-- Disetujui Oleh -->
                            <div class="mb-3">
                                <label for="disetujui_oleh" class="form-label">Disetujui Oleh</label>
                                <input type="text" class="form-control" id="disetujui_oleh" name="disetujui_oleh"
                                    placeholder="Masukkan nama admin/kasir" required>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required name="status">
                                    <option value="Dipesan" selected>Dipesan</option>
                                    <option value="Berlangsung">Berlangsung</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
