@extends('landingpage.layouts.master')
@section('content')
<div class="hero-section inner-page">
    <div class="wave">
      
      <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                  <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
              </g>
          </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up" data-aos-delay="">Contact</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <div class="site-section">
  <div class="container">
    <div class="row mb-5 align-items-end">
      <div class="col-md-6" data-aos="fade-up">
      
        <h2>Contact Form</h2>
      </div>
      
    </div>
    
        <div class="row">
          <div class="col-md-4 ml-auto order-2"  data-aos="fade-up">
            <ul class="list-unstyled">
              <li class="mb-3">
                <strong class="d-block mb-1">Alamat</strong>
                <span>Jl. Veteran No.58, Nagri Kaler, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41115 </span>
              </li>
              <li class="mb-3">
                <strong class="d-block mb-1">Telepon</strong>
                <span>(0264) 201762</span>
              </li>
              <li class="mb-3">
                <strong class="d-block mb-1">Email</strong>
                <span>admin@purwakartakab.com</span>
              </li>
            </ul>
          </div>

          <div class="col-md-6 mb-5 mb-md-0"  data-aos="fade-up">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="name">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="name">Message</label>
                  <textarea class="form-control" name="message" cols="30" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                  <div class="validate"></div>
                </div>


                <div class="col-md-12 mb-3">
                    <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="col-md-6 form-group">
                  <input type="submit" class="btn btn-primary d-block w-100" value="Send Message">
                </div>
              </div>

            </form>
          </div>
      
        </div>
  </div>
</div>
@endsection