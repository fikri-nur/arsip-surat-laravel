@extends('admin.layouts.app', ['title' => 'Edit Kategori'])

@push('styles')
    <!-- Tambahkan stylesheet tambahan di sini jika diperlukan -->
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('kategori-surat.index') }}">Kategori
                            Surat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $kategori_surat->name }}</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <div>
                <h1 class="m-0 font-weight-bold text-primary">Edit Kategori</h1>
                <p class="mt-3 mb-0 text-dark">Edit data kategori dengan memasukkan data pada field berikut.</p>
                <p class="mt-0 mb-3 text-dark">Klik "Update" pada tombol di bawah untuk menyimpan perubahan.</p>
            </div>
            <!-- Form untuk mengedit kategori -->
            <form action="{{ route('kategori-surat.update', $kategori_surat->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id"
                        value="{{ $kategori_surat->id }}" disabled required>
                </div>
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $kategori_surat->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $kategori_surat->description }}</textarea>
                </div>
                <a href="{{ route('kategori-surat.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan script tambahan di sini jika diperlukan -->
@endpush
