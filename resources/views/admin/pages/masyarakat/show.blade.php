@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Masyarakat</h1>
        </div>
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Detail Masyarakat</h4>
                        <div class="card-header-action">
                            <a href="{{ route('masyarakats.index') }}" class="btn btn-warning">
                               <i class="fa fa-undo"></i> Go Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <img alt="image" src="{{ $data->user->image() }}" class="rounded-circle profile-widget-picture" width="200px">
                                </div>
                                <hr>
                                <table class="table table-hover">
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td>{{ $data->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $data->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ $data->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $data->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $data->telp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $data->alamat }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>                
        </div>
    </section>
@endsection