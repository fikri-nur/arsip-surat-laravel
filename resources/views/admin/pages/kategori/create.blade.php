@extends('admin.layouts.app', ['title' => 'Tambah Kategori Baru'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('kategori-surat.index') }}">Kategori Surat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Kategori Baru</li>
                </ol>
            </nav>
            <div>
                <h1 class="m-0 font-weight-bold text-primary">Tambah Kategori Baru</h1>
                <p class="mt-3 mb-0 text-dark">Tambahkan data kategori dengan memasukkan data pada field berikut.</p>
                <p class="mt-0 mb-3 text-dark">Klik "Simpan" pada tombol di bawah untuk menyimpan kategori baru.</p>
            </div>

            <!-- Form untuk menambahkan kategori baru -->
            <form action="{{ route('kategori-surat.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama kategori" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Masukkan deskripsi kategori" required></textarea>
                </div>
                <a href="{{ route('kategori-surat.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
