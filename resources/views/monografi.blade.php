@include('layouts.topbarlanding')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li>Monografi</li>
        </ol>
        <h4>Monografi Pemerintahan & Kependudukan Kelurahan Ciamis</h4>
        <div class="row">

        <div class="col-lg-6">
          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Line Chart -->
              <div id="container" style="max-height: 400px;"></div>
            
             
              <!-- End Line CHart -->
    
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Bar Chart -->
              <div id="container1" style="max-height: 400px;"></div>
              
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>

        </div>
      </div>
    </section><!-- End Breadcrumbs -->


    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="row">

        <div class="col-lg-6">
          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Line Chart -->
              <div id="container2" style="max-height: 400px;"></div>
            
             
              <!-- End Line CHart -->
    
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Bar Chart -->
              <div id="container3" style="max-height: 400px;"></div>
              
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>
        
        </div>
      </div>
    </section><!-- End Breadcrumbs -->


    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="row">

        <div class="col-lg-6">
          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Line Chart -->
              <div id="container5" style="max-height: 400px;"></div>
            
             
              <!-- End Line CHart -->
    
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Bar Chart -->
              <div id="container4" style="max-height: 400px;"></div>
              
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>
        
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="row">

        <div class="col-lg-6">
          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title">Jumlah Sekolah Guru & Murid Kelurahan Ciamis</h5>

              <!-- Line Chart -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tingkatannya</th>
                    <th scope="col">Jumlah Sekolah</th>
                    <th scope="col">Jumlah Guru</th>
                    <th scope="col">Jumlah Murid</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($sekolah as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->ting_sekolah}}</td>
                      <td>{{$item->jumlah_sekolah}} Sekolah</td>
                      <td>{{$item->jumlah_guru}} Guru</td>
                      <td>{{$item->jumlah_murid}} Murid</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <span class="badge bg-success">Jumlah Keseluruhan Guru: {{$jumlah_guru}}</span><br>
              <span class="badge bg-info">Jumlah Keseluruhan Murid: {{$jumlah_murid}}</span><br>
              <span class="badge bg-secondary">Jumlah Keseluruhan Sekolah: {{$jumlah_sekolah}}</span><br>
            
             
              <!-- End Line CHart -->
    
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jumlah Sarana Ibadah Kelurahan Ciamis</h5>

              <!-- Bar Chart -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($sarana as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->sarana}}</td>
                      <td>{{$item->jumlah}}</td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <span class="badge bg-success">Jumlah Keseluruhan: {{$jumlah_sarana}}</span>
              
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>

        </div>
      </div>
    </section><!-- End Breadcrumbs -->

        <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="row">

        <div class="col-lg-6">
          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Line Chart -->
              <div id="container6" style="max-height: 400px;"></div>
            
             
              <!-- End Line CHart -->
    
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Bar Chart -->
              <div id="container7" style="max-height: 400px;"></div>
              
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>
        
        </div>
      </div>
    </section><!-- End Breadcrumbs -->


    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="row">

        <div class="col-lg-6">
          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title">Sarana Kesehatan Kelurahan Ciamis</h5>

              <!-- Line Chart -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($kesehatan as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->tempat}}</td>
                      <td>{{$item->jumlah}}</td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <span class="badge bg-success">Jumlah Keseluruhan: {{$jumlah_kesehatan}}</span>
            
             
              <!-- End Line CHart -->
    
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sarana Perekonomian Kelurahan Ciamis</h5>

              <!-- Bar Chart -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($perekonomian as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->tempat}}</td>
                      <td>{{$item->jumlah}}</td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <span class="badge bg-success">Jumlah Keseluruhan: {{$jumlah_perekonomian}}</span>
              
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>
        
        </div>
      </div>
    </section><!-- End Breadcrumbs -->
        
        

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

@include('user.charts.kelompokumurchartjs')
@include('user.charts.pendidikanchartjs')
@include('user.charts.matapencarianchartjs')
@include('user.charts.agamachartjs')
@include('user.charts.kkchartjs')  
@include('user.charts.lembagachartjs')  
@include('user.charts.perumahanchartjs') 
@include('user.charts.kbchartjs')
