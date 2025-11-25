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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkun">
                Tambah data
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($user as $item=>$data)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ substr($data->password, 0, 5) }}...</td>
                                <td>{{ $data->role }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <div class="d-flex gap-6">
                                        <!-- Button trigger modal edit -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $data->id }}">
                                            Edit
                                        </button>

                                        <!-- Button trigger modal hapus -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $data->id }}">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal Update Data -->
                            <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                aria-labelledby="editAkunLabel{{ $data->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAkunLabel{{ $data->id }}">Edit Akun</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <form action="{{ route('customer.update', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-body">
                                                <div class="row">

                                                    <!-- Nama Lengkap -->
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $data->name }}" required>
                                                    </div>

                                                    <!-- Username -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" name="username" class="form-control"
                                                            value="{{ $data->username }}" required>
                                                    </div>

                                                    <!-- Jenis Kelamin -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" class="form-select" required>
                                                            <option value="Laki-laki"
                                                                {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                Laki-laki</option>
                                                            <option value="Perempuan"
                                                                {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $data->email }}" required>
                                                    </div>

                                                    <!-- Nomor HP -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Nomor Telepon</label>
                                                        <input type="tel" name="no_hp" class="form-control"
                                                            value="{{ $data->no_hp }}" required>
                                                    </div>

                                                    <!-- Password (opsional) -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Kata Sandi Baru (opsional)</label>
                                                        <input type="password" name="password" class="form-control"
                                                            autocomplete="new-password">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" autocomplete="new-password">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Simpan Perubahan
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal Hapus Data -->
                            <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('customer.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <div class="modal-content">

                                            <!-- Header -->
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">
                                                    Konfirmasi Hapus Akun
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- Body -->
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus akun berikut?</p>

                                                <ul class="mb-3">
                                                    <li><b>ID Akun:</b> {{ $data->id }}</li>
                                                    <li><b>Nama:</b> {{ $data->name }}</li>
                                                    <li><b>Jenis Kelamin:</b> {{ $data->jenis_kelamin }}</li>
                                                    <li><b>Username:</b> {{ $data->username }}</li>
                                                    <li><b>No HP:</b> {{ $data->no_hp }}</li>
                                                    <li><b>Email:</b> {{ $data->email }}</li>
                                                </ul>

                                                <p class="text-danger"><b>Tindakan ini tidak dapat dibatalkan.</b></p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Batal
                                                </button>

                                                <button type="submit" class="btn btn-danger">
                                                    Hapus Akun
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
    <div class="modal fade" id="tambahAkun" tabindex="-1" aria-labelledby="tambahAkunLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAkunLabel">Daftar Akun Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <!-- Input Nama Lengkap -->
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Nomor HP -->
                            <div class="col-md-6 mb-3">
                                <label for="no_hp" class="form-label">Nomor Telepon</label>
                                <input type="tel" name="no_hp" id="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}"
                                    required autocomplete="tel">
                                @error('no_hp')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="col-md-6 mb-3">
                                <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation" id="password-confirm"
                                    class="form-control" required autocomplete="new-password">
                            </div>

                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Daftar Akun
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    @if (
        $errors->has('name') ||
            $errors->has('username') ||
            $errors->has('email') ||
            $errors->has('no_hp') ||
            $errors->has('password') ||
            $errors->has('jenis_kelamin'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('tambahAkun'));
                modal.show();
            });
        </script>
    @endif
@endsection
