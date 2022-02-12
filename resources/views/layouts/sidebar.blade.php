<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">E-Kelurahan Ciamis</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

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
        <a class="nav-link collapsed" href="{{ route('user/sku/data_sku') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat SKU</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/skm/data_skm') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat SKTM</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/domisili/data_domisili') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat Domisili</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/duda/data_duda') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat Surat Duda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/janda/data_janda') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat Surat Janda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/sku/data_sku_rw') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat SKU</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif


      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/skm/data_skm_rw') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat SKTM</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/domisili/data_domisili_rw') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat Domisili</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif


      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/duda/data_duda_rw') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat Surat Duda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if (Auth::check() && Auth::user()->role_name == 'RW')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user/janda/data_janda_rw') }}">
          <i class="bi bi-person"></i>
          <span>Data Pembuat Surat Janda</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

    </ul>

  </aside><!-- End Sidebar-->