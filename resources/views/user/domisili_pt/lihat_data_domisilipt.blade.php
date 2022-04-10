@include('layouts.header')
@include('layouts.sidebar')
@include('user.kematian.image')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>hasil Verifikasi Surat Keterangan Domisili Perusahaan/Lembaga</h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-wallet"></i>
                <h3>Kartu Tanda Penduduk Pimpinan Perusahaan/Lembaga</h3>
                <p>
                <img id="myImg" src="{{ URL::to('/domisilipt/ktp/'. $data[0]->ktp) }}" alt="" width="20%" height="30%">
										<P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
										<div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img0">
                                        <div id="caption"></div>
                                        </div>
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-wallet"></i>
                <h3>Kartu Keluarga Pimpinan Perusahaan/Lembaga</h3>
                <p><img id="myImg1" src="{{ URL::to('/domisilipt/kk/'. $data[0]->kk) }}" alt="" width="20%" height="30%">
										<P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
										<div id="myModal1" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img01">
                                        <div id="caption1"></div>
                                        </div></p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-wallet"></i>
                <h3>NPWP Perusahaan</h3>
                <p><img id="myImg2" src="{{ URL::to('/domisilipt/npwp/'. $data[0]->npwp) }}" alt="" width="20%" height="30%">
										<P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
										<div id="myModal2" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img02">
                                        <div id="caption2"></div>
                                        </div></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-wallet"></i>
                <h3>Surat Pengantar RT/RW</h3>
                <p><img id="myImg3" src="{{ URL::to('/domisilipt/surat_keterangan_rt/'. $data[0]->surat_keterangan_rt) }}" alt="" width="20%" height="30%">
										<P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
										<div id="myModal3" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img03">
                                        <div id="caption3"></div>
                                        </div></p>
              </div>
            </div>
          </div>

        </div>
 

        <div class="col-xl-6">
          <div class="card p-4">
          <form action="" method="POST" enctype="multipart/form-data">
             @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <label>Nama Lembaga</label>
                  <input type="text"  class="form-control" value="{{ $data[0]->nama_lembaga }}"  required readonly>
                </div>

                <div class="col-md-6">
                  <label>NPWP</label>
                  <input type="text" name="nama" class="form-control" value="{{ $data[0]->npwp_pt }}"  required readonly>
                </div>

                <div class="col-md-6">
                  <label>Nama Pimpinan</label>
                  <input type="text" name="nama" class="form-control" value="{{ $data[0]->pimpinan }}"  required readonly>
                </div>

                <div class="col-md-6">
                  <label>Email Pimpinan/Perusahaan</label>
                  <input type="email" name="email" class="form-control" value="{{ $data[0]->email}}" required readonly>
                </div>

               
                <div class="col-md-6">
                  <label>Surat Keterangan Dari</label>
                  <input type="text" class="form-control" value="{{ $data[0]->surat_keterangan_dari}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Token Surat Pelaporan</label>
                  <input type="text" name="token" class="form-control" value="{{ $data[0]->token }}"  required readonly>
                </div>

                <hr>
                <p>Alamat yang Lembaga/Perusahaan</p>

                <div class="col-md-6">
                  <label>Nama Jalan</label>
                  <input type="text" class="form-control" value="{{ $data[0]->nama_jalan}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>RT</label>
                  <input type="text" class="form-control" name="rt" value="{{ $data[0]->rt}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>RW</label>
                  <input type="text" class="form-control" value="{{ $data[0]->rw->nama_rw}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Kelurahan/Desa</label>
                  <input type="text" class="form-control" value="{{ $data[0]->subdistricts->subdis_name}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Kecamatan</label>
                  <input type="text" class="form-control" value="{{ $data[0]->districts->dis_name}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Kabupaten/Kota</label>
                  <input type="text" class="form-control" value="{{ $data[0]->cities->city_name}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Provinsi</label>
                  <input type="text" class="form-control" value="{{ $data[0]->provinces->prov_name}}" required readonly>
                </div>

                <hr>
              
                <div class="col-md-6">
                  <label>Tanggal Membuat Surat</label>
                  <input type="text" class="form-control" value="{{ tanggal_indonesia($data[0]->tanggal_buat_surat)}}" required readonly>
                </div>

                @if (Auth::check() && Auth::user()->role_name == 'Verifikator')
                <div class="col-md-6">
                  <label>Nama User Yang Memverifikasi</label>
                  <input type="text" class="form-control" value="{{ $data[0]->users->name}}" required readonly>
                </div>
                @endif

                <div class="col-md-6">
                  <label>Tanggal Diverifikasi</label>
                  <input type="text" class="form-control" id="tanggal_verifikasi" name="tanggal_verifikasi" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" readonly />
                </div>

                <div class="col-md-6">
                  <label>Status Diverifikasi</label>
                  <input type="text" class="form-control" value="{{ $data[0]->verifikasi}}" readonly />
                </div>

            <br>
                <div class="col-md-12">
                    <label>Keterangan</label>
                   <textarea name="deskripsi" class="form-control" readonly>{{ $data[0]->deskripsi}}</textarea>
                </div>

            <br>
              

                <div class="submit-section text-center">
                <a href="{{ route('user/domisili_pt/data_domisilipt') }}" class="btn btn-danger btn-sm">Kembali</a>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->



@include('layouts.footer')

<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img0");
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


<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal1");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg1");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption1");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal2");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg2");
var modalImg = document.getElementById("img02");
var captionText = document.getElementById("caption2");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[2];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>



<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal3");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg3");
var modalImg = document.getElementById("img03");
var captionText = document.getElementById("caption3");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[3];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>