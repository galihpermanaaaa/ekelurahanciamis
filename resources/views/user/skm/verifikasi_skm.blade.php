@include('layouts.header')
@include('layouts.sidebar')
@include('user.skm.image')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Verifikasi Pembuatan Surat SKU</h1>
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
                <h3>Kartu Keluarga</h3>
                <p><img id="myImg1" src="{{ URL::to('/kk_skm/'. $data[0]->kk) }}" alt="" width="20%" height="30%">
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
                <h3>Surat Pengantar RT/RW</h3>
                <p><img id="myImg2" src="{{ URL::to('/surat_pengantar_rt_rw_skm/'. $data[0]->surat_pengantar_rt_rw) }}" alt="" width="20%" height="30%">
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
                <h3>Surat Pernyataan Miskin</h3>
                <p><img id="myImg3" src="{{ URL::to('/surat_pernyataan_miskin_skm/'. $data[0]->surat_pernyataan_miskin) }}" alt="" width="20%" height="30%">
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
          <form action="{{ route('verifikasi_skm_skm') }}" method="POST" enctype="multipart/form-data">
             @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="{{ $data[0]->nama }}"  required readonly>
                  <input type="hidden" name="id" class="form-control" value="{{ $data[0]->id }}"  required readonly>
                  <input type="hidden" name="token" class="form-control" value="{{ $data[0]->token }}"  required readonly>
                </div>

                <div class="col-md-6">
                  <label>Nomor Induk Kependudukan</label>
                  <input type="number" class="form-control" value="{{ $data[0]->nik}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Nomor BDT</label>
                  <input type="number" class="form-control" value="{{ $data[0]->nomor_bdt}}" required readonly>
                  <input type="hidden" name="nomor_bdt" class="form-control" value="{{ $data[0]->nomor_bdt}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" value="{{ $data[0]->	tempat_lahir}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" value="{{tanggal_indonesia($data[0]->tanggal_lahir)}}" required readonly>
                  <input type="hidden" class="form-control" name="tanggal_lahir" value="{{$data[0]->tanggal_lahir}}" required readonly>
                </div>

                <hr>

                <div class="col-md-6">
                  <label>RT</label>
                  <input type="text" class="form-control" name="rt" value="{{ $data[0]->rt}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>RW</label>
                  <input type="text" class="form-control" value="{{ $data[0]->rw->nama_rw}}" required readonly>
                  <input type="hidden" name="id_rw" class="form-control" value="{{ $data[0]->id_rw}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Kelurahan/Desa</label>
                  <input type="text" class="form-control" value="{{ $data[0]->subdistricts->subdis_name}}" required readonly>
                  <input type="hidden" name="subdis_id" class="form-control" value="{{ $data[0]->subdis_id}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Kecamatan</label>
                  <input type="text" class="form-control" value="{{ $data[0]->districts->dis_name}}" required readonly>
                  <input type="hidden" name="dis_id" class="form-control" value="{{ $data[0]->dis_id}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Kabupaten/Kota</label>
                  <input type="text" class="form-control" value="{{ $data[0]->cities->city_name}}" required readonly>
                  <input type="hidden" name="city_id" class="form-control" value="{{ $data[0]->city_id}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Provinsi</label>
                  <input type="text" class="form-control" value="{{ $data[0]->provinces->prov_name}}" required readonly>
                </div>

                <hr>

                <div class="col-md-6">
                  <label>Hubungan Keluarga</label>
                  <input type="text" class="form-control" value="{{ $data[0]->hubungan_keluarga}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Nama Keluarga</label>
                  <input type="text" class="form-control" value="{{ $data[0]->nama_kel}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>NIK Keluarga</label>
                  <input type="number" class="form-control" value="{{ $data[0]->nik_kel}}" required readonly>
                </div>


                <div class="col-md-6">
                  <label>Tempat Lahir Keluarga</label>
                  <input type="text"  class="form-control" value="{{ $data[0]->tempat_kel}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Tanggal Lahir Keluarga</label>
                  <input type="date" class="form-control" value="{{ $data[0]->tanggal_lahir_kel}}" required readonly>
                </div>

                <div class="col-md-12">
                    <label>Alamat Keluarga</label>
                   <textarea class="form-control">{{ $data[0]->alamat_kel}}</textarea>
                        @error('alamat')
                         <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                </div>

                <hr>



                <div class="col-md-6">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="{{ $data[0]->email}}" required readonly>
                </div>
                

                <div class="col-md-6">
                  <label>Tanggal Membuat Surat</label>
                  <input type="text" class="form-control" value="{{ tanggal_indonesia($data[0]->tanggal_buat_surat)}}" required readonly>
                  <input type="hidden" name="tanggal_buat_surat" class="form-control" value="{{$data[0]->tanggal_buat_surat}}" required readonly>
                </div>

                <div class="col-md-6">
                  <label>Nama User Yang Akan Verifikasi</label>
                  <input type="text" class="form-control" value="{{Auth::user()->name}}" required readonly>
                  <input type="hidden" name="id_users" class="form-control" value="{{Auth::user()->id}}" required readonly>
                  <input type="hidden" class="form-control" id="tanggal_verifikasi" name="tanggal_verifikasi" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" readonly />
                </div>

                <div class="col-md-12">
                    <label>Status Verifikasi</label>
                    <p>Status Sebelumnya: {{($data[0]->verifikasi)}}</p>
                    <select class="form-control @error('verifikasi') is-invalid @enderror" name="verifikasi" id="select-item-item" required>
                    <option selected disabled>--Silahkan Lakukan Verifikasi--</option>
                        <option value="Terverifikasi">Terverifikasi</option>
                        <option value="Ditolak">Ditolak</option>
                        </select>
                        @error('verifikasi')
                         <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                </div>

            <br>
                <div class="col-md-12">
                    <label>Keterangan(alasan Ditolak/Diterima)</label>
                   <textarea name="deskripsi" class="form-control"></textarea>
                        @error('deskripsi')
                         <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                </div>

            <br>
              

                <div class="submit-section text-center">
                    <button class="btn btn-primary submit-btn" type="submit" >Verifikasi</button>
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
var span = document.getElementsByClassName("close")[1];

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
var span = document.getElementsByClassName("close")[2];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>



<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal4");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg4");
var modalImg = document.getElementById("img04");
var captionText = document.getElementById("caption4");
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


