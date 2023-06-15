@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan Pengaduan</h1>
        </div>

        {{-- <x-Admin.Alert/> --}}

        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Pengaduan</h4>
                        <div class="card-header-action">
                            <a href="{{ route('laporan.index') }}" class="btn btn-warning">
                               <i class="fa fa-undo"></i> Go Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <img class="d-block mx-auto" src="{{ $pengaduan->image() }}" style="border-radius: 10px; width: 500px"><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-hover">
                                    <tr>
                                        <th>NIK</th>
                                        <th>:</th>
                                        <th>{{ $pengaduan->user->masyarakat->nik }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th>:</th>
                                        <th>{{ $pengaduan->user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <th>:</th>
                                        <th>{{ $pengaduan->user->masyarakat->telp }}</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pengaduan</th>
                                        <th>:</th>
                                        <th>{{ date('d M Y', strtotime($pengaduan->tgl)) }}</th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        <th>
                                            @switch($pengaduan->status)
                                            @case('masuk')
                                                @php 
                                                    $color = 'primary';
                                                    $status = 'Belum diproses';
                                                @endphp
                                                @break
                                            @case('proses')
                                                @php
                                                    $color = 'warning';
                                                    $status = 'Sedang diproses';
                                                @endphp
                                                @break
                                            @case('selesai')
                                                @php 
                                                    $color = 'success';
                                                    $status = 'Pengaduan selesai'; 
                                                @endphp
                                                @break
                                            @case('ditolak')
                                                @php 
                                                    $color = 'danger' ;
                                                    $status = 'Pengaduan ditolak'
                                                @endphp
                                                @break
                                        @endswitch
                                        <span class="badge badge-{{ $color }}">
                                            {{ $status }}
                                        </span>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                {{-- <img src="{{ $pengaduan->image() }}" width="50%" alt=""> --}}
                                <table class="table table-hover">
                                    <tr>
                                        <th>Kategori</th>
                                        <th>:</th>
                                        <th>{{ $pengaduan->kategori->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <th>:</th>
                                        <th>{{ $pengaduan->lokasi }}</th>
                                    </tr>
                                    <tr>
                                        <th>Isi pengaduan</th>
                                        <th>:</th>
                                        <th>
                                            {{ $pengaduan->deskripsi }}
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @empty($pengaduan->tanggapan)
                @else
                    <div class="card">
                        <div class="card-header">
                            <h4>Tanggapan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Tanggal Ditanggapi</th>
                                            <th>:</th>
                                            <th>{{ date('d M Y', strtotime($pengaduan->tanggapan->tgl)) }}</th>
                                        </tr>
                                        <tr>
                                            <th>Ditanggapi oleh</th>
                                            <th>:</th>
                                            <th>{{ $pengaduan->tanggapan->user->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Isi tanggapan</th>
                                            <th>:</th>
                                            <th>{{ $pengaduan->tanggapan->deskripsi }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endempty

            </div>                
        </div>
    </section>


@endsection