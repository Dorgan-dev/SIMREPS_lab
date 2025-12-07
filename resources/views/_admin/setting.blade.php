@extends('_admin.layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Pengaturan Website</h3>

        {{-- Logo Saat Ini --}}
        <div class="card mb-4">
            <div class="card-header">Logo Website</div>

            <div class="card-body">

                {{-- Preview Logo --}}
                @if ($logo)
                    <p>Logo saat ini:</p>
                    <img src="{{ asset($logo) }}" alt="Logo" style="max-height: 100px;">
                @else
                    <p class="text-muted">Belum ada logo.</p>
                @endif

                <hr>

                {{-- Form Upload --}}
                <form action="{{ route('admin.settings.update.logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="form-label">Upload Logo Baru</label>
                    <input type="file" name="logo" class="form-control mb-3" id="logo-input">

                    <button class="btn btn-primary" id="save-button" disabled>Simpan</button>
                </form>

                {{-- Tombol Hapus --}}
                @if ($logo)
                    <form action="{{ route('admin.settings.delete.logo') }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">Hapus Logo</button>
                    </form>
                @endif

            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            // Pastikan DOM sudah siap sebelum menjalankan script
            document.addEventListener('DOMContentLoaded', function() {

                // Ambil elemen input file dan tombol simpan
                const logoInput = document.getElementById('logo-input');
                const saveButton = document.getElementById('save-button');

                // Cek apakah elemen ditemukan (untuk menghindari error di console jika elemen tidak ada)
                if (logoInput && saveButton) {

                    // Tambahkan event listener pada input file
                    logoInput.addEventListener('change', function() {

                        // Cek apakah ada file yang dipilih
                        if (logoInput.files && logoInput.files.length > 0) {
                            saveButton.disabled = false; // Aktifkan tombol
                            saveButton.classList.remove('btn-secondary'); // Opsional: visual feedback
                            saveButton.classList.add('btn-primary'); // Opsional
                        } else {
                            saveButton.disabled = true; // Nonaktifkan tombol
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection
