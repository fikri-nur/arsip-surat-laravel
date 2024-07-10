@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="text-center text-dark font-weight-bold">Selamat Datang di Sistem Pengarsipan Surat Desa Karangduren.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
