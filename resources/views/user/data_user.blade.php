@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
      <h1>Daftar User</h1>
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

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal" style="float: right;">
                Tambah Data user
    </button>
    <br>
    <br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar User</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Role Akses</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($user as $key => $item)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->phone_number}}</td>
                      <td>

                      @if($item->role_name =='Lurah')
                      <span class="badge bg-warning">{{ $item->role_name }}</span>
                      @endif 

                           
                      @if($item->role_name =='Verifikator')
                      <span class="badge bg-success">{{ $item->role_name }}</span>
                      @endif 

                      @if($item->role_name =='RW')
                      <span class="badge bg-secondary">{{ $item->role_name }}  {{$item->rw->nama_rw}}</span>
                      @endif 

                      </td>
                      <td class="text-right">
						<button type="button" class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#edit_user" data-id="{{$item->id}}" data-name="{{$item->name}}" data-emaill="{{$item->email}}" data-phone="{{$item->phone_number}}" data-prov="{{$item->prov_id}}"  data-city="{{$item->city_id}}" data-dis="{{$item->dis_id}}"  data-sub="{{$item->subdis_id}}"  data-rw="{{$item->id_rw}}"  data-rtt="{{$item->rt}}"><i class="bi bi-pencil-square"></i> Edit</button>
                        @if($item->role_name =='RW')
                        <button type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus_user" data-id="{{$item->id}}" data-name="{{$item->name}}" data-emaill="{{$item->email}}" data-phone="{{$item->phone_number}}" data-role="{{$item->role_name}}" ><i class="bi bi-trash"></i> Hapus</button>
                        @endif 

                        @if($item->role_name =='Lurah')
                        <button type="button" class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapus_user" data-id="{{$item->id}}" data-name="{{$item->name}}" data-emaill="{{$item->email}}" data-phone="{{$item->phone_number}}" data-role="{{$item->role_name}}" ><i class="bi bi-trash"></i> Hapus</button>
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

  <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Tambah Data User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('save_user') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                
                                            <div class="">
                                                <div class="form-group">
                                                    <label>Nama User</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                             <div class="">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="contoh@gmail.com" id="email" required>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="">
                                                <div class="form-group">
                                                    <label>Nomor telepon</label>
                                                    <input type="number" name="phone_number" class="form-control" placeholder="Masukkan Nomor Telepon" id="phone_number" required>
                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="">
                                                <div class="form-group">
                                                    <label>Role Name User</label>
                                                    <select class="form-control" name="role_name" id="role_name" required>
                                                    <option selected disabled>--Pilih Role Name Pengguna--</option>
                                                    <option value="Lurah">Lurah</option>
                                                    <option value="Verifikator">Verifikator</option>
                                                    <option value="RW">RW</option>
                                                </select>
                                                @error('role_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="">
                                                <div class="form-group">
                                                <label>Provinsi</label>
                                                    <select class="form-control @error('prov_id') is-invalid @enderror" name="prov_id" id="provinsi" required>
                                                    <option selected>---Pilih Provinsi---</option>
                                                    @foreach ($provinsi as $prov)
                                                        <option  value="{{$prov->prov_id}}">{{$prov->prov_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('prov_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>


                                            <div class="">
                                                <div class="form-group">
                                                <label>Kabupaten</label>
                                                <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="kota" required>
                                                        <option selected>---Pilih Kabupaten/Kota---</option>
                                                </select>
                                                @error('city_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                   
                                            <div class="">
                                                <div class="form-group">
                                                <label>Kecamatan</label>
                                                <select class="form-control @error('dis_id') is-invalid @enderror" name="dis_id" id="kecamatan" required>
                                                    <option selected>---Pilih Kecamatan---</option>
                                                </select>
                                                @error('dis_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                    </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                <label>Kelurahan/Desa</label>
                                                <select class="form-control @error('subdis_id') is-invalid @enderror" name="subdis_id" id="desa" required>
                                                    <option selected>---Pilih Desa/Kelurahan---</option>
                                                </select>
                                                @error('subdis_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>

                  
                                            <div class="">
                                                <div class="form-group">
                                                <label>Rukun Warga</label>
                                                <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="rw" required>
                                                    <option selected>--Pilih RW--</option>
                                                </select>
                                                @error('id_rw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                <label>Rukun Tetangga</label>
                                                <select class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" required>
                                                <option selected disabled>--Pilih RT--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                                    @error('rt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                        </div>
                                                </div>

                                          

                                            <div class="">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" id="password" name="password" placeholder="Masukkan Password" class="form-control" required>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>

                                            <br>

                                            <div class="">
                                                <div class="form-group">
                                                    <label>Konfirmasi Password</label>
                                                    <input type="password" id="password_confirmation" placeholder="Konfirmasi Password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                                </div>
                                            </div>

                                            
                                    </div>
                                </div>
                                <br>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit" >Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('update_user') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                
                                            <div class="">
                                                <div class="form-group">
                                                    <label>Nama User</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                                                    <input type="hidden" name="id" class="form-control" id="id" placeholder="id" required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                             <div class="">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="contoh@gmail.com" id="email" required>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="">
                                                <div class="form-group">
                                                    <label>Nomor telepon</label>
                                                    <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="Masukkan Nomor Telepon" id="phone_number" required>
                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="">
                                                <div class="form-group">
                                                    <label>Role Name User</label>
                                                    <select class="form-control" name="role_name" id="role_name" required>
                                                    <option selected disabled>--Pilih Role Name Pengguna--</option>
                                                    <option value="Lurah">Lurah</option>
                                                    <option value="Verifikator">Verifikator</option>
                                                    <option value="RW">RW</option>
                                                </select>
                                                @error('role_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="">
                                                <div class="form-group">
                                                <label>Provinsi</label>
                                                    <select class="form-control @error('prov_id') is-invalid @enderror" name="prov_id" id="provinsi1" required>
                                                    <option selected>---Pilih Provinsi---</option>
                                                    @foreach ($provinsi as $prov)
                                                        <option  value="{{$prov->prov_id}}">{{$prov->prov_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('prov_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>


                                            <div class="">
                                                <div class="form-group">
                                                <label>Kabupaten</label>
                                                <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="kota1" required>
                                                        <option selected>---Pilih Kabupaten/Kota---</option>
                                                </select>
                                                @error('city_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                   
                                            <div class="">
                                                <div class="form-group">
                                                <label>Kecamatan</label>
                                                <select class="form-control @error('dis_id') is-invalid @enderror" name="dis_id" id="kecamatan1" required>
                                                    <option selected>---Pilih Kecamatan---</option>
                                                </select>
                                                @error('dis_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                    </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                <label>Kelurahan/Desa</label>
                                                <select class="form-control @error('subdis_id') is-invalid @enderror" name="subdis_id" id="desa1" required>
                                                    <option selected>---Pilih Desa/Kelurahan---</option>
                                                </select>
                                                @error('subdis_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>

                  
                                            <div class="">
                                                <div class="form-group">
                                                <label>Rukun Warga</label>
                                                <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="rw1" required>
                                                    <option selected>--Pilih RW--</option>
                                                </select>
                                                @error('id_rw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                <label>Rukun Tetangga</label>
                                                <select class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" required>
                                                <option selected disabled>--Pilih RT--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                                    @error('rt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                        </div>
                                                </div>

                                          


                                            
                                    </div>
                                </div>
                                <br>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit" >Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="hapus_user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Hapus User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('hapus_user') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}


                                <div class="row">
                                    <div class="col-md-12">
                                
                                            <div class="">
                                                <div class="form-group">
                                                <p>Apakah kamu yakin akan menghapus user tersebut?</p>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required readonly>
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
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>

    <script type="text/javascript">

$('#edit_user').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Name = button.data('name') 
var Email = button.data('emaill') 
var Phone = button.data('phone')
var Role = button.data('role')
var Prov = button.data('prov')
var City = button.data('city')
var Dis = button.data('dis')
var Sub = button.data('sub')
var Rw = button.data('rw')
var Rt = button.data('rtt')


var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #name').val(Name)
modal.find('.modal-body #email').val(Email)
modal.find('.modal-body #phone_number').val(Phone)
modal.find('.modal-body #role_name').val(Role)
modal.find('.modal-body #provinsi1').val(Prov)
modal.find('.modal-body #kota1').val(City)
modal.find('.modal-body #kecamatan1').val(Dis)
modal.find('.modal-body #desa1').val(Sub)
modal.find('.modal-body #rw1').val(Rw)
modal.find('.modal-body #rt').val(Rt)

});

</script>

<script type="text/javascript">

$('#hapus_user').on('show.bs.modal', function (event) {
    


var button = $(event.relatedTarget)
var ID = button.data('id')
var Name = button.data('name') 

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #name').val(Name)
})

</script>

<script>
  $('#provinsi').change(function(){
  var prov_id = $(this).val();
  if(prov_id){
      $.ajax({
         type:"GET",
         url:"/getKota?prov_id="+prov_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#kota").empty();
              $("#kecamatan").empty();
              $("#kota").append('<option>---Pilih Kabupaten/Kota---</option>');
              $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
              $.each(res,function(nama,kode){
                  $("#kota").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#kota").empty();
             $("#kecamatan").empty();
          }
         }
      });
  }else{
      $("#kota").empty();
      $("#kecamatan").empty();
  }
 });

 $('#kota').change(function(){
  var city_id = $(this).val();
  if(city_id){
      $.ajax({
         type:"GET",
         url:"/getKecamatan?city_id="+city_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#kecamatan").empty();
              $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
              $.each(res,function(nama,kode){
                  $("#kecamatan").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#kecamatan").empty();
          }
         }
      });
  }else{
      $("#kecamatan").empty();
  }
 });

 $('#kecamatan').change(function(){
  var dis_id = $(this).val();
  if(dis_id ){
      $.ajax({
         type:"GET",
         url:"/getDesa?dis_id="+dis_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#desa").empty();
              $("#desa").append('<option>---Pilih Desa---</option>');
              $.each(res,function(nama,kode){
                  $("#desa").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#desa").empty();
          }
         }
      });
  }else{
      $("#desa").empty();
  }
 });

 $('#desa').change(function(){
  var subdis_id = $(this).val();
  if(subdis_id ){
      $.ajax({
         type:"GET",
         url:"/getRw?subdis_id="+subdis_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#rw").empty();
              $("#rw").append('<option>---Pilih RW---</option>');
              $.each(res,function(nama,kode){
                  $("#rw").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#rw").empty();
          }
         }
      });
  }else{
      $("#rw").empty();
  }
 });


</script>




<script>
  $('#provinsi1').change(function(){
  var prov_id = $(this).val();
  if(prov_id){
      $.ajax({
         type:"GET",
         url:"/getKota?prov_id="+prov_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#kota1").empty();
              $("#kecamatan1").empty();
              $("#kota1").append('<option>---Pilih Kabupaten/Kota---</option>');
              $("#kecamatan1").append('<option>---Pilih Kecamatan---</option>');
              $.each(res,function(nama,kode){
                  $("#kota1").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#kota1").empty();
             $("#kecamatan1").empty();
          }
         }
      });
  }else{
      $("#kota1").empty();
      $("#kecamatan1").empty();
  }
 });

 $('#kota1').change(function(){
  var city_id = $(this).val();
  if(city_id){
      $.ajax({
         type:"GET",
         url:"/getKecamatan?city_id="+city_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#kecamatan1").empty();
              $("#kecamatan1").append('<option>---Pilih Kecamatan---</option>');
              $.each(res,function(nama,kode){
                  $("#kecamatan1").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#kecamatan1").empty();
          }
         }
      });
  }else{
      $("#kecamatan1").empty();
  }
 });

 $('#kecamatan1').change(function(){
  var dis_id = $(this).val();
  if(dis_id ){
      $.ajax({
         type:"GET",
         url:"/getDesa?dis_id="+dis_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#desa1").empty();
              $("#desa1").append('<option>---Pilih Desa---</option>');
              $.each(res,function(nama,kode){
                  $("#desa1").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#desa1").empty();
          }
         }
      });
  }else{
      $("#desa1").empty();
  }
 });

 $('#desa1').change(function(){
  var subdis_id = $(this).val();
  if(subdis_id ){
      $.ajax({
         type:"GET",
         url:"/getRw?subdis_id="+subdis_id,
         dataType: 'JSON',
         success:function(res){
          if(res){
              $("#rw1").empty();
              $("#rw1").append('<option>---Pilih RW---</option>');
              $.each(res,function(nama,kode){
                  $("#rw1").append('<option value="'+kode+'">'+nama+'</option>');
              });
          }else{
             $("#rw1").empty();
          }
         }
      });
  }else{
      $("#rw1").empty();
  }
 });


</script>


@include('sweetalert::alert')
@include('layouts.footer')

