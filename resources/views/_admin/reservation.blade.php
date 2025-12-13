@extends('_admin.layouts.app')

@section('content')
    <div class="m-4">

        {{-- ================= HEADER ================= --}}
        <h1 class="h3 mb-2 text-gray-800">
            @if ($mode == 'pengajuan')
                Pengajuan Reservasi
            @elseif ($mode == 'berjalan')
                Reservasi Sedang Berjalan
            @else
                Riwayat Reservasi
            @endif
        </h1>

        <p class="mb-4">Data reservasi pelanggan.</p>
        {{-- ================= TABLE ================= --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Reservation Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="custom-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Console</th>
                                <th>Durasi</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Disetujui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($reservations as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->cust->name ?? $item->cust_id }}</td>
                                    <td>{{ $item->console->nama_unit ?? '-' }}</td>
                                    <td>{{ $item->durasi_jam }} Jam</td>
                                    <td>{{ $item->waktu_mulai }}</td>
                                    <td>{{ $item->waktu_selesai }}</td>
                                    <td>{{ $item->approver->name ?? '-' }}</td>

                                    {{-- Badge Status --}}
                                    <td>
                                        <span
                                            class="badge
                                    @if ($item->status == 'Dipesan') bg-warning
                                    @elseif ($item->status == 'Berlangsung') bg-primary
                                    @elseif ($item->status == 'Dibatalkan') bg-danger
                                    @else bg-success @endif">
                                            {{ $item->status }}
                                        </span>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="d-flex gap-1">

                                        {{-- Special for "pengajuan" mode --}}
                                        @if ($mode == 'pengajuan')
                                            <!-- Accept Button -->
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#approveModal{{ $item->id }}">
                                                Terima
                                            </button>
                                            <!-- Reject Button -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#rejectModal{{ $item->id }}">
                                                Tolak
                                            </button>
                                        @endif
                                        <!-- Delete Button -->
                                        <button class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->id }}">
                                            Hapus
                                        </button>

                                    </td>
                                </tr>

                                {{-- Modal Approve --}}
                                <div class="modal fade" id="approveModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.reservations.approve', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header bg-success text-white">
                                                    <h5 class="modal-title">Konfirmasi Terima</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin <b>MENERIMA</b> reservasi ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-success">Terima</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                {{-- Modal Reject --}}
                                <div class="modal fade" id="rejectModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.reservations.reject', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Konfirmasi Tolak</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin <b>MENOLAK</b> reservasi ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-danger">Tolak</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                {{-- Modal Delete --}}
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.reservations.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin ingin menghapus reservasi ini?</p>
                                                    <ul>
                                                        <li><b>Customer:</b> {{ $item->cust->name ?? $item->cust_id }}</li>
                                                        <li><b>Console:</b> {{ $item->console->nama_unit ?? '-' }}</li>
                                                        <li><b>Waktu:</b> {{ $item->waktu_mulai }}</li>
                                                    </ul>
                                                    <p class="text-danger fw-bold">Data akan hilang permanen!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted">Tidak ada data reservasi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
