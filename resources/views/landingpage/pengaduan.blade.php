@extends('landingpage.layouts.master')
@section('content')
<div class="hero-section inner-page">
    <div class="wave">
        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" >
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF" >
                <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
                </g>
            </g>
        </svg>
    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up" data-aos-delay="">Pengaduan</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        @foreach ($data as $item) 
            <div class="col-md-4">
                <div class="post-entry">
                        <img src="{{ $item->image() }}" alt="Image" class="img-fluid" style="width: 350px ; height: 350px ; border-radius:10px">
                    </a>
                    <div class="post-text">
                        <span class="post-meta">{{ date('M d, Y', strtotime($item->tgl)) }} &bullet; By {{ $item->user->name }}</span>  
                        <h3>{{ $item->deskripsi }}</h3>
                        <p>{{ $item->lokasi }}</p>
                    </div>
                </div>
            </div>
        @endforeach
      </div>

      @if($data->hasPages())
          {{ $data->links() }}
      @endif
  
@endsection