@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
      <h1>Data Tempat Kesehatan Masyarakat Kelurahan Ciamis</h1>
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_umur" style="float: right;"><i class="bi bi-plus-lg"></i> Input Data</button>
    <div class="search-bar col-md-4">
      <form class="search-form d-flex align-items-center" method="GET" action="{{ route('user/profile_kelurahan/data_kesehatan/cari_kesehatan') }}">
      <select  class="form-control @error('tempat') is-invalid @enderror" name="tempat" id="tempat" required>
                        <option value="">--Pilih Tempat Kesehatan--</option>
                        <option value="RSU">RSU</option>
                        <option value="Puskesmas">Puskesmas</option>
                        <option value="Dokter Umum">Dokter Umum</option>
                        <option value="Dokter Gigi">Dokter Gigi</option>
                        <option value="Dokter Spesialis">Dokter Spesialis</option>
                        <option value="Dokter Kesehatan">Dokter Kesehatan</option>
                        <option value="Rumah Bersalin">Rumah Bersalin</option>
                        <option value="Klinik Tradisional">Klinik Tradisional</option>
                        <option value="Apotek">Apotek</option>
                        <option value="Toko Obat">Toko Obat</option>
                        <option value="Polindes">Polindes</option>
                        <option value="Dukun Beranak">Dukun Beranak</option>
                        <option value="Posyando">Posyando</option>
                        <option value="Lab Kesehatan">Lab Kesehatan</option>
                        </select>
        <button type="submit" title="Search" class="btn btn-primary btn-sm" ><i class="bi bi-search"></i></button>&nbsp;&nbsp;
        <a href="{{ route('user/profile_kelurahan/data_kesehatan') }}" class="btn btn-success btn-sm">Refresh</a>
      </form>
      
    </div><!-- End Search Bar -->
    <br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                
              <h5 class="card-title">Daftar Tempat Kesehatan Masyarakat Kelurahan Ciamis</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->tempat}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>
                      <button type="button" class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#update_umur"
                        data-id="{{$item->id}}"
                        data-tempat="{{$item->tempat}}"
                        data-jumlah="{{$item->jumlah}}"><i class="bi bi-pencil"></i> Edit</button>

                        <button type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus_umur"
                        data-id="{{$item->id}}"
                        data-tempat="{{$item->tempat}}"
                        data-jumlah="{{$item->jumlah}}"><i class="bi bi-trash"></i> Hapus</button>

                      </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <span class="badge bg-success">Jumlah Keseluruhan: {{$all_count}}</span>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @include('layouts.footer')

    <div id="update_umur" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Edit Data Tempat Kesehatan Masyarakat Kelurahan Ciamis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('update_kesehatan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="container col-md-12">
                    <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Tempat Kesehatan</label>
                        <input type="hidden" name="id" id="id">
                        <select  class="form-control @error('tempat') is-invalid @enderror" name="tempat" id="tempat" required>
                        <option value="">--Pilih Tempat Kesehatan--</option>
                        <option value="RSU">RSU</option>
                        <option value="Puskesmas">Puskesmas</option>
                        <option value="Dokter Umum">Dokter Umum</option>
                        <option value="Dokter Gigi">Dokter Gigi</option>
                        <option value="Dokter Spesialis">Dokter Spesialis</option>
                        <option value="Dokter Kesehatan">Dokter Kesehatan</option>
                        <option value="Rumah Bersalin">Rumah Bersalin</option>
                        <option value="Klinik Tradisional">Klinik Tradisional</option>
                        <option value="Apotek">Apotek</option>
                        <option value="Toko Obat">Toko Obat</option>
                        <option value="Polindes">Polindes</option>
                        <option value="Dukun Beranak">Dukun Beranak</option>
                        <option value="Posyando">Posyando</option>
                        <option value="Lab Kesehatan">Lab Kesehatan</option>
                        </select>
                        @error('kesehatan')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="Jumlah...." required />
                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-warning float-end" data-target="#contohModal">Update</button>
                    </div>
                    </div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="hapus_umur" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Hapus Data Tempat Kesehatan Masyarakat Kelurahan Ciamis Tersebut</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('hapus_kesehatan') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <div class="container col-md-12">
                        <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Tempat Kesehatan</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" required readonly />
                        </select>
                        @error('tempat')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="Jumlah...." required readonly />
                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-danger float-end" data-target="#contohModal">Delete</button>
                    </div>
                    </div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    
    <div class="modal fade" id="add_umur" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Input Data Tempat Kesehatan Masyarakat Kelurahan Ciamis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_kesehatan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                    <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Tempat Kesehatan</label>
                        <select  class="form-control @error('tempat') is-invalid @enderror" name="tempat" id="tempat" required>
                        <option value="">--Pilih Tempat Kesehatan--</option>
                        <option value="RSU">RSU</option>
                        <option value="Puskesmas">Puskesmas</option>
                        <option value="Dokter Umum">Dokter Umum</option>
                        <option value="Dokter Gigi">Dokter Gigi</option>
                        <option value="Dokter Spesialis">Dokter Spesialis</option>
                        <option value="Dokter Kesehatan">Dokter Kesehatan</option>
                        <option value="Rumah Bersalin">Rumah Bersalin</option>
                        <option value="Klinik Tradisional">Klinik Tradisional</option>
                        <option value="Apotek">Apotek</option>
                        <option value="Toko Obat">Toko Obat</option>
                        <option value="Polindes">Polindes</option>
                        <option value="Dukun Beranak">Dukun Beranak</option>
                        <option value="Posyando">Posyando</option>
                        <option value="Lab Kesehatan">Lab Kesehatan</option>
                        </select>
                        @error('tempat')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" placeholder="Jumlah...." required />
                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-warning float-end" data-target="#contohModal">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>



    <script type="text/javascript">

$('#update_umur').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Tempat = button.data('tempat') 
var Jumlah = button.data('jumlah') 

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #tempat').val(Tempat)
modal.find('.modal-body #jumlah').val(Jumlah)
})

$('#hapus_umur').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Tempat = button.data('tempat') 
var Jumlah = button.data('jumlah') 

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #tempat').val(Tempat)
modal.find('.modal-body #jumlah').val(Jumlah)
})

</script>

@include('sweetalert::alert')
