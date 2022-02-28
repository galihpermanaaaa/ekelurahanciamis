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
                                               <input type="hidden" name="prov_id" value="12">
                                               <input type="hidden" name="city_id" value="168">
                                               <input type="hidden" name="dis_id" value="2160">
                                               <input type="hidden" name="subdis_id" value="25821">

                                            </div>

                  
                                            <div class="">
                                                <div class="form-group">
                                                <label>Rukun Warga</label>
                                                <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" required>
                                                <option selected>---Pilih RW---</option>
                                                @foreach ($rw as $rww)
                                                        <option  value="{{$rww->id_rw}}">{{$rww->nama_rw}}</option>
                                                    @endforeach
                                                </select>
                                                @error('nama_rw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <br>

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
                                            <br>
                                            
                                    </div>
                                </div>
                                <br>
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
                                               <input type="hidden" name="prov_id" value="12">
                                               <input type="hidden" name="city_id" value="168">
                                               <input type="hidden" name="dis_id" value="2160">
                                               <input type="hidden" name="subdis_id" value="25821">

                                            </div>

                  
                                            <div class="">
                                                <div class="form-group">
                                                <label>Rukun Warga</label>
                                                <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="id_rw" required>
                                                @foreach ($rw as $rww)
                                                        <option  value="{{$rww->id_rw}}">{{$rww->nama_rw}}</option>
                                                    @endforeach
                                                </select>
                                                @error('nama_rw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <br>    
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

@include('sweetalert::alert')
@include('layouts.footer')

