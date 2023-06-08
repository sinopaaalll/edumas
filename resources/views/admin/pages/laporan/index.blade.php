@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan pengaduan</h1>
        </div> 
        <div class="row">
            <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            Cari Berdasarkan Tanggal
                        </div>
                        <div class="card-body">
                            <form action="{{ route('laporan.getlaporan') }}" method="get">
                                @csrf
                                    <div class="form-group">
                                        <input type="text" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" 
                                        onfocusout="(this.type='text')">    
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" 
                                        onfocusout="(this.type='text')">    
                                    </div>
                                        <button type="submit" class="btn btn-lg btn-purple" style="width: 100%;">Cari Laporan</button> 
                            </form>
                        </div>
                    </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header">
                        Data Berdasarkan Tanggal
                    </div>
                    <div class="card-body">
                        @if ($pengaduan ?? '')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Isi laporan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduan as $pengaduan)
                                <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $pengaduan->tgl }}</td>
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
                                            <td><a href="{{ route('laporan.show', $pengaduan->id) }}" class="btn btn-sm btn-info"><span class="fa fa-eye"></span> View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="text-center">
                            Tidak ada data
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>    
        </div>
    </section>
@endsection