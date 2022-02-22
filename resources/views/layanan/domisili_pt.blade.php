@include('layouts.header')


<main id="main" class="main">

{{-- message --}}
    {!! Toastr::message() !!}

    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>


<div class="col-xl-8">

<div class="card">
  <div class="card-body pt-3">
    <!-- Bordered Tabs -->
    <ul class="nav nav-tabs nav-tabs-bordered">

      <li class="nav-item">
       <h3>Surat Pelaporan Keterangan Domisili Perusahaan</h3>
      </li>
    </ul>

              @foreach ($data as $key => $item)
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Berikut hasil Pelaporan Pembuatan Surat Anda</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Token Anda</div>
                    <div class="col-lg-9 col-md-8">{{ $item->token }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lembaga</div>
                    <div class="col-lg-9 col-md-8">{{ $item->nama_lembaga }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">NPWP Perusahaan</div>
                    <div class="col-lg-9 col-md-8">{{ $item->npwp_pt }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $item->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tanggal Pembuatan Surat Online</div>
                    <div class="col-lg-9 col-md-8">{{tanggal_indonesia($item->tanggal_buat_surat) }}</div>
                  </div>

                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status Verifikasi</div>
                    <div class="col-lg-9 col-md-8">{{ $item->verifikasi }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Surat Anda</div>
                    <div class="col-lg-9 col-md-8">
                    @if($item->verifikasi =='Belum Diverifikasi')
                      <p class="text-success"></p>Belum Ada Karena Belum Diverifikasi Oleh Admin Kelurahan Ciamis Harap Tunggu dan Periksa Email Anda</span>
					          @elseif($item->verifikasi =='Terverifikasi')
                      <a href="{{ url('layanan/surat_domisili_pt/'.$item->id) }}" target="_blank" class="btn btn-primary btn-sm" style="font-size: 14px; color: white" ></i> Silahkan Download</a>
                      <p class="text-danger" style="font-size: 14px; background-color:powderblue;"></p>Tanggal Diverifikasi: {{tanggal_indonesia($item->tanggal_buat_surat) }}</span>	
                      @else($item->verifikasi =='Ditolak')
					        <p class="text-danger" style="font-size: 14px; background-color:powderblue;"></p>{{ $item->deskripsi }}</span>
                  <p class="text-danger" style="font-size: 14px; background-color:powderblue;"></p>Tanggal Diverifikasi: {{tanggal_indonesia($item->tanggal_buat_surat) }}</span>
					        @endif
                  @endforeach
                    </div>
                  </div>



                 
                </div>
                <br>
                <br>
                <a href="{{ route('index') }}" class="btn btn-danger btn-sm">Kembali</a>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
