@extends('admin.layouts.app', ['title' => 'Arsip Surat'])

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
                    <li class="breadcrumb-item active" aria-current="page">Arsip Surat</li>
                </ol>
            </nav>
            <div>
                <h1 class="m-0 font-weight-bold text-primary">Arsip Surat</h1>
                <p class="mt-3 mb-0 text-dark">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
                <p class="mt-0 mb-3 text-dark">Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered custom-table" id="mails-table" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengarsipan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengarsipan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($mails as $index => $mail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $mail->code }}</td>
                                <td>{{ $mail->category->name }}</td>
                                <td>{{ $mail->title }}</td>
                                <td>{{ $mail->created_at }}</td>
                                <td>
                                    <a href="{{ route('surat.show', $mail->id) }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-fw fa-solid fa-eye"></i></a>
                                    <a href="{{ route('surat.download', $mail->id) }}" class="btn btn-sm btn-secondary"><i
                                            class="fas fa-fw fa-solid fa-file-arrow-down"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#delete-modal-{{ $mail->id }}">
                                        <i class="fas fa-fw fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete-modal-{{ $mail->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label-{{ $mail->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete-modal-label-{{ $mail->id }}">Konfirmasi Hapus Surat</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus surat {{ $mail->code . '-' . $mail->title }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form id="deleteForm" method="POST" action="{{ route('surat.destroy', $mail->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya</button>
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
                    <a href="{{ route('surat.create') }}" class="btn btn-primary"><i
                            class="fas fa-fw fa-solid fa-file-zipper"></i> Arsipkan Surat</a>
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
            $('#mails-table').DataTable();
        });
    </script>
@endpush
