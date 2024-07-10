@extends('admin.layouts.app', ['title' => 'Unggah Arsip Surat'])

@push('styles')
    <style>
        .form-group label {
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Arsip Surat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Unggah Arsip Surat</li>
                </ol>
            </nav>
            <div>
                <h1 class="m-0 font-weight-bold text-primary">Unggah Arsip Surat</h1>
                <p class="mt-3 mb-0 text-dark">Unggah surat yang telah diterbitkan pada form ini untuk diarsipkan.</p>
                <p class="mb-0 text-dark">Catatan:</p>
                <ul>
                    <li>File surat yang diunggah harus berformat PDF.</li>
                </ul>
            </div>
            <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-4">
                    <label for="code">Nomor Surat</label>
                    <input type="text" name="code" id="code"
                        class="form-control @error('code') is-invalid @enderror" placeholder="Masukkan nomor surat"
                        value="{{ old('code') }}">
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="" selected disabled>Pilih kategori surat</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Judul Surat</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul surat"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file">File Surat (PDF)</label>
                    <div class="custom-file">
                        <input type="file" name="file" id="customFile"
                            class="custom-file-input @error('file') is-invalid @enderror" accept="application/pdf">
                        <label class="custom-file-label" for="customFile">Pilih file surat</label>
                    </div>
                    @error('file')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <a href="{{ route('surat.index') }}" class="btn btn-primary mt-3"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-success mt-3">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Add change event listener to file input
        document.getElementById('customFile').addEventListener('change', function(e) {
            // Get the name of the selected file
            var fileName = e.target.files[0].name;

            // Update the custom file label with the selected file name
            var label = document.querySelector('.custom-file-label');
            label.textContent = fileName;
        });
    </script>
@endpush
