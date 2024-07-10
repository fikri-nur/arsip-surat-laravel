@extends('admin.layouts.app', ['title' => 'Lihat - ' . $surat->title])

@push('styles')
    <style>
        .pdf-container {
            width: 100%;
            height: 600px;
            border: 1px solid #ddd;
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
                    <li class="breadcrumb-item active" aria-current="page">{{ $surat->title }}</li>
                </ol>
            </nav>
            <div>
                <h4 class="m-0 font-weight-bold text-primary">Detail Surat:</h6>
                <p class="mt-3 mb-0 text-dark">Nomor: {{ $surat->code }}</p>
                <p class="mt-3 mb-0 text-dark">Kategori: {{ $surat->category->name }}</p>
                <p class="mt-3 mb-0 text-dark">Judul: {{ $surat->title }}</p>
                <p class="mt-3 mb-0 text-dark">Waktu Unggah: {{ $surat->formatted_created_at }}</p>
            </div>
            <div class="pdf-container mt-4">
                <iframe src="{{ asset('storage/' . $surat->file_path) }}#toolbar=0" width="100%" height="100%"></iframe>
            </div>
            <div class="mt-4">
                <a href="{{ route('surat.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-secondary"><i
                    class="fas fa-fw fa-solid fa-file-arrow-down"></i> Unduh</a>
                <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-success"><i
                        class="fas fa-fw fa-solid fa-edit"></i> Edit/Ganti File</a>
            </div>
        </div>
    </div>
@endsection
