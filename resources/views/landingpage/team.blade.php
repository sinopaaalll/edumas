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
                <h1 data-aos="fade-up" data-aos-delay="">Team</h1>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 mb-4 mb-lg-0 mt-5" data-aos="fade">
              <div class="card">
                <div class="card-body mx-auto">
                    <img src="{{ url('assets/img/naufal.jpg') }}" alt="Image" class="img-fluid" style="width:300px; height:400px; border-radius:10px">
                    <h5 class="text-center mt-4"></h5>
                            <p class="text-center">Naufal Rizqullah</p>
                            <p class="text-center">Ketua </p>
                            <p class="text-center">STT. Wastukancana Purwakarta</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mt-5" data-aos="fade">
              <div class="card">
                <div class="card-body mx-auto">
                    <img src="{{ url('assets/img/marul.jpeg') }}" alt="Image" class="img-fluid" style="width:300px; height:400px; border-radius:10px">
                    <h5 class="text-center mt-4"></h5>
                            <p class="text-center">Marullah S</p>
                            <p class="text-center">UI UX</p>
                            <p class="text-center">Universitas Bina Sarana Informatika</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mt-5" data-aos="fade">
              <div class="card">
                <div class="card-body mx-auto">
                    <img src="{{ url('assets/img/ikhsan.jpg') }}" alt="Image" class="img-fluid" style="width:300px; height:400px; border-radius:10px">
                    <h5 class="text-center mt-4"></h5>
                            <p class="text-center">Muhammad Ikhsan Nugraha</p>
                            <p class="text-center">Front End</p>
                            <p class="text-center">Universitas Amikom Purwokerto</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mt-5" data-aos="fade">
              <div class="card">
                <div class="card-body mx-auto">
                    <img src="{{ url('assets/img/freany.jpeg') }}" alt="Image" class="img-fluid" style="width:300px; height:400px; border-radius:10px">
                    <h5 class="text-center mt-4"></h5>
                            <p class="text-center">Freany Mellyn Usmany</p>
                            <p class="text-center">Database</p>
                            <p class="text-center">Universitas Kristen Duta Wacana</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mt-5" data-aos="fade">
              <div class="card">
                <div class="card-body mx-auto">
                    <img src="{{ url('assets/img/achmad.jpeg') }}" alt="Image" class="img-fluid" style="width:300px; height:400px; border-radius:10px">
                    <h5 class="text-center mt-4"></h5>
                            <p class="text-center">Achmad Maulana</p>
                            <p class="text-center">Back End</p>
                            <p class="text-center">Universitas Bina Sarana Informatika</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    

@endsection