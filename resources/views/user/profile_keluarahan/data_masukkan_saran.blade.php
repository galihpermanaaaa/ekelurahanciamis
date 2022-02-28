@include('layouts.header')
@include('layouts.sidebar')

<main id="main" class="main">


    <div class="pagetitle">
      <h1>Data Masukkan Dan Saran Dari Masyarakat Kelurahan Ciamis</h1>
    </div><!-- End Page Title -->

    {{-- message --}}
    {!! Toastr::message() !!}

    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                
              <h5 class="card-title">Daftar Masukkan Dan Saran Dari</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal Masukkan & Saran</th>
                    <th scope="col">Lihat Saran Masukkan</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{tanggal_indonesia($data[0]->tanggal_buat_masukkan)}}</td>
                      <td>
                      <a href="{{ url('user/profile_kelurahan/lihat_data_masukkan_saran/'.$item->id) }}" class="btn btn-primary" style="font-size: 14px; color: white" ></i> Lihat Masukkan & Saran</a>	
                      </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


@include('layouts.footer')