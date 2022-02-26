@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
      <h1>Data Penduduk Menurut Kelompok Umur Kelurahan Ciamis</h1>
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
    <div class="search-bar col-md-6">
      <form class="search-form d-flex align-items-center" method="GET" action="{{ route('user/profile_kelurahan/data_kelompok_umur/cari_kelompok_umur') }}">
      <select  class="form-control @error('kiteria') is-invalid @enderror" name="kiteria" id="kiteria">
                        <option value="">--Pilih Kriteria Umur--</option>
                        <option value="0-4">0-4</option>
                        <option value="5-9">5-9</option>
                        <option value="10-14">10-14</option>
                        <option value="15-19">15-19</option>
                        <option value="20-24">20-24</option>
                        <option value="25-29">25-29</option>
                        <option value="30-34">30-34</option>
                        <option value="35-39">35-39</option>
                        <option value="40-44">40-44</option>
                        <option value="45-49">45-49</option>
                        <option value="50-54">50-54</option>
                        <option value="55-59">55-59</option>
                        <option value="60-64">60-64</option>
                        <option value="65-69">65-69</option>
                        <option value="70-74">70-74</option>
                        <option value="75keatas">75 Keatas</option>
                        </select>&nbsp;&nbsp;
                        <select  class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
        <button type="submit" title="Search" class="btn btn-primary btn-sm" ><i class="bi bi-search"></i></button>&nbsp;&nbsp;
        <a href="{{ route('user/profile_kelurahan/data_kelompok_umur') }}" class="btn btn-success btn-sm">Refresh</a>
      </form>
      
    </div><!-- End Search Bar -->
    <br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                
              <h5 class="card-title">Daftar Kelompok Umur</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kriteria Umur</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->kiteria}}</td>
                      <td>{{$item->jk}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>
                      <button type="button" class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#update_umur"
                        data-id="{{$item->id}}"
                        data-kiteria="{{$item->kiteria}}"
                        data-jk="{{$item->jk}}"
                        data-jumlah="{{$item->jumlah}}"><i class="bi bi-pencil"></i> Edit</button>

                        <button type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus_umur"
                        data-id="{{$item->id}}"
                        data-kiteria="{{$item->kiteria}}"
                        data-jk="{{$item->jk}}"
                        data-jumlah="{{$item->jumlah}}"><i class="bi bi-trash"></i> Hapus</button>

                      </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <span class="badge bg-success">Jumlah Laki-laki: {{$lk_count}}</span><br>
              <span class="badge bg-info">Jumlah Perempuan: {{$pr_count}}</span><br>
              <span class="badge bg-warning">Jumlah Keseluruhan: {{$all_count}}</span>
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
                            <h5 class="modal-title">Edit Data Umur Masyarakat Kelurahan Ciamis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('update_kelompokumur') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="container col-md-12">
                    <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Kriteria Umur</label>
                        <input type="hidden" name="id" id="id">
                        <select  class="form-control @error('kiteria') is-invalid @enderror" name="kiteria" id="kiteria" required>
                        <option value="">--Pilih Kriteria Umur--</option>
                        <option value="0-4">0-4</option>
                        <option value="5-9">5-9</option>
                        <option value="10-14">10-14</option>
                        <option value="15-19">15-19</option>
                        <option value="20-24">20-24</option>
                        <option value="25-29">25-29</option>
                        <option value="30-34">30-34</option>
                        <option value="35-39">35-39</option>
                        <option value="40-44">40-44</option>
                        <option value="45-49">45-49</option>
                        <option value="50-54">50-54</option>
                        <option value="55-59">55-59</option>
                        <option value="60-64">60-64</option>
                        <option value="65-69">65-69</option>
                        <option value="70-74">70-74</option>
                        <option value="75keatas">75 Keatas</option>
                        </select>
                        @error('kiteria')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Jenis Kelamin</label>
                        <select  class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk" required>
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jk')
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
                            <h5 class="modal-title">Hapus Data Umur Masyarakat Kelurahan Ciamis Tersebut</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('hapus_kelompokumur') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <div class="container col-md-12">
                        <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Kriteria Umur</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control @error('kiteria') is-invalid @enderror" id="kiteria" name="kiteria" required readonly />
                        </select>
                        @error('kiteria')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jk') is-invalid @enderror" id="jk" name="jk" required readonly />
                        @error('jk')
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
                <h5 class="modal-title" id="modalkdp">Input Data Kelompok Umur Masyarakat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_kelompokumur') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                    <div class="row">

                    <div class="col-md-12">
                        <label class="form-label">Kriteria Umur</label>
                        <select  class="form-control @error('kiteria') is-invalid @enderror" name="kiteria" id="kiteria" required>
                        <option value="">--Pilih Kriteria Umur--</option>
                        <option value="0-4">0-4</option>
                        <option value="5-9">5-9</option>
                        <option value="10-14">10-14</option>
                        <option value="15-19">15-19</option>
                        <option value="20-24">20-24</option>
                        <option value="25-29">25-29</option>
                        <option value="30-34">30-34</option>
                        <option value="35-39">35-39</option>
                        <option value="40-44">40-44</option>
                        <option value="45-49">45-49</option>
                        <option value="50-54">50-54</option>
                        <option value="55-59">55-59</option>
                        <option value="60-64">60-64</option>
                        <option value="65-69">65-69</option>
                        <option value="70-74">70-74</option>
                        <option value="75keatas">75 Keatas</option>
                        </select>
                        @error('kiteria')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Jenis Kelamin</label>
                        <select  class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk" required>
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jk')
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
var JK = button.data('jk') 
var Kiteria = button.data('kiteria') 
var Jumlah = button.data('jumlah') 

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #jk').val(JK)
modal.find('.modal-body #kiteria').val(Kiteria)
modal.find('.modal-body #jumlah').val(Jumlah)
})

$('#hapus_umur').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var JK = button.data('jk') 
var Kiteria = button.data('kiteria') 
var Jumlah = button.data('jumlah') 

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #jk').val(JK)
modal.find('.modal-body #kiteria').val(Kiteria)
modal.find('.modal-body #jumlah').val(Jumlah)
})

</script>

@include('sweetalert::alert')
