@include('layouts.header')
@include('layouts.sidebar')

 <main id="main" class="main">
   {{-- message --}}
{!! Toastr::message() !!}

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">SKU Yang Belum Diverifikasi <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$sku_count}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">SKTM Yang Belum Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$skm_count}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Surat Duda Belum Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$duda_count}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Surat Janda Belum Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$janda_count}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">SKD Yang Belum Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$skd_count}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">SKBM Yang Belum Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$skbm_count}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">SKBMR Yang Belum Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bank"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$bmr_count}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">SKU Yang Sudah Diverifikasi <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$sku_count_verifikasi}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
              
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">SKTM Yang Sudah Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$skm_count_verifikasi}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Surat Duda Sudah Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$duda_count_verifikasi}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Surat Janda Sudah Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$janda_count_verifikasi}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">SKD Yang Sudah Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$skd_count_verifikasi}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">SKBM Yang Sudah Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wallet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$skbm_count_verifikasi}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">SKBMR Yang Sudah Diverifikasi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bank"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$bmr_count_verifikasi}}</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            @endif

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling">

              @if (Auth::check() && Auth::user()->role_name == 'RW')
                <div class="card-body pb-0">
                @foreach($user_rw as $key => $items)
                  <h5 class="card-title">Jumlah Pembuatan Surat Kelurahan Ciamis Di RW {{$items->nama_rw}}<span></span></h5>
                  @endforeach

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Surat</th>
                        <th scope="col">Terverifikasi</th>
                        <th scope="col">Ditolak</th>
                        <th scope="col">Belum Diverifikasi</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="{{ route('user/sku/data_sku_rw') }}" class="text-primary fw-bold">Surat Keterangan Usaha</a></td>
                        <td>{{$sku_count_verifikasi_rw_terverifikasi}}</td>
                        <td class="fw-bold">{{$sku_count_verifikasi_rw_ditolak}}</td>
                        <td>{{$sku_count_verifikasi_rw_belum}}</td>
                      </tr>

                      <tr>
                        <td><a href="{{ route('user/skm/data_skm_rw') }}" class="text-primary fw-bold">Surat Keterangan Tidak Mampu</a></td>
                        <td>{{$skm_count_verifikasi_rw_terverifikasi}}</td>
                        <td class="fw-bold">{{$skm_count_verifikasi_rw_ditolak}}</td>
                        <td>{{$skm_count_verifikasi_rw_belum}}</td>
                      </tr>

                      <tr>
                        <td><a href="{{ route('user/domisili/data_domisili_rw') }}" class="text-primary fw-bold">Surat Keterangan Domisili</a></td>
                        <td>{{$skd_count_verifikasi_rw_terverifikasi}}</td>
                        <td class="fw-bold">{{$skd_count_verifikasi_rw_ditolak}}</td>
                        <td>{{$skd_count_verifikasi_rw_belum}}</td>
                      </tr>

                      <tr>
                        <td><a href="{{ route('user/duda/data_duda_rw') }}" class="text-primary fw-bold">Surat Keterangan Duda</a></td>
                        <td>{{$duda_count_verifikasi_rw_terverifikasi}}</td>
                        <td class="fw-bold">{{$duda_count_verifikasi_rw_ditolak}}</td>
                        <td>{{$duda_count_verifikasi_rw_belum}}</td>
                      </tr>

                      <tr>
                        <td><a href="{{ route('user/janda/data_janda_rw') }}" class="text-primary fw-bold">Surat Keterangan Janda</a></td>
                        <td>{{$janda_count_verifikasi_rw_terverifikasi}}</td>
                        <td class="fw-bold">{{$janda_count_verifikasi_rw_ditolak}}</td>
                        <td>{{$janda_count_verifikasi_rw_belum}}</td>
                      </tr>

                      <tr>
                        <td><a href="{{ route('user/skbm/data_skbm_rw') }}" class="text-primary fw-bold">Surat Keterangan Belum Menikah</a></td>
                        <td>{{$skbm_count_verifikasi_rw_terverifikasi}}</td>
                        <td class="fw-bold">{{$skbm_count_verifikasi_rw_ditolak}}</td>
                        <td>{{$skbm_count_verifikasi_rw_belum}}</td>
                      </tr>

                      <tr>
                        <td><a href="{{ route('user/bmr/data_bmr_rw') }}" class="text-primary fw-bold">Surat Keterangan Belum Memiliki Rumah</a></td>
                        <td>{{$bmr_count_verifikasi_rw_terverifikasi}}</td>
                        <td class="fw-bold">{{$bmr_count_verifikasi_rw_ditolak}}</td>
                        <td>{{$bmr_count_verifikasi_rw_belum}}</td>
                      </tr>
                     
                    </tbody>
                  </table>

                </div>
                @endif

              </div>
            </div><!-- End Top Selling -->

            


          
            <!-- Reports -->
            @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports Grafik Pembuatan Surat Kelurahan Ciamis <span></span></h5>

                  <!-- Line Chart -->
                  <div id="container"></div>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
            @endif

            <!-- Recent Sales -->
            @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
            <div class="col-12">
              <div class="card recent-sales">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Report Surat Terverifikasi RW Kelurahan Ciamis<span></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                       
                        <th scope="col">RW</th>
                        <th scope="col">SKU</th>
                        <th scope="col">SKTM</th>
                        <th scope="col">Domisili</th>
                        <th scope="col">Surat Ket Duda</th>
                        <th scope="col">Surat Ket Janda</th>
                        <th scope="col">Surat Ket Belum Nikah</th>
                        <th scope="col">Belum Memiliki Rumah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>RW 01</td>
                        <td>{{$jumlah_sku_01}}</td>
                        <td>{{$skm_rep_1}}</td>
                        <td>{{$domi_rep_1}}</td>
                        <td>{{$duda_rep_1}}</td>
                        <td>{{$janda_rep_1}}</td>
                        <td>{{$sbm_rep_1}}</td>
                        <td>{{$bmr_rep_1}}</td>
                      </tr>
                      <tr>
                        <td>RW 02</td>
                        <td>{{$jumlah_sku_02}}</td>
                        <td>{{$skm_rep_2}}</td>
                        <td>{{$domi_rep_2}}</td>
                        <td>{{$duda_rep_2}}</td>
                        <td>{{$janda_rep_2}}</td>
                        <td>{{$sbm_rep_2}}</td>
                        <td>{{$bmr_rep_2}}</td>
                      </tr>
                      <tr>
                        <td>RW 03</td>
                        <td>{{$jumlah_sku_03}}</td>
                        <td>{{$skm_rep_3}}</td>
                        <td>{{$domi_rep_3}}</td>
                        <td>{{$duda_rep_3}}</td>
                        <td>{{$janda_rep_3}}</td>
                        <td>{{$sbm_rep_3}}</td>
                        <td>{{$bmr_rep_3}}</td>
                      </tr>
                      <tr>
                        <td>RW 04</td>
                        <td>{{$jumlah_sku_04}}</td>
                        <td>{{$skm_rep_4}}</td>
                        <td>{{$domi_rep_4}}</td>
                        <td>{{$duda_rep_4}}</td>
                        <td>{{$janda_rep_4}}</td>
                        <td>{{$sbm_rep_4}}</td>
                        <td>{{$bmr_rep_4}}</td>
                      </tr>
                      <tr> 
                        <td>RW 05</td>
                        <td>{{$jumlah_sku_05}}</td>
                        <td>{{$skm_rep_5}}</td>
                        <td>{{$domi_rep_5}}</td>
                        <td>{{$duda_rep_5}}</td>
                        <td>{{$janda_rep_5}}</td>
                        <td>{{$sbm_rep_5}}</td>
                        <td>{{$bmr_rep_5}}</td>
                      </tr>
                      <tr> 
                        <td>RW 06</td>
                        <td>{{$jumlah_sku_06}}</td>
                        <td>{{$skm_rep_6}}</td>
                        <td>{{$domi_rep_6}}</td>
                        <td>{{$duda_rep_6}}</td>
                        <td>{{$janda_rep_6}}</td>
                        <td>{{$sbm_rep_6}}</td>
                        <td>{{$bmr_rep_6}}</td>
                      </tr>
                      <tr> 
                        <td>RW 07</td>
                        <td>{{$jumlah_sku_07}}</td>
                        <td>{{$skm_rep_7}}</td>
                        <td>{{$domi_rep_7}}</td>
                        <td>{{$duda_rep_7}}</td>
                        <td>{{$janda_rep_7}}</td>
                        <td>{{$sbm_rep_7}}</td>
                        <td>{{$bmr_rep_7}}</td>
                      </tr>
                      <tr> 
                        <td>RW 08</td>
                        <td>{{$jumlah_sku_08}}</td>
                        <td>{{$skm_rep_8}}</td>
                        <td>{{$domi_rep_8}}</td>
                        <td>{{$duda_rep_8}}</td>
                        <td>{{$janda_rep_8}}</td>
                        <td>{{$sbm_rep_8}}</td>
                        <td>{{$bmr_rep_8}}</td>
                      </tr>
                      <tr> 
                        <td>RW 09</td>
                        <td>{{$jumlah_sku_09}}</td>
                        <td>{{$skm_rep_9}}</td>
                        <td>{{$domi_rep_9}}</td>
                        <td>{{$duda_rep_9}}</td>
                        <td>{{$janda_rep_9}}</td>
                        <td>{{$sbm_rep_9}}</td>
                        <td>{{$bmr_rep_9}}</td>
                      </tr>
                      <tr> 
                        <td>RW 10</td>
                        <td>{{$jumlah_sku_10}}</td>
                        <td>{{$skm_rep_10}}</td>
                        <td>{{$domi_rep_10}}</td>
                        <td>{{$duda_rep_10}}</td>
                        <td>{{$janda_rep_10}}</td>
                        <td>{{$sbm_rep_10}}</td>
                        <td>{{$bmr_rep_10}}</td>
                      </tr>
                      <tr> 
                        <td>RW 11</td>
                        <td>{{$jumlah_sku_11}}</td>
                        <td>{{$skm_rep_11}}</td>
                        <td>{{$domi_rep_11}}</td>
                        <td>{{$duda_rep_11}}</td>
                        <td>{{$janda_rep_11}}</td>
                        <td>{{$sbm_rep_11}}</td>
                        <td>{{$bmr_rep_11}}</td>
                      </tr>
                      <tr> 
                        <td>RW 12</td>
                        <td>{{$jumlah_sku_12}}</td>
                        <td>{{$skm_rep_12}}</td>
                        <td>{{$domi_rep_12}}</td>
                        <td>{{$duda_rep_12}}</td>
                        <td>{{$janda_rep_12}}</td>
                        <td>{{$sbm_rep_12}}</td>
                        <td>{{$bmr_rep_12}}</td>
                      </tr>

                      <tr> 
                        <td>RW 13</td>
                        <td>{{$jumlah_sku_13}}</td>
                        <td>{{$skm_rep_13}}</td>
                        <td>{{$domi_rep_13}}</td>
                        <td>{{$duda_rep_13}}</td>
                        <td>{{$janda_rep_13}}</td>
                        <td>{{$sbm_rep_13}}</td>
                        <td>{{$bmr_rep_13}}</td>
                      </tr>

                      <tr> 
                        <td>RW 14</td>
                        <td>{{$jumlah_sku_14}}</td>
                        <td>{{$skm_rep_14}}</td>
                        <td>{{$domi_rep_14}}</td>
                        <td>{{$duda_rep_14}}</td>
                        <td>{{$janda_rep_14}}</td>
                        <td>{{$sbm_rep_14}}</td>
                        <td>{{$bmr_rep_14}}</td>
                      </tr>

                      <tr> 
                        <td>RW 15</td>
                        <td>{{$jumlah_sku_15}}</td>
                        <td>{{$skm_rep_15}}</td>
                        <td>{{$domi_rep_15}}</td>
                        <td>{{$duda_rep_15}}</td>
                        <td>{{$janda_rep_15}}</td>
                        <td>{{$sbm_rep_15}}</td>
                        <td>{{$bmr_rep_15}}</td>
                      </tr>

                      <tr> 
                        <td>RW 16</td>
                        <td>{{$jumlah_sku_16}}</td>
                        <td>{{$skm_rep_16}}</td>
                        <td>{{$domi_rep_16}}</td>
                        <td>{{$duda_rep_16}}</td>
                        <td>{{$janda_rep_16}}</td>
                        <td>{{$sbm_rep_16}}</td>
                        <td>{{$bmr_rep_16}}</td>
                      </tr>

                      <tr> 
                        <td>RW 17</td>
                        <td>{{$jumlah_sku_17}}</td>
                        <td>{{$skm_rep_17}}</td>
                        <td>{{$domi_rep_17}}</td>
                        <td>{{$duda_rep_17}}</td>
                        <td>{{$janda_rep_17}}</td>
                        <td>{{$sbm_rep_17}}</td>
                        <td>{{$bmr_rep_17}}</td>
                      </tr>

                      <tr> 
                        <td>RW 18</td>
                        <td>{{$jumlah_sku_18}}</td>
                        <td>{{$skm_rep_18}}</td>
                        <td>{{$domi_rep_18}}</td>
                        <td>{{$duda_rep_18}}</td>
                        <td>{{$janda_rep_18}}</td>
                        <td>{{$sbm_rep_18}}</td>
                        <td>{{$bmr_rep_18}}</td>
                      </tr>

                      <tr> 
                        <td>RW 19</td>
                        <td>{{$jumlah_sku_19}}</td>
                        <td>{{$skm_rep_19}}</td>
                        <td>{{$domi_rep_19}}</td>
                        <td>{{$duda_rep_19}}</td>
                        <td>{{$janda_rep_19}}</td>
                        <td>{{$sbm_rep_19}}</td>
                        <td>{{$bmr_rep_19}}</td>
                      </tr>

                      <tr> 
                        <td>RW 20</td>
                        <td>{{$jumlah_sku_20}}</td>
                        <td>{{$skm_rep_20}}</td>
                        <td>{{$domi_rep_20}}</td>
                        <td>{{$duda_rep_20}}</td>
                        <td>{{$janda_rep_20}}</td>
                        <td>{{$sbm_rep_20}}</td>
                        <td>{{$bmr_rep_20}}</td>
                      </tr>

                      <tr> 
                        <td>RW 21</td>
                        <td>{{$jumlah_sku_21}}</td>
                        <td>{{$skm_rep_21}}</td>
                        <td>{{$domi_rep_21}}</td>
                        <td>{{$duda_rep_21}}</td>
                        <td>{{$janda_rep_21}}</td>
                        <td>{{$sbm_rep_21}}</td>
                        <td>{{$bmr_rep_21}}</td>
                      </tr>

                      <tr> 
                        <td>RW 22</td>
                        <td>{{$jumlah_sku_22}}</td>
                        <td>{{$skm_rep_22}}</td>
                        <td>{{$domi_rep_22}}</td>
                        <td>{{$duda_rep_22}}</td>
                        <td>{{$janda_rep_22}}</td>
                        <td>{{$sbm_rep_22}}</td>
                        <td>{{$bmr_rep_22}}</td>
                      </tr>

                      <tr> 
                        <td>RW 23</td>
                        <td>{{$jumlah_sku_23}}</td>
                        <td>{{$skm_rep_23}}</td>
                        <td>{{$domi_rep_23}}</td>
                        <td>{{$duda_rep_23}}</td>
                        <td>{{$janda_rep_23}}</td>
                        <td>{{$sbm_rep_23}}</td>
                        <td>{{$bmr_rep_23}}</td>
                      </tr>

                      <tr> 
                        <td>RW 24</td>
                        <td>{{$jumlah_sku_24}}</td>
                        <td>{{$skm_rep_24}}</td>
                        <td>{{$domi_rep_24}}</td>
                        <td>{{$duda_rep_24}}</td>
                        <td>{{$janda_rep_24}}</td>
                        <td>{{$sbm_rep_24}}</td>
                        <td>{{$bmr_rep_24}}</td>
                      </tr>

                      <tr> 
                        <td>RW 25</td>
                        <td>{{$jumlah_sku_25}}</td>
                        <td>{{$skm_rep_25}}</td>
                        <td>{{$domi_rep_25}}</td>
                        <td>{{$duda_rep_25}}</td>
                        <td>{{$janda_rep_25}}</td>
                        <td>{{$sbm_rep_25}}</td>
                        <td>{{$bmr_rep_25}}</td>
                      </tr>

                      <tr> 
                        <td>RW 26</td>
                        <td>{{$jumlah_sku_26}}</td>
                        <td>{{$skm_rep_26}}</td>
                        <td>{{$domi_rep_26}}</td>
                        <td>{{$duda_rep_26}}</td>
                        <td>{{$janda_rep_26}}</td>
                        <td>{{$sbm_rep_26}}</td>
                        <td>{{$bmr_rep_26}}</td>
                      </tr>

                      <tr> 
                        <td>RW 27</td>
                        <td>{{$jumlah_sku_27}}</td>
                        <td>{{$skm_rep_27}}</td>
                        <td>{{$domi_rep_27}}</td>
                        <td>{{$duda_rep_27}}</td>
                        <td>{{$janda_rep_27}}</td>
                        <td>{{$sbm_rep_27}}</td>
                        <td>{{$bmr_rep_27}}</td>
                      </tr>

                      <tr> 
                        <td>RW 28</td>
                        <td>{{$jumlah_sku_28}}</td>
                        <td>{{$skm_rep_28}}</td>
                        <td>{{$domi_rep_28}}</td>
                        <td>{{$duda_rep_28}}</td>
                        <td>{{$janda_rep_28}}</td>
                        <td>{{$sbm_rep_28}}</td>
                        <td>{{$bmr_rep_28}}</td>
                      </tr>

                      <tr> 
                        <td>RW 29</td>
                        <td>{{$jumlah_sku_29}}</td>
                        <td>{{$skm_rep_29}}</td>
                        <td>{{$domi_rep_29}}</td>
                        <td>{{$duda_rep_29}}</td>
                        <td>{{$janda_rep_29}}</td>
                        <td>{{$sbm_rep_29}}</td>
                        <td>{{$bmr_rep_29}}</td>
                      </tr>

                      <tr> 
                        <td>RW 30</td>
                        <td>{{$jumlah_sku_30}}</td>
                        <td>{{$skm_rep_30}}</td>
                        <td>{{$domi_rep_30}}</td>
                        <td>{{$duda_rep_30}}</td>
                        <td>{{$janda_rep_30}}</td>
                        <td>{{$sbm_rep_30}}</td>
                        <td>{{$bmr_rep_30}}</td>
                      </tr>

                      <tr> 
                        <td>RW 31</td>
                        <td>{{$jumlah_sku_31}}</td>
                        <td>{{$skm_rep_31}}</td>
                        <td>{{$domi_rep_31}}</td>
                        <td>{{$duda_rep_31}}</td>
                        <td>{{$janda_rep_31}}</td>
                        <td>{{$sbm_rep_31}}</td>
                        <td>{{$bmr_rep_31}}</td>
                      </tr>

                      <tr> 
                        <td>RW 32</td>
                        <td>{{$jumlah_sku_32}}</td>
                        <td>{{$skm_rep_32}}</td>
                        <td>{{$domi_rep_32}}</td>
                        <td>{{$duda_rep_32}}</td>
                        <td>{{$janda_rep_32}}</td>
                        <td>{{$sbm_rep_32}}</td>
                        <td>{{$bmr_rep_32}}</td>
                      </tr>

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
            @endif

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

        @if (Auth::check() && Auth::user()->role_name == 'Verifikator')

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              @foreach($log_skd as $key => $items)

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">{{ Carbon\Carbon::parse($items->created_at)->diffForHumans() }} </div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    {{$items->nama}}<a href="#" class="fw-bold text-dark"></a> Membuat Surat Domisili
                  </div>
                </div><!-- End activity item-->

                @endforeach

                @foreach($log_sku as $key => $itemss)

                <div class="activity-item d-flex">
                  <div class="activite-label">{{ Carbon\Carbon::parse($itemss->created_at)->diffForHumans() }} </div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                  {{$itemss->nama}}<a href="#" class="fw-bold text-dark"></a> Membuat SKU
                  </div>
                </div><!-- End activity item-->

                @endforeach

                @foreach($log_skm as $key => $itemsss)
                <div class="activity-item d-flex">
                  <div class="activite-label">{{ Carbon\Carbon::parse($itemsss->created_at)->diffForHumans() }} </div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                  {{$itemsss->nama}}<a href="#" class="fw-bold text-dark"></a> Membuat SKTM
                  </div>
                </div><!-- End activity item-->
                @endforeach

                @foreach($log_duda as $key => $itemssss)
                <div class="activity-item d-flex">
                  <div class="activite-label"> {{ Carbon\Carbon::parse($itemssss->created_at)->diffForHumans() }} </div>
                  <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                  <div class="activity-content">
                  {{$itemssss->nama}} <a href="#" class="fw-bold text-dark"></a> Membuat Surat Duda
                  </div>
                </div><!-- End activity item-->
                @endforeach

                @foreach($log_janda as $key => $item)
                <div class="activity-item d-flex">
                  <div class="activite-label"> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </div>
                  <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                  <div class="activity-content">
                  {{$item->nama}} <a href="#" class="fw-bold text-dark"></a> Membuat Surat Janda
                  </div>
                </div><!-- End activity item-->
                @endforeach


                @foreach($log_skbm as $key => $item)
                <div class="activity-item d-flex">
                  <div class="activite-label"> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                  {{$item->nama}} <a href="#" class="fw-bold text-dark"></a> Membuat SKBM
                  </div>
                </div><!-- End activity item-->
                @endforeach

              </div>

          
          </div>

          @endif

  
 

          <!-- Budget Report -->
          @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Report Surat SKU Berdasarkan Jenis Kelamin Pembuat Surat <span></span></h5>

              <div id="vv2" style="min-height: 200px;" class="echart"></div>
             

              
            </div>
            

            
          </div><!-- End Budget Report -->

          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Report Surat Surat Keterangan Domisili Berdasarkan Jenis Kelamin Pembuat Surat <span></span></h5>

              <div id="vv1" style="min-height: 200px;" class="echart"></div>
             

              
            </div>

            
          </div><!-- End Budget Report -->
         

          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Report Surat Keterangan Duda dan Janda <span></span></h5>

              <div id="vv3" style="min-height: 200px;" class="echart"></div>
             

              
            </div>

            
          </div><!-- End Budget Report -->


          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Report Surat Keterangan Belum Menikah Berdasarkan Jenis Kelamin <span></span></h5>

              <div id="vv4" style="min-height: 200px;" class="echart"></div>
             

              
            </div>

            
          </div><!-- End Budget Report -->
          

        </div><!-- End Right side columns -->
        @endif

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

@include('layouts.footer')
@include('layouts.chartjs')
@include('layouts.piechartjs')
@include('layouts.piechartjs2')
@include('layouts.piechartsjs3')
@include('layouts.piechartsjs4')

