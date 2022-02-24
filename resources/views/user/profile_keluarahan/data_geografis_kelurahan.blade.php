@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
      <h1>Data Geografis Kelurahan Ciamis</h1>
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

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#geo" style="float: right;">
                Input Data
    </button>

    <br>
    <br>
    <section class="section contact">

      <div class="row gy-4">
      @foreach($data as $key => $item)
          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Jarak Kantor Desa / Kelurahan ke Kantor Camat</h3>
                <p>{{$item->jarak_kantor_desa}}</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Luas Wilayah Desa / Kelurahan</h3>
                <p>{{$item->luas_wilayah}}</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Lahan Kering:</h3>
                <p>Bangunan dan Pekarangan ( {{$item->bangunan_pekarangan}} )</p>
                <p>Ladang / Kebun ( {{$item->ladang_kebun}} )</p>
                <p>Kolam ( {{$item->kolam}} )</p>
                <p>Hutan rakyat ({{$item->hutan_rakyat}})</p>
                <p>Hutan Negara ({{$item->hutan_negara}})</p>
                <p>Lainnya ({{$item->lainnya}})</p>
                <h3>Lahan Sawah:</h3>
                <p>Berperairan Teknis ({{$item->berperairan_teknis}})</p>
                <p>Berperairan Sederhana / Desa ({{$item->berperairan_sederhana}})</p>
                <p>Tidak berperairan / tadah hujan ({{$item->tidak_berperairan}})</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-signpost-split"></i>
                <h3>Panjang Jalan Menurut Satuannya:</h3>
                <p>Nasional ({{$item->panjang_jalan_nasional}})</p>
                <p>Provinsi ({{$item->panjang_jalan_provinsi}})</p>
                <p>Kabupaten ({{$item->panjang_jalan_kabupaten}})</p>
                <p>Desa/Lokal ({{$item->panjang_jalan_desa}})</p>
                <h3>Panjang Jalan Menurut Kondisinya:</h3>
                <p>Hotmix ({{$item->hotmix}})</p>
                <p>Aspal ({{$item->aspal}})</p>
                <p>Batu ({{$item->batu}})</p>
                <p>Krikil ({{$item->tanah}})</p>
                <p>Jumlah Jembatan   ({{$item->jumlah_jembatan}})</p>
                <h3>Sungai Besar/Sedang:</h3>
                <p>Banyaknya ({{$item->itemsungai_besar_banyaknya}})</p>
                <p>Panjang ({{$item->sungai_besar_panjang}})</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>

    </section>

  </main><!-- End #main -->

  <div class="modal fade" id="geo" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Input Data Geografis Kelurahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_geografis') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                        <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Jarak Kantor Kelurahan</label>
                        <input type="text" class="form-control @error('jarak_kantor_desa') is-invalid @enderror" id="jarak_kantor_desa" name="jarak_kantor_desa" placeholder="Contoh: 0,8 Km" required/>
                        @error('jarak_kantor_desa')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jarak Wilayah Kelurahan</label>
                        <input type="text" class="form-control @error('luas_wilayah') is-invalid @enderror" id="luas_wilayah" name="luas_wilayah" placeholder="Contoh: 346,77 Ha" required />
                        @error('luas_wilayah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Bangun Pekarangan</label>
                        <input type="text" class="form-control @error('bangunan_pekarangan') is-invalid @enderror" id="bangunan_pekarangan" name="bangunan_pekarangan" placeholder="Contoh: 333 Ha" required>
                        @error('bangun_pekarangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Ladang Kebun</label>
                        <input type="text" class="form-control @error('ladang_kebun') is-invalid @enderror" id="ladang_kebun" name="ladang_kebun" placeholder="Contoh: 5 Ha" required>
                        @error('ladang_kebun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Kolam</label>
                        <input type="text" class="form-control @error('kolam') is-invalid @enderror" id="kolam" name="kolam" placeholder="Contoh: 400 Ha" required>
                        @error('kolam')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Hutan Rakyat</label>
                        <input type="text" class="form-control @error('hutan_rakyat') is-invalid @enderror" id="hutan_rakyat" name="hutan_rakyat" placeholder="Contoh: 5 Ha" required>
                        @error('hutan_rakyat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Hutan Negara</label>
                        <input type="text" class="form-control @error('hutan_negara') is-invalid @enderror" id="hutan_negara" name="hutan_negara" placeholder="Contoh: 400 Ha" required>
                        @error('hutan_negara')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Lainnya</label>
                        <input type="text" class="form-control @error('lainnya') is-invalid @enderror" id="lainnya" name="lainnya" placeholder="Contoh:Lapang 5 Ha" required>
                        @error('lainnya')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Berperairan Teknis</label>
                        <input type="text" class="form-control @error('berperairan_teknis') is-invalid @enderror" id="berperairan_teknis" name="berperairan_teknis" placeholder="Contoh: 400 Ha" required>
                        @error('berperairan_teknis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>


                    <div class="col-md-4">
                        <label class="form-label">Berperairan Sederhana</label>
                        <input type="text" class="form-control @error('berperairan_sederhana') is-invalid @enderror" id="berperairan_sederhana" name="berperairan_sederhana" placeholder="Contoh:5 Ha" required>
                        @error('berperairan_sederhana')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Tidak Berperairan</label>
                        <input type="text" class="form-control @error('tidak_berperairan') is-invalid @enderror" id="tidak_berperairan" name="tidak_berperairan" placeholder="Contoh:5 Ha" required>
                        @error('tidak_berperairan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                </div>

            <hr>
            <p>Panjang Jalan Menurut Satuannya:</p>
            <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Nasional</label>
                        <input type="text" class="form-control @error('panjang_jalan_nasional') is-invalid @enderror" id="panjang_jalan_nasional" name="panjang_jalan_nasional" placeholder="Contoh: 5 Km" required>
                        @error('panjang_jalan_nasional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>


                    <div class="col-md-3">
                        <label class="form-label">Provinsi</label>
                        <input type="text" class="form-control @error('panjang_jalan_provinsi') is-invalid @enderror" id="panjang_jalan_provinsi" name="panjang_jalan_provinsi" placeholder="Contoh:5 Km" required>
                        @error('panjang_jalan_provinsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Kabupaten</label>
                        <input type="text" class="form-control @error('panjang_jalan_kabupaten') is-invalid @enderror" id="panjang_jalan_kabupaten" name="panjang_jalan_kabupaten" placeholder="Contoh:5 Km" required>
                        @error('panjang_jalan_kabupaten')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Kelurahan</label>
                        <input type="text" class="form-control @error('panjang_jalan_desa') is-invalid @enderror" id="panjang_jalan_desa" name="panjang_jalan_desa" placeholder="Contoh:5 Km" required>
                        @error('panjang_jalan_desa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                </div>

            <hr>
            <p>Panjang Jalan Menurut Kondisinya:</p>
            <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Hotmix</label>
                        <input type="text" class="form-control @error('hotmix') is-invalid @enderror" id="hotmix" name="hotmix" placeholder="Contoh: 5 Km" required>
                        @error('hotmix')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>


                    <div class="col-md-3">
                        <label class="form-label">Aspal</label>
                        <input type="text" class="form-control @error('aspal') is-invalid @enderror" id="aspal" name="aspal" placeholder="Contoh:5 Km" required>
                        @error('aspal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Batu/Kerikil</label>
                        <input type="text" class="form-control @error('batu') is-invalid @enderror" id="batu" name="batu" placeholder="Contoh:5 Km" required>
                        @error('batu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanah</label>
                        <input type="text" class="form-control @error('tanah') is-invalid @enderror" id="tanah" name="tanah" placeholder="Contoh:5 Km" required>
                        @error('tanah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Jumlah Jembatan (dapat dilalui kendaraan roda 4 atau lebih</label>
                        <input type="text" class="form-control @error('jumlah_jembatan') is-invalid @enderror" id="jumlah_jembatan" name="jumlah_jembatan" placeholder="Contoh: 1 Bh" required>
                        @error('jumlah_jembatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>

          

                <hr>
                <p>Sungai Besar/Sedang:</p>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Sungai Panjangnnya</label>
                        <input type="text" class="form-control @error('sungai_besar_panjang') is-invalid @enderror" id="sungai_besar_panjang" name="sungai_besar_panjang" placeholder="Contoh: 1.800 Meter persegi" required>
                        @error('sungai_besar_panjang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Sungai Banyaknya</label>
                        <input type="text" class="form-control @error('sungai_besar_banyaknya') is-invalid @enderror" id="sungai_besar_banyaknya" name="sungai_besar_banyaknya" placeholder="Contoh: 3 Sungai" required>
                        @error('sungai_besar_banyaknya')
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
<!-- Modal Janda -->
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

