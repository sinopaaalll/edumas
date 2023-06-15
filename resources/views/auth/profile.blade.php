@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">                     
                <img alt="image" src="{{ auth()->user()->image() }}" class="rounded-circle profile-widget-picture" style="width:100px; height:100px">
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Pengaduan</div>
                    <div class="profile-widget-item-value">{{ $pengaduan }}</div>
                  </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">{{ auth()->user()->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ auth()->user()->role }}</div></div>

                <table class="table table-hover">
                    <tr>
                        <th>NIK</th>
                        <th>:</th>
                        <th>{{ $user->masyarakat->nik }}</th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <th>{{ $user->email }}</th>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <th>:</th>
                        <th>{{ $user->masyarakat->telp }}</th>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>:</th>
                        <th>{{ $user->masyarakat->jk === 'L' ? 'Laki-laki' : 'Perempuan' }}</th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <th>{{ $user->masyarakat->alamat }}</th>
                    </tr>
              </table>
              </div>
            </div>
          </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                      <label>NIK</label>
                      <input type="hidden" name="id" id="id" value="{{ $user->masyarakat->id }}">
                      <input type="text" name="nik" class="form-control @error('nik') ? is-invalid @enderror" value="{{ $user->masyarakat->nik }}" required="">
                      @error('nik')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control @error('name') ? is-invalid @enderror" value="{{ $user->name }}" required="">
                      @error('name')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-7 col-12">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control @error('email') ? is-invalid @enderror" value="{{ $user->email }}" required="">
                      @error('email')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-5 col-12">
                      <label>Telepon</label>
                      <input type="text" name="telp" class="form-control @error('telp') ? is-invalid @enderror" value="{{ $user->masyarakat->telp }}">
                      @error('telp')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row col-md-12 col-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
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
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control value="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                      <label>Alamat</label>
                      <textarea class="form-control @error('alamat') ? is-invalid @enderror" name="alamat">{{ $user->masyarakat->alamat }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="row col-md-12 col-12">
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
                                <label class="d-block">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" @checked($user->masyarakat->jk === 'L') name="jk" type="radio"  id="exampleRadios1" value="L">
                                    <label class="form-check-label" for="exampleRadios1">
                                    Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" @checked($user->masyarakat->jk === 'P') name="jk" type="radio"  id="exampleRadios2" value="P">
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
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

    <x-Admin.SweetAlert />

@endsection