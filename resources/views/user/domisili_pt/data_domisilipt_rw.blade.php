@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
    @foreach($user as $key => $items)
    <h1>Daftar Surat Keterangan Domisili Perusahaan RW : {{$items->nama_rw}}</h1>
    @endforeach
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
    <br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Pembuat Surat Keterangan Domisili Perusahaan</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lembaga</th>
                    <th scope="col">NPWP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Surat</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->nama_lembaga}}</td>
                      <td>{{$item->npwp_pt}}</td>
                      <td>{{$item->email}}</td>
                <td>  <a href="{{ url('user/domisili_pt/lihat_data_domisilipt/'.$item->id) }}" class="btn btn-info" style="font-size: 14px; color: white" ></i> Lihat Data</a>	
                   </td>

                    <td>
                        
                      @if($item->verifikasi =='Belum Diverifikasi')
                      <p class="text-success"></p>Belum Ada Karena Belum Diverifikasi</span>
					  @elseif($item->verifikasi =='Terverifikasi')
                      <a href="{{ url('user/domisili_pt/surat_domisilipt/'.$item->id) }}" target="_blank" class="btn btn-primary btn-sm" style="font-size: 14px; color: white" ></i> Download</a>	
                      @else($item->verifikasi =='Ditolak')
					  <p class="text-danger" style="font-size: 14px;"></p>{{$item->deskripsi}}</span>
					  @endif

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

@include('sweetalert::alert')

@include('layouts.footer')