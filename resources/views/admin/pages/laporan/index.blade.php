@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan pengaduan</h1>
        </div> 
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cari Berdasarkan Tanggal</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" 
                                        onfocusout="(this.type='text')">    
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" 
                                        onfocusout="(this.type='text')">    
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-lg btn-primary"><span class="fa fa-filter"></span> Cari Laporan</button> 
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Laporan Pengaduan</h4>
                        <div class="card-header-action">
                            <a href="{{ url('cetaklaporan') }}" class="btn btn-danger"><i class="fa fa-file-pdf"></i> Export PDF</a>
                            <a href="{{ url('laporanExcel') }}" class="btn btn-success"><i class="fa fa-file-excel"></i> Export Excel</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pengadu</th>
                                    <th>Isi laporan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduans as $pengaduan)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $pengaduan->tgl }}</td>
                                    <td>{{ $pengaduan->user->name }}</td>
                                    <td> {{ $pengaduan->deskripsi }}</td>
                                    
                                    <td>
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
                                    </td>

                                    <td>
                                        <a href="{{ route('laporan.show', $pengaduan->id) }}" class="btn btn-sm btn-info"><span class="fa fa-eye"></span> View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection