@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Petugas</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Form Edit Petugas</h4>
                        <div class="card-header-action">
                            <a href="{{ route('users.index') }}" class="btn btn-warning">
                               <i class="fa fa-undo"></i> Go Back
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" name="name" class="form-control @error('name') ? is-invalid @enderror" required="" autofocus value="{{ $user->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" name="email" class="form-control @error('email') ? is-invalid @enderror" value="{{ $user->email }}" required="">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password*</label>
                                                <input type="password" name="password" class="form-control @error('password') ? is-invalid @enderror" value="">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password*</label>
                                                <input type="password" name="password_confirmation" class="form-control value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control  @error('image') ? is-invalid @enderror ">
                                                @error('image')
                                                    <div class="invalid-feedback d-inline">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="d-block">Role*</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" @checked($user->role === 'admin') name="role" type="radio"  id="exampleRadios1" value="admin">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                    Admin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" @checked($user->role === 'petugas') name="role" type="radio"  id="exampleRadios2" value="petugas">
                                                    <label class="form-check-label"  for="exampleRadios2">
                                                    Petugas
                                                    </label>
                                                </div>
                                                @error('role')
                                                    <div class="invalid-feedback d-inline">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>                
        </div>
    </section>
@endsection