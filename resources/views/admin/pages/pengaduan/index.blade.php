@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengaduan</h1>
        </div>

        <x-Admin.Alert/>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h4>Filter</h4>
                        <form action="" method="get">
                            <small for="">Pilih Status</small>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{-- <small>Pilih Status</small> --}}
                                        <select name="status" class="form-control">
                                            <option value="" {{ Request()->status == '' ? 'selected' : '' }}>Semua</option>
                                            <option value="masuk" {{ Request()->status == 'masuk' ? 'selected' : '' }}>Belum diproses</option>
                                            <option value="proses" {{ Request()->status == 'proses' ? 'selected' : '' }}>Sedang diproses</option>
                                            <option value="selesai" {{ Request()->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            <option value="ditolak" {{ Request()->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <i class="fa fa-filter"></i> Filter
                                    </button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data Pengaduan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Pengadu</th>
                                        <th>Lokasi</th>
                                        <th>Kategori</th>
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
                                            <td>{{ $pengaduan->lokasi }}</td>
                                            <td>{{ $pengaduan->kategori->name }}</td>
                                            <td>
                                                @switch($pengaduan->status)
                                                    @case('masuk')
                                                        @php $color = 'primary' @endphp
                                                        @break
                                                    @case('proses')
                                                        @php $color = 'warning' @endphp
                                                        @break
                                                    @case('selesai')
                                                        @php $color = 'success' @endphp
                                                        @break
                                                    @case('ditolak')
                                                        @php $color = 'danger' @endphp
                                                        @break
                                                @endswitch
                                                <span class="badge badge-{{ $color }}">
                                                    {{ $pengaduan->status }}
                                                </span>
                                            </td>
                                            <td>
                                                @switch($pengaduan->status)
                                                    @case('masuk')
                                                        <a href="{{ route('pengaduans.edit', $pengaduan->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-pen"></span> Tanggapi</a>
                                                        @break
                                                    @case('proses')
                                                        <a href="{{ route('pengaduans.edit', $pengaduan->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span> Edit Tanggapan</a>
                                                        <a href="{{ route('pengaduans.edit', $pengaduan->id) }}" class="btn btn-sm btn-success"><span class="fa fa-check"></span> Selesai</a>
                                                        @break
                                                    @default
                                                    <small>No Action</small>
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </section>

    @push('script')
        <script>
            $(document).ready( function () {
                $('#table-1').DataTable();
            } );
        </script>
    @endpush
@endsection