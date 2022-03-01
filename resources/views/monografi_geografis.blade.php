<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kelurahan Ciamis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::to('assets/img/logocms.png') }}" rel="icon">
  <link href="{{ URL::to('assets/img/logocms.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::to('Arsha/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('Arsha/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('Arsha/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('Arsha/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ URL::to('Arsha/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ URL::to('Arsha/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('Arsha/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ URL::to('Arsha/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v2.3.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ route('index') }}">E-KELURAHAN CIAMIS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
      <ul>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li class="drop-down"><a href="">Profil</a>
            <ul>
              <li ><a href="{{ route('visi_misi') }}">Visi & Misi</a></li>
              <li ><a href="{{ route('sejarah') }}">Sejarah</a></li>
              <li class="active"><a href="{{ route('batas_kelurahan') }}">Batas Kelurahan</a></li>
              <li ><a href="{{ route('pemerintahan_kelurahan') }}">Pemerintahan Kelurahan</a></li>
              <li><a href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a></li>
              <li><a href="{{ route('monografi_geografis') }}">Monografi Geografis</a></li>
              <li><a href="{{ route('monografi') }}">Monografi Pemerintahan & Kependudukan</a></li>
              <!-- <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
            </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ route('login') }}" class="get-started-btn scrollto">Login</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li>Data Geografis</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    
    

      

     
<section id="why-us" class="why-us section-bg">
 {{-- message --}}


    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    </script>
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Geografis Kelurahan Ciamis</h3>
              <p>
                Berikut ini adalah Data Geografis Kelurahan ciamis:
              </p>
            </div>

            @foreach($data as $key => $item)
            <div class="accordion-list">
              <ul>
                <li>
                  <a data-toggle="collapse" class="collapse" href="#accordion-list-1"><span>01</span> Luas Wilayah Desa / Kelurahan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-parent=".accordion-list">
                    <p>
                    {{$item->luas_wilayah}}
                    </p>
                  </div>
                </li>

                <li>
                  <a data-toggle="collapse" href="#accordion-list-2" class="collapsed"><span>02</span> Lahan Kering<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-parent=".accordion-list">
                  <p>Bangunan dan Pekarangan ( {{$item->bangunan_pekarangan}} )</p>
                    <p>Ladang / Kebun ( {{$item->ladang_kebun}} )</p>
                    <p>Kolam ( {{$item->kolam}} )</p>
                    <p>Hutan rakyat ({{$item->hutan_rakyat}})</p>
                    <p>Hutan Negara ({{$item->hutan_negara}})</p>
                    <p>Lainnya ({{$item->lainnya}})</p>
                  </div>
                </li>

                <li>
                  <a data-toggle="collapse" href="#accordion-list-3" class="collapsed"><span>03</span>Lahan Sawah<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-parent=".accordion-list">
                  <p>Berperairan Teknis ({{$item->berperairan_teknis}})</p>
                    <p>Berperairan Sederhana / Desa ({{$item->berperairan_sederhana}})</p>
                    <p>Tidak berperairan / tadah hujan ({{$item->tidak_berperairan}})</p>
                 
                  </div>
                </li>

                <li>
                  <a data-toggle="collapse" href="#accordion-list-4" class="collapsed"><span>04</span> Panjang Jalan Menurut Satuannya<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-4" class="collapse" data-parent=".accordion-list">
                  <p>Nasional ({{$item->panjang_jalan_nasional}})</p>
                <p>Provinsi ({{$item->panjang_jalan_provinsi}})</p>
                <p>Kabupaten ({{$item->panjang_jalan_kabupaten}})</p>
                <p>Desa/Lokal ({{$item->panjang_jalan_desa}})</p>
                  </div>
                </li>

                <li>
                  <a data-toggle="collapse" href="#accordion-list-5" class="collapsed"><span>05</span> Panjang Jalan Menurut Kondisinya<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-5" class="collapse" data-parent=".accordion-list">
                <p>Hotmix ({{$item->hotmix}})</p>
                <p>Aspal ({{$item->aspal}})</p>
                <p>Batu ({{$item->batu}})</p>
                <p>Krikil ({{$item->tanah}})</p>
                <p>Jumlah Jembatan   ({{$item->jumlah_jembatan}})</p>
                  </div>
                </li>

                <li>
                  <a data-toggle="collapse" href="#accordion-list-6" class="collapsed"><span>06</span> Sungai Besar/Sedang<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-6" class="collapse" data-parent=".accordion-list">
                  <p>Banyaknya ({{$item->sungai_besar_banyaknya}})</p>
                  <p>Panjang ({{$item->sungai_besar_panjang}})</p>
                  </div>
                </li>

              </ul>
            </div>
            @endforeach

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/geo.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Services Section -->
    <!-- ======= About Us Section ======= -->
   
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
      &copy; Copyright <strong><span>Kelurahan Ciamis 2022</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ URL::to('Arsha/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <!--  -->
  <script src="{{ URL::to('Arsha/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/aos/aos.js') }}"></script>

  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ URL::to('Arsha/js/main.js') }}"></script>
</body>

</html>
