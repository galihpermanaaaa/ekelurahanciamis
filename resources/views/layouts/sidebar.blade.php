<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ URL::to('assets/img/logocms.png') }}" alt="">
        <span class="d-none d-lg-block">E-Kelurahan Ciamis</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ URL::to('assets/img/profile-img.jpg') }} " alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->role_name }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile/data_profile') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/data_user') }}">
          <i class="bi bi-person"></i>
          <span>Data User</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/profile_kelurahan/data_profile_kelurahan') }}">
          <i class="bi bi-collection-fill"></i>
          <span>Data Profile Kelurahan</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/sku/data_sku') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat SKU</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/skm/data_skm') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat SKTM</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/domisili/data_domisili') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Domisili</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/duda/data_duda') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Surat Duda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/janda/data_janda') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Surat Janda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif


      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/skbm/data_skbm') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Ket Belum Nikah (SKBM)</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/bmr/data_bmr') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Ket Belum Memiliki Rumah (SKBMR)</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/kematian/data_kematian') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Ket Kematian (SKK)</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/domisili_pt/data_domisilipt') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Domisili Perusahaan (SKDP)</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/sku/data_sku_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat SKU</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif


      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/skm/data_skm_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat SKTM</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/domisili/data_domisili_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Domisili</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif


      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/duda/data_duda_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Surat Duda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/janda/data_janda_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Pembuat Surat Janda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/skbm/data_skbm_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Surat Belum Nikah</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/bmr/data_bmr_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Surat Belum Memiliki Rumah</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/kematian/data_kematian_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Data Surat Ket Kematian</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif


      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/domisili_pt/data_domisilipt_rw') }}">
          <i class="bi bi-envelope-fill"></i>
          <span>Pembuat Domisili Perusahaan (SKDP)</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

    </ul>

  </aside><!-- End Sidebar-->