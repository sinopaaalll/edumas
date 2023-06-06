@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        @if (auth()->user()->role == 'masyarakat')
            <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('admin/assets/img/unsplash/andre-benz-1214056-unsplash.jpg');">
              <div class="hero-inner">
                <h2>Welcome, {{ auth()->user()->name }}!</h2>
                <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
                <div class="mt-4">
                  <a href="{{ route('pengaduans.create') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-bullhorn"></i> Segera laporkan pengaduan anda</a>
                </div>
              </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Semua Pengaduan</h4>
                            </div>
                            <div class="card-body">
                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                            <h4>Belum di Proses</h4>
                            </div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                            <h4>Sedang di Proses</h4>
                            </div>
                            <div class="card-body">
                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                            <h4>Selesai</h4>
                            </div>
                            <div class="card-body">
                        
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>
        @endif
    </section>
@endsection