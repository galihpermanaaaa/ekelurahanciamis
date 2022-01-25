@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
@include('puskesmas.pengantaran.image')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                {{-- message --}}
                {!! Toastr::message() !!}
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                           
                           
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img src="{{ URL::to('/images/'. $data[0]->users->avatar) }}" alt="{{ $data[0]->users->avatar }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                           
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0">{{ $data[0]->users->name }}</h3>
                                                    <h6 class="text-muted">{{ $data[0]->users->role_name }}</h6>
                                                </div>
                                               
                                                
                                                <div class="profile-info-left">
                                                    <h6 class="user-name m-t-0 mb-0">Puskesmas {{ $data[0]->users->wilayah_kerja->nama_puskesmas }}</h3>
                                                </div>
                                                
                                            </div>

                                            
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Email</div>
                                                        <div class="text">{{ $data[0]->users->email }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">No. Telp:</div>
                                                        <div class="text">{{ $data[0]->users->phone_number }}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Status Akun:</div>
                                                        <div class="text">{{ $data[0]->users->status }}</a></div>
                                                    </li>
                                                   
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content">
                
                    <!-- Profile Info Tab -->
                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Data Personal <a href="#" class="edit-icon"  data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <ul class="personal-info">
                                       
                                            <li>
                                                <div class="title">Nama Lengkap:</div>
                                                <div class="text">{{ $data[0]->nama }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Nomor Induk Kependudukan:</div>
                                                <div class="text">{{ $data[0]->nik }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Nomor BPJS Kesehatan:</div>
                                                <div class="text">{{ $data[0]->no_bpjs }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Jenis Kelamin:</div>
                                                <div class="text">{{ $data[0]->jenis_kelamin }}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Tempat Lahir:</div>
                                                <div class="text">{{ $data[0]->tempat_lahir }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Tanggal Lahir:</div>
                                                <div class="text">{{tanggal_indonesia($data[0]->tanggal_lahir)}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Agama:</div>
                                                <div class="text">{{ $data[0]->agama }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Status Perkawinan:</div>
                                                <div class="text">{{ $data[0]->status }}</div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <h5 class="section-title"></h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Foto Formal:</div>
                                                <div class="text" text-align="center"> <img id="myImg" src="{{ URL::to('/images/'. $data[0]->image) }}" alt="" width="20%" height="30%">
                                                    <P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
                                                    <div id="myModal" class="modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content" id="img01">
                                                    <div id="caption"></div>
                                                    </div>
                                                </div>
                                            </li>
                                
                                            <li>
                                                <div class="title">Tinggi Badan:</div>
                                                <div class="text">{{ $data[0]->tinggi_badan }} cm</div>
                                            </li>
                                            <li>
                                                <div class="title">Berat Badan:</div>
                                                <div class="text">{{ $data[0]->berat_badan }} kg</div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <h5 class="section-title">Alamat:</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">RT:</div>
                                                <div class="text">{{ $data[0]->rt }}</div>
                                            </li>
                                            <li>
                                                <div class="title">RW:</div>
                                                <div class="text">{{ $data[0]->rw }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Desa/Kelurahan:</div>
                                                <div class="text">{{ $data[0]->subdistricts->subdis_name }} </div>
                                            </li>
                                            <li>
                                                <div class="title">Kecamatan:</div>
                                                <div class="text">{{ $data[0]->districts->dis_name }} </div>
                                            </li>

                                            <li>
                                                <div class="title">Kota:</div>
                                                <div class="text">{{ $data[0]->cities->city_name }} </div>
                                            </li>

                                            <li>
                                                <div class="title">Provinsi:</div>
                                                <div class="text">{{ $data[0]->provinces->prov_name }} </div>
                                            </li>

                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
         
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts/footer')

    <script type="text/javascript">

$('#profile_info').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Name = button.data('namee') 
var Email = button.data('emaill')
var Phone = button.data('phone')
var Avatar = button.data('avatar')

var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #name').val(Name)
modal.find('.modal-body #email').val(Email)
modal.find('.modal-body #phone_number').val(Phone)
modal.find('.modal-body #avatar').val(Avatar)
})

</script>

<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>