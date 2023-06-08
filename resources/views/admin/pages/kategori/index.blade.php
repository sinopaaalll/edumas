@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kategori Pengaduan</h1>
        </div>

        {{-- <x-Admin.Alert/> --}}
        <x-sweetAlert/>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data Kategori Pengaduan</h4>
                        <div class="card-header-action">
                            <a href="{{ route('kategoris.create') }}" class="btn btn-primary">
                               <i class="fa fa-plus-circle"></i> Add Kategori
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)   
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $kategori->name }}</td>
                                            <td>
                                                <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span> Edit</a>
                                                    <button type="submit" onclick="return confirm('Yakin, data tersebut akan dihapus?')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Del</button>
                                                </form>
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