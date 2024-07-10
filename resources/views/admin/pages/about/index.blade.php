@extends('admin.layouts.app', ['title' => 'About'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">About</h6></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <!-- Replace with your actual profile picture -->
                                    <img src="{{ asset('img/profile_pict.jpg') }}" class="img-fluid rounded-circle" alt="Profile Photo" style="width: 300px;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="text-right" style="width: 80px;">Nama:</th>
                                                <td class="text-left text-dark font-weight-bold">Amiruddin Fikri Nur</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-right">Prodi:</th>
                                                <td class="text-left text-dark font-weight-bold" >D-IV Sistem Informasi Bisnis</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-right">NIM:</th>
                                                <td class="text-left text-dark font-weight-bold">2141764163</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-right">Tanggal:</th>
                                                <td class="text-left text-dark font-weight-bold">10 Juli 2024</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
