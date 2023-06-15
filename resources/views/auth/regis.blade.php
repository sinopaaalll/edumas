<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; E-Dumas</title>

  <!-- Favicons -->
  <link href="{{ asset('admin/assets/img/edumas.png') }}" rel="icon" />
  <link href="{{ asset('admin/assets/img/edumas.png') }}" rel="apple-touch-icon" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/jquery-selectric/selectric.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <a href="{{ url('/') }}">
                <img src="{{ asset('admin/assets/img/edumas.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
              </a>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('auth.store') }}">
                    @csrf
                  <div class="row">
                    <div class="form-group col-6">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') ? is-invalid @enderror" required=""  value="{{ old('nik') }}" autofocus>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') ? is-invalid @enderror" required=""  value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                    <div class="form-group col-6">
                        <label>Password*</label>
                        <input type="password" name="password" class="form-control @error('password') ? is-invalid @enderror" value="" required="">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                      <label for="passwordConfirmation" class="d-block">Password Confirmation</label>
                      <input id="passwordConfirmation" type="password" class="form-control" name="password_confirmation">
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

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
                Do you have an account?
                <a href="{{ route('login') }}">Login</a>
                </div>
            <div class="simple-footer">
              Hak Cipta &copy; 2023. MSIB Batch 4 Fullstack Web Depelover <br>
              Dibuat dan dikembangkan oleh <a href="#">Kelompok 3</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('admin/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('admin/assets/js/page/auth-register.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
</body>
</html>