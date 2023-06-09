@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Petugas</h1>
        </div>

        {{-- <x-Admin.Alert/> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data Petugas</h4>
                        <div class="card-header-action">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                               <i class="fa fa-user-plus"></i> Add User
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
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)   
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <img alt="image" src="{{ $user->image() }}" class="rounded-circle" width="35">
                                            </td>
                                            <td>
                                                <form action="" method="post" id="formDelete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span> Edit</a>
                                                    <button data-action="{{ route('users.destroy', $user->id) }}" class="btn btn-sm btn-danger btnDelete"><i class="fas fa-trash"></i> Hapus</button>
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

    <x-Admin.SweetAlert/>

@endsection