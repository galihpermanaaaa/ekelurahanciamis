@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
      <h1>Daftar Surat Keterangan Duda</h1>
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
    <div class="search-bar col-md-3">
      <form class="search-form d-flex align-items-center" method="GET" action="{{ route('user/duda/data_duda/cari_duda') }}">
      <select class="form-control" name="id_rw" id="id_rw" required>
         <option selected>---Cari Berdasarkan RW---</option>
            @foreach ($rw as $rww)
            <option  value="{{$rww->id_rw}}">{{$rww->nama_rw}}</option>
            @endforeach
        </select>
        <button type="submit" title="Search" class="btn btn-primary btn-sm" ><i class="bi bi-search"></i></button>&nbsp;&nbsp;
        <a href="{{ route('user/duda/data_duda') }}" class="btn btn-success btn-sm">Refresh</a>
      </form>
      </div><!-- End Search Bar -->
    <br>
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Pembuat Surat Keterangan Duda</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">RW</th>
                    <th scope="col">Verifikasi</th>
                    <th scope="col">Hapus</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Surat</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($duda as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->nik}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->rw->nama_rw}}</td>
                    
                     
                      <td>

                      @if($item->verifikasi =='Belum Diverifikasi')
                      <a href="{{ url('user/duda/verifikasi_duda/'.$item->id) }}" class="btn btn-primary btn-sm" style="font-size: 14px; color: white" ></i> Verifikasi</a>	
                      @elseif($item->verifikasi =='Terverifikasi')
                      <p class="text-success"></p>{{$item->verifikasi}}</span>
                                @else($item->verifikasi =='Ditolak')
                      <p class="text-danger" style="font-size: 14px;"></p>{{$item->verifikasi}}</span>
                      @endif

                      </td>
                      <td class="text-right">
                      @if($item->verifikasi =='Belum Diverifikasi')
                      <button type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus_sku" data-id="{{$item->id}}" data-nikk="{{$item->nik}}"><i class="bi bi-trash"></i> Hapus</button>
                      @elseif($item->verifikasi =='Terverifikasi')
                      <p class="text-success"></p>Tidak Bisa dihapus Karena Sudah Diverifikasi</span>
                      @else($item->verifikasi =='Ditolak')
                      <p class="text-danger" style="font-size: 14px;"></p>Tidak Bisa dihapus Karena Sudah Diverifikasi</span>
                      @endif
                    </td>

                    <td> 

                      @if($item->verifikasi =='Belum Diverifikasi')
                      <p>Harus Diverifikasi terlebih dahulu</p>
                      @elseif($item->verifikasi =='Terverifikasi')
                      <a href="{{ url('user/duda/lihat_data_duda/'.$item->id) }}" class="btn btn-info" style="font-size: 14px; color: white" ></i> Lihat Data</a>	
                      @else($item->verifikasi =='Ditolak')
                      <a href="{{ url('user/duda/lihat_data_duda/'.$item->id) }}" class="btn btn-info" style="font-size: 14px; color: white" ></i> Lihat Data</a>
                      @endif
                      
                    
                    </td>

                    <td>
                        
                      @if($item->verifikasi =='Belum Diverifikasi')
                      <p class="text-success"></p>Belum Ada Karena Belum Diverifikasi</span>
					  @elseif($item->verifikasi =='Terverifikasi')
                      <a href="{{ url('user/duda/surat_duda/'.$item->id) }}" target="_blank" class="btn btn-primary btn-sm" style="font-size: 14px; color: white" ></i> Download</a>	
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

    <div id="hapus_sku" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Hapus Pembuat Surat Keterangan Duda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('delete_duda') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}


                                <div class="row">
                                    <div class="col-md-12">
                                
                                            <div class="">
                                                <div class="form-group">
                                                <p>Apakah kamu yakin akan menghapus data tersebut?</p>
                                                    <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK" required readonly>
                                                    <input type="hidden" name="id" class="form-control" id="id" placeholder="id" required readonly>

                                                    
                                                </div>
                                                <br>
                                    </div>
                                </div>
                                <br>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit" >Delete</button>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

@include('layouts.footer')

<script type="text/javascript">

$('#hapus_sku').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Nik = button.data('nikk') 

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #nik').val(Nik)
})

</script>

@include('sweetalert::alert')