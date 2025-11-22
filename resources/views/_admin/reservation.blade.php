@extends('_admin.layouts.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data pengajuan booking</h1>
    <p class="mb-4">Data pelanggan yang mengajukan pemesanan akan tampil disini.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Refservation table</h6>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                Tambah data
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        @forelse ($reservation as $item=>$data)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $data->cust_id }}</td>
                                <td>{{ $data->console_id }}</td>
                                <td>{{ $data->durasi_jam }}</td>
                                <td>{{ $data->waktu_mulai }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->waktu_mulai)->addSeconds(\Carbon\Carbon::parse($data->durasi_jam)->secondsSinceMidnight())->format('H:i') }}
                                </td>
                                <td>{{ $data->disetujui_oleh }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <!-- Button trigger modal edit -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $data->res_id }}">
                                        Edit
                                    </button> <!-- Button trigger modal hapus -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $data->res_id }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Update Data -->
                            <div class="modal fade" id="editModal{{ $data->res_id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $data->res_id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('reservation.update', $data->res_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="editModalLabel{{ $data->res_id }}">
                                                    Edit Data Reservasi
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">

                                                <!-- Customer ID -->
                                                <div class="mb-3">
                                                    <label for="cust_id" class="form-label">Customer ID</label>
                                                    <input type="text" class="form-control" name="cust_id"
                                                        value="{{ $data->cust_id }}" required>
                                                </div>

                                                <!-- Console ID -->
                                                <div class="mb-3">
                                                    <label for="console_id" class="form-label">Console ID</label>
                                                    <input type="text" class="form-control" name="console_id"
                                                        value="{{ $data->console_id }}" required>
                                                </div>

                                                <!-- Waktu Mulai -->
                                                <div class="mb-3">
                                                    <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                                    <input type="time" class="form-control" name="waktu_mulai"
                                                        value="{{ \Carbon\Carbon::parse($data->waktu_mulai)->format('H:i') }}"
                                                        required>
                                                </div>

                                                <!-- Durasi (Jam) -->
                                                <div class="mb-3">
                                                    <label for="durasi_jam" class="form-label">Durasi (Jam)</label>
                                                    <input type="time" class="form-control" id="durasi_jam"
                                                        name="durasi_jam"
                                                        value="{{ \Carbon\Carbon::parse($data->durasi_jam)->format('H:i') }}"
                                                        required>
                                                </div>

                                                <!-- Disetujui Oleh -->
                                                <div class="mb-3">
                                                    <label for="disetujui_oleh" class="form-label">Disetujui Oleh</label>
                                                    <input type="text" class="form-control" name="disetujui_oleh"
                                                        value="{{ $data->disetujui_oleh }}" required>
                                                </div>

                                                <!-- Status -->
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" name="status" required>
                                                        <option value="Dipesan"
                                                            {{ $data->status == 'Dipesan' ? 'selected' : '' }}>
                                                            Dipesan</option>
                                                        <option value="Berlangsung"
                                                            {{ $data->status == 'Berlangsung' ? 'selected' : '' }}>
                                                            Berlangsung</option>
                                                        <option value="Selesai"
                                                            {{ $data->status == 'Selesai' ? 'selected' : '' }}>
                                                            Selesai</option>
                                                        <option value="Dibatalkan"
                                                            {{ $data->status == 'Dibatalkan' ? 'selected' : '' }}>
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

                            <!-- Modal Hapus Data -->
                            <div class="modal fade" id="deleteModal{{ $data->res_id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $data->res_id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('reservation.destroy', $data->res_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $data->res_id }}">
                                                    Konfirmasi Hapus
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus data reservasi ini?</p>

                                                <ul>
                                                    <li><b>ID Reservasi :</b> {{ $data->res_id }}</li>
                                                    <li><b>Customer ID :</b> {{ $data->cust_id }}</li>
                                                    <li><b>Console ID :</b> {{ $data->console_id }}</li>
                                                </ul>

                                                <p class="text-danger"><b>Tindakan ini tidak dapat dibatalkan.</b></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Reservasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
@endsection
