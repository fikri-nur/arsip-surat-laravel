@extends('admin.layouts.app', ['title' => 'Edit Surat'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Arsip Surat</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('surat.show', $surat->id) }}">{{ $surat->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <div>
                <h1 class="m-0 font-weight-bold text-primary">Edit Surat</h1>
                <p class="mt-3 mb-0 text-dark">Edit data surat dengan memasukkan data pada field berikut.</p>
                <p class="mt-0 mb-3 text-dark">Klik "Update" pada tombol di bawah untuk menyimpan perubahan.</p>
            </div>
            <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="code">Nomor Surat</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{ $surat->code }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select name="category_id" id="category" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $surat->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Judul Surat</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $surat->title }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="file">File Surat (PDF)</label>
                    <div class="custom-file">
                        <input type="file" name="file" id="customFile" class="custom-file-input"
                            accept="application/pdf">
                        <label class="custom-file-label" for="customFile">Pilih file surat</label>
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah file.</small>
                    </div>
                </div>
                <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-success">Update</button>
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
