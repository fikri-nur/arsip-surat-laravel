@extends('admin.layouts.app', ['title' => 'Kategori Surat'])

@push('styles')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .custom-table {
            color: #333;
            /* Warna font */
            border-color: #ddd;
            /* Warna garis */
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
                    <li class="breadcrumb-item active" aria-current="page">Kategori Surat</li>
                </ol>
            </nav>
            <div>
                <h1 class="m-0 font-weight-bold text-primary">Kategori Surat</h1>
                <p class="mt-3 mb-0 text-dark">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
                <p class="mt-0 mb-3 text-dark">Klik "Tambah" pada tombol di bawah untuk menambahkan kategori baru.</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered custom-table" id="categories-table" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($mailCategories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('kategori-surat.edit', $category->id) }}"
                                        class="btn btn-sm btn-primary"><i class="fas fa-fw fa-solid fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#delete-modal-{{ $category->id }}">
                                        <i class="fas fa-fw fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete-modal-{{ $category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="delete-modal-label-{{ $category->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete-modal-label-{{ $category->id }}">Konfirmasi
                                                Hapus Surat</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus kategori {{ $category->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form id="deleteForm" method="POST"
                                                action="{{ route('kategori-surat.destroy', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="text-left mt-2">
                    <a href="{{ route('kategori-surat.create') }}" class="btn btn-primary"><i
                            class="fas fa-fw fa-solid fa-plus"></i> Tambah Kategori Baru</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#categories-table').DataTable();
        });
    </script>
@endpush
