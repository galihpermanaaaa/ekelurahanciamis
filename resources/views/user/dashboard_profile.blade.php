@include('layouts.header')
@include('layouts.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard Data Profile Keluarahan Ciamis</h1>
      <nav>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
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

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Pie Chart -->
              <div id="container2" style="max-height: 400px;"></div>
             
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Doughnut Chart -->
              <div id="container3" style="max-height: 400px;"></div>
             
              <!-- End Doughnut CHart -->

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Stacked Bar Chart -->
              <div id="container5" style="max-height: 400px;"></div>
              
              <!-- End Stacked Bar Chart -->

            </div>
          </div>
        </div>

        

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Polar Area Chart -->
              <div id="container4" style="max-height: 400px;"></div>
              
              <!-- End Polar Area Chart -->

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jumlah Sekolah Guru & Murid Kelurahan Ciamis</h5>

              <!-- Radar Chart -->
              
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
              <!-- End Radar CHart -->

            </div>
          </div>
        </div>

        

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jumlah Sarana Ibadah Kelurahan Ciamis</h5>

              <!-- Bubble Chart -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sarana Ibadah</th>
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
             
              <!-- End Bubble Chart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Bubble Chart -->
              
              <div id="container6" style="max-height: 400px;"></div>
              <!-- End Bubble Chart -->

            </div>
          </div>
        </div>


        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Bubble Chart -->
              
              <div id="container7" style="max-height: 400px;"></div>
              <!-- End Bubble Chart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sarana Kesehatan Kelurahan Ciamis</h5>

              <!-- Bubble Chart -->
              
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
              <!-- End Bubble Chart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sarana Perekonomian Kelurahan Ciamis</h5>

              <!-- Bubble Chart -->
              
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
              <!-- End Bubble Chart -->

            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

@include('layouts.footer')
@include('user.charts.kelompokumurchartjs')
@include('user.charts.pendidikanchartjs')
@include('user.charts.matapencarianchartjs')
@include('user.charts.agamachartjs')
@include('user.charts.kkchartjs')  
@include('user.charts.lembagachartjs')  
@include('user.charts.perumahanchartjs') 
@include('user.charts.kbchartjs')