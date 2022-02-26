@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
      <h1>Data Sekolah Murid Dan Guru Masyarakat Kelurahan Ciamis</h1>
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
      <form class="search-form d-flex align-items-center" method="GET" action="{{ route('user/profile_kelurahan/data_sekolah_murid_guru/cari_sekolah_murid_guru') }}">
      <select  class="form-control @error('ting_sekolah') is-invalid @enderror" name="ting_sekolah" id="ting_sekolah" required>
                        <option value="">--Pilih Jenis Pendidikan--</option>
                        <option value="TKA Umum">TKA Umum</option>
                        <option value="TKA/TPA">TKA/TPA</option>
                        <option value="SD/MI">SD/MI</option>
                        <option value="SMP/MTS">SMP/MTS</option>
                        <option value="SMK/SMA/Aliyah">SMK/SMA/Aliyah</option>
                        <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                        </select>
        <button type="submit" title="Search" class="btn btn-primary btn-sm" ><i class="bi bi-search"></i></button>&nbsp;&nbsp;
        <a href="{{ route('user/profile_kelurahan/data_sekolah_murid_guru') }}" class="btn btn-success btn-sm">Refresh</a>
      </form>
      
    </div><!-- End Search Bar -->
    <br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                
              <h5 class="card-title">Daftar Sekolah Murid Dan Guru Masyarakat Keluarahan Ciamis</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tingkatannya</th>
                    <th scope="col">Jumlah Sekolah</th>
                    <th scope="col">Jumlah Guru</th>
                    <th scope="col">Jumlah Murid</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->ting_sekolah}}</td>
                      <td>{{$item->jumlah_sekolah}} Sekolah</td>
                      <td>{{$item->jumlah_guru}} Guru</td>
                      <td>{{$item->jumlah_murid}} Murid</td>
                      <td>
                      <button type="button" class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#update_umur"
                        data-id="{{$item->id}}"
                        data-sekolah="{{$item->ting_sekolah}}"
                        data-jumlahguru="{{$item->jumlah_guru}}"
                        data-jumlahmurid="{{$item->jumlah_murid}}"
                        data-jumlahsekolah="{{$item->jumlah_sekolah}}"><i class="bi bi-pencil"></i> Edit</button>

                        <button type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus_umur"
                        data-id="{{$item->id}}"><i class="bi bi-trash"></i> Hapus</button>

                      </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <span class="badge bg-success">Jumlah Guru: {{$jumlah_guru}}</span><br>
              <span class="badge bg-info">Jumlah Murid: {{$jumlah_murid}}</span><br>
              <span class="badge bg-secondary">Jumlah Sekolah: {{$jumlah_sekolah}}</span><br>
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
                            <h5 class="modal-title">Edit Data Sekolah Murid Dan Guru Masyarakat Kelurahan Ciamis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('update_sekolah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="container col-md-12">
                    <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Tingkatannya</label>
                        <input type="hidden" name="id" id="id">
                        <select  class="form-control @error('ting_sekolah') is-invalid @enderror" name="ting_sekolah" id="ting_sekolah" required>
                        <option value="">--Pilih Jenis Tingkatan--</option>
                        <option value="TKA Umum">TKA Umum</option>
                        <option value="TKA/TPA">TKA/TPA</option>
                        <option value="SD/MI">SD/MI</option>
                        <option value="SMP/MTS">SMP/MTS</option>
                        <option value="SMK/SMA/Aliyah">SMK/SMA/Aliyah</option>
                        <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                        </select>
                        @error('ting_sekolah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Sekolah</label>
                        <input type="number" class="form-control @error('jumlah_sekolah') is-invalid @enderror" id="jumlah_sekolah" name="jumlah_sekolah" placeholder="Jumlah...." required />
                        @error('jumlah_sekolah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Guru</label>
                        <input type="number" class="form-control @error('jumlah_guru') is-invalid @enderror" id="jumlah_guru" name="jumlah_guru" placeholder="Jumlah...." required />
                        @error('jumlah_guru')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Murid</label>
                        <input type="number" class="form-control @error('jumlah_murid') is-invalid @enderror" id="jumlah_murid" name="jumlah_murid" placeholder="Jumlah...." required />
                        @error('jumlah_murid')
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
                            <h5 class="modal-title">Hapus Data Sekolah Murid Dan Guru Masyarakat Kelurahan Ciamis Tersebut</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('hapus_sekolah') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        
                        <input type="hidden" name="id" id="id">
                        <P>Apakah Kamu yakin akan menghapus data tersebut?</p>
                        
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
                <h5 class="modal-title" id="modalkdp">Input Data Sekolah Murid Dan Guru Masyarakat Kelurahan Ciamis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_sekolah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                    <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Jenis Pendidikan</label>
                        <select  class="form-control @error('ting_sekolah') is-invalid @enderror" name="ting_sekolah" id="ting_sekolah" required>
                        <option value="">--Pilih Jenis Tingkatan--</option>
                        <option value="TKA Umum">TKA Umum</option>
                        <option value="TKA/TPA">TKA/TPA</option>
                        <option value="SD/MI">SD/MI</option>
                        <option value="SMP/MTS">SMP/MTS</option>
                        <option value="SMK/SMA/Aliyah">SMK/SMA/Aliyah</option>
                        <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                        </select>
                        @error('ting_sekolah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Sekolah</label>
                        <input type="number" class="form-control @error('jumlah_sekolah') is-invalid @enderror" id="jumlah_sekolah" name="jumlah_sekolah" placeholder="Jumlah Sekolah...." required />
                        @error('jumlah_sekolah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Guru</label>
                        <input type="number" class="form-control @error('jumlah_guru') is-invalid @enderror" id="jumlah_guru" name="jumlah_guru" placeholder="Jumlah Guru...." required />
                        @error('jumlah_guru')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Murid</label>
                        <input type="number" class="form-control @error('jumlah_murid') is-invalid @enderror" id="jumlah_murid" name="jumlah_murid" placeholder="Jumlah Murid...." required />
                        @error('jumlah_murid')
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
var Sekolah = button.data('sekolah') 
var JumlahGuru = button.data('jumlahguru')
var JumlahMurid = button.data('jumlahmurid')
var JumlahSekolah = button.data('jumlahsekolah')   

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #ting_sekolah').val(Sekolah)
modal.find('.modal-body #jumlah_guru').val(JumlahGuru)
modal.find('.modal-body #jumlah_murid').val(JumlahMurid)
modal.find('.modal-body #jumlah_sekolah').val(JumlahSekolah)
})

$('#hapus_umur').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')

var modal = $(this)
modal.find('.modal-body #id').val(ID)
})

</script>

@include('sweetalert::alert')
