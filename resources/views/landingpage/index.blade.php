<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Landing Page - Edumas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- assets/vendor CSS Files -->
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('assets/vendor/line-awesome/css/line-awesome.min.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('assets/vendor/owlcarousel/assets/owl.carousel.min.css') }}"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <!-- =======================================================
    Template Name: SoftLand
    Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com/
  ======================================================= -->
  </head>

  <body>
    <div class="site-wrap">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icofont-close js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-6 col-lg-2">
              <h1 class="mb-0 site-logo">
                <a href="{{ url('/') }}" class="mb-0">E-Dumas</a>
              </h1>
            </div>

            <div class="col-12 col-md-10 d-none d-lg-block">
              <nav class="site-navigation position-relative text-right" role="navigation" >
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li class="active">
                    <a href="index.html" class="nav-link">Home</a>
                  </li>
                  <li><a href="features.html" class="nav-link">Pengaduan</a></li>
                  <li><a href="contact.html" class="nav-link">Contact</a></li>

                  <li>
                    <a href="{{ route('login') }}" class="nav-link btn btn-outline-danger">Log In</a>
                  </li>
                </ul>
              </nav>
            </div>

            <div
              class="col-6 d-inline-block d-lg-none ml-md-0 py-3"
              style="position: relative; top: 3px"
            >
              <a
                href="#"
                class="burger site-menu-toggle js-menu-toggle"
                data-toggle="collapse"
                data-target="#main-navbar"
              >
                <span></span>
              </a>
            </div>
          </div>
        </div>
      </header>

      <main id="main">
        <div class="hero-section">
          <div class="wave">
            <svg
              width="100%"
              height="355px"
              viewBox="0 0 1920 355"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
            >
              <g
                id="Page-1"
                stroke="none"
                stroke-width="1"
                fill="none"
                fill-rule="evenodd"
              >
                <g
                  id="Apple-TV"
                  transform="translate(0.000000, -402.000000)"
                  fill="#FFFFFF"
                >
                  <path
                    d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                    id="Path"
                  ></path>
                </g>
              </g>
            </svg>
          </div>

          <div class="container">
            <div class="row align-items-center">
              <div class="col-12 hero-text-image">
                <div class="row">
                  <div class="col-lg-7 text-center text-lg-left">
                    <h1 data-aos="fade-right">
                      Layanan Pengaduan Masyarakat Online
                    </h1>
                    <p class="mb-5" data-aos="fade-right" data-aos-delay="100">
                        Sampaikan laporan masalah anda di sini, kami akan memprosesnya dengan cepat.
                    </p>
                    <p
                      data-aos="fade-right"
                      data-aos-delay="200"
                      data-aos-offset="-500"
                    >
                      <a href="{{ route('login') }}" class="btn btn-outline-white">Laporkan !</a>
                    </p>
                  </div>
                  <div class="col-lg-5 iphone-wrap">
                    <img src="{{ asset('assets/img/vektor1.png') }}" alt="Image" class="phone-1" data-aos="fade-right" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="site-section">
          <div class="container">
            <div
              class="row justify-content-center text-center mb-5"
              data-aos="fade" >
              <div class="col-md-6 mb-5">
                <img src="{{ asset('assets/img/undraw_svg_2.svg') }}" alt="Image" class="img-fluid" />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="step">
                  <span class="number">01</span>
                  <h3>Tuliskan Laporan</h3>
                  <p>
                    Tuliskan laporan Keluhan anda dengan jelas.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="step">
                  <span class="number">02</span>
                  <h3>Proses Verifikasi</h3>
                  <p>
                    Tunggu sampai laporan anda terverifikasi.
                  </p>
                </div>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="step">
                  <span class="number">03</span>
                  <h3>Tindak Lanjut</h3>
                  <p>
                    Laporan anda sedang dalam tindak lanjut.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="step">
                  <span class="number">04</span>
                  <h3>Selesai</h3>
                  <p>
                    Laporan pengaduan telah selesai ditindak.
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- .site-section -->


      </main>
      <footer class="footer" role="contentinfo">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-md-7">
              <p class="copyright">
                Hak Cipta &copy; 2023. MSIB Batch 4 Fullstack Web Developer
              </p>
              <div class="credits">
                <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=SoftLand
              -->
                Dibuat dan dikembangkan oleh
                <a href="#">Kelompok 3</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- .site-wrap -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/sticky/sticky.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>
