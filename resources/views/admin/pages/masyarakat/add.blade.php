@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Masyarakat</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Form Add Masyarakat</h4>
                        <div class="card-header-action">
                            <a href="{{ route('masyarakats.index') }}" class="btn btn-warning">
                               <i class="fa fa-undo"></i> Go Back
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('masyarakats.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>NIK*</label>
                                                <input type="text" name="nik" class="form-control @error('nik') ? is-invalid @enderror" required=""  value="{{ old('nik') }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input type="text" name="name" class="form-control @error('name') ? is-invalid @enderror" required=""  value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" name="email" class="form-control @error('email') ? is-invalid @enderror" value="{{ old('email') }}" required="">
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
                                                <input type="password" name="password" class="form-control @error('password') ? is-invalid @enderror" value="" required="">
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
                                                <input type="password" name="password_confirmation" class="form-control value="" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Telepon*</label>
                                        <input type="text" name="telp" class="form-control @error('telp') ? is-invalid @enderror" required=""  value="{{ old('telp') }}">
                                        @error('telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat*</label>
                                        <textarea name="alamat" class="form-control @error('alamat') ? is-invalid @enderror" required="" >{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                                <label class="d-block">Jenis Kelamin*</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" @checked(old('jk') === 'L') name="jk" type="radio"  id="exampleRadios1" value="L">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                    Laki-laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" @checked(old('jk') === 'P') name="jk" type="radio"  id="exampleRadios2" value="P">
                                                    <label class="form-check-label"  for="exampleRadios2">
                                                    Perempuan
                                                    </label>
                                                </div>
                                                @error('jk')
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