@include('layouts.header')
@include('layouts.sidebar')

 <main id="main" class="main">
   {{-- message --}}
{!! Toastr::message() !!}

    <div class="pagetitle">
      <h1>Data Profile Kelurahan Ciamis</h1>
      <nav>
       
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
          
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Geografis<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_geografis_kelurahan') }}">
                      <i class="bi bi-geo-fill"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Pemerintah Kelurahan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_pemerintah_kelurahan') }}">
                      <i class="bi bi-person-circle"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Kelompok Umur Masyarakat</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_kelompok_umur') }}">
                      <i class="bi bi-person-check"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Pendidikan Yang Ditamatkan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_pendidikan_ditamatkan') }}">
                      <i class="bi bi-mortarboard-fill"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Mata Pencarian Utama</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_matapencarian_utama') }}">
                      <i class="bi bi-person-workspace"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Agama Kepercayaan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_agama_kepercayaan') }}">
                      <i class="bi bi-person-lines-fill"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Kepala Keluarga</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_kepala_keluarga') }}">
                      <i class="bi bi-person"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Data Sekolah Murid Guru</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_sekolah_murid_guru') }}">
                      <i class="bi bi-building"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Lembaga Masyarakat</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_lembaga') }}">
                      <i class="bi bi-people"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Data Sarana Ibadah <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_sarana') }}">
                      <i class="bi bi-house-fill"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
              
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Data Perumahan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_perumahan') }}">
                      <i class="bi bi-house-door"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Data Keluarga Berencana</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_kb') }}">
                      <i class="bi bi-heart-fill"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Data Sarana Kesehatan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_kesehatan') }}">
                      <i class="bi bi-shield-fill-plus"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Data Sarana Perekonomian</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_perekonomian') }}">
                      <i class="bi bi-bank"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Saran & Masukkan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><a href="{{ route('user/profile_kelurahan/data_masukkan_saran') }}">
                      <i class="bi bi-envelope-open-fill"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Lihat Data Klik Icon</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

@include('layouts.footer')


