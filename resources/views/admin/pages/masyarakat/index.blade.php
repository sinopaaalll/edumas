@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Masyarakat</h1>
        </div>

        <x-Admin.Alert/>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data Masyarakat</h4>
                        <div class="card-header-action">
                            <a href="{{ route('masyarakats.create') }}" class="btn btn-primary">
                               <i class="fa fa-user-plus"></i> Add Masyarakat
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>nik</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($masyarakat as $data)   
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->user->email }}</td>
                                            <td>{{ $data->telp }}</td>
                                            <td>
                                                <img alt="image" src="{{ $data->user->image() }}" class="rounded-circle" width="35">
                                            </td>
                                            <td>
                                                <form action="{{ route('masyarakats.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('masyarakats.show', $data->id) }}" class="btn btn-sm btn-info"><span class="fa fa-eye"></span> View</a>
                                                    <a href="{{ route('masyarakats.edit', $data->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span> Edit</a>
                                                    <button type="submit" onclick="confirm('Yakin, data tersebut akan dihapus?')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Del</button>
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