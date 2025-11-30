@extends('guest.layouts.app')

@section('content')
<div class="m-4">
    <h1 class="h3 mb-2 text-gray-800">Data Console PlayStation</h1>
    <p class="mb-4">Daftar unit konsol yang tersedia untuk reservasi.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Console Table</h6>

                <div class="d-flex align-items-center gap-2">
                    <select class="form-select" onchange="filterKategori(this.value)">
                        <option value="">Semua Kategori</option>
                        <option value="PS3">PS 3</option>
                        <option value="PS4">PS 4</option>
                        <option value="PS5">PS 5</option>
                    </select>

                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">
                        Tambah Console
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="consoleTable">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Console ID</th>
                            <th>Nama Konsol</th>
                            <th>Nomor Unit</th>
                            <th>Kategori</th>
                            <th>Harga/Jam</th>
                            <th>Ruangan</th>
                            <th>Status</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $consoles = [
                                ['id'=>'C001','nama'=>'PS5 Digital','nomor'=>1,'kategori'=>'PS5','harga'=>50000,'ruangan'=>'A','status'=>'Tersedia'],
                                ['id'=>'C002','nama'=>'PS4 Slim','nomor'=>2,'kategori'=>'PS4','harga'=>40000,'ruangan'=>'B','status'=>'Dipesan'],
                                ['id'=>'C003','nama'=>'PS3 Fat','nomor'=>3,'kategori'=>'PS3','harga'=>30000,'ruangan'=>'C','status'=>'Perbaikan'],
                            ];
                        @endphp

                        @foreach ($consoles as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['nomor'] }}</td>
                            <td>{{ $item['kategori'] }}</td>
                            <td>Rp {{ number_format($item['harga'],0,',','.') }}</td>
                            <td>{{ $item['ruangan'] }}</td>
                            <td>
                                <span class="badge
                                    @if($item['status']=='Tersedia') bg-success text-white
                                    @elseif($item['status']=='Dipesan') bg-warning text-white
                                    @elseif($item['status']=='Perbaikan') bg-danger text-white
                                    @else bg-secondary text-white @endif">
                                    {{ $item['status'] }}
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item['id'] }}">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $item['id'] }}">Hapus</button>
                            </td>
                        </tr>

                        <!-- Modal Edit Console -->
                        <div class="modal fade" id="editModal{{ $item['id'] }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Edit Console</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label>Nama Konsol</label>
                                            <input type="text" class="form-control" value="{{ $item['nama'] }}">
                                        </div>
                                        <div class="mb-2">
                                            <label>Nomor Unit</label>
                                            <input type="text" class="form-control" value="{{ $item['nomor'] }}">
                                        </div>
                                        <div class="mb-2">
                                            <label>Kategori</label>
                                            <select class="form-select">
                                                <option value="PS3" {{ $item['kategori']=='PS3'?'selected':'' }}>PS3</option>
                                                <option value="PS4" {{ $item['kategori']=='PS4'?'selected':'' }}>PS4</option>
                                                <option value="PS5" {{ $item['kategori']=='PS5'?'selected':'' }}>PS5</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label>Harga per Jam</label>
                                            <input type="number" class="form-control" value="{{ $item['harga'] }}">
                                        </div>
                                        <div class="mb-2">
                                            <label>Status</label>
                                            <select class="form-select">
                                                <option value="Tersedia" {{ $item['status']=='Tersedia'?'selected':'' }}>Tersedia</option>
                                                <option value="Dipesan" {{ $item['status']=='Dipesan'?'selected':'' }}>Dipesan</option>
                                                <option value="Perbaikan" {{ $item['status']=='Perbaikan'?'selected':'' }}>Perbaikan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-warning">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete Console -->
                        <div class="modal fade" id="deleteModal{{ $item['id'] }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Hapus Console</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus console <b>{{ $item['nama'] }}</b>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Console -->
    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Console</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nama Konsol</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Nomor Unit</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Kategori</label>
                        <select class="form-select">
                            <option value="PS3">PS3</option>
                            <option value="PS4">PS4</option>
                            <option value="PS5">PS5</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Harga per Jam</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Status</label>
                        <select class="form-select">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Dipesan">Dipesan</option>
                            <option value="Perbaikan">Perbaikan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterKategori(kategori) {
            const rows = document.querySelectorAll('#consoleTable tbody tr');
            rows.forEach(row => {
                if (kategori === "" || row.cells[4].textContent === kategori) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</div>
@endsection
