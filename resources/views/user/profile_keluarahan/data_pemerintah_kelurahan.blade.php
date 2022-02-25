@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">


    <div class="pagetitle">
      <h1>Data Pemerintahan Keluarahan Ciamis</h1>
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

@php
    $data1 = \App\Models\DataPemerintah::first();
    @endphp
    @if(!$data1)
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pem" style="float: right;">Input Data</button>
    @endif

    @foreach($data as $key => $item)
    <button type="button" class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#pem_update"
    data-id="{{$item->id}}"
    data-jumlahrt="{{$item->jumlah_rt}}"
    data-jumlahrw="{{$item->jumlah_rw}}"
    data-jumlahdusun="{{$item->jumlah_dusun}}"
    data-lurah="{{$item->jumlah_lurah}}"
    data-seklur="{{$item->jumlah_seklur}}"
    data-kepalaseksi="{{$item->jumlah_kepala_seksi}}"
    data-pelaksana="{{$item->jumlah_pelaksana}}"
    data-kepalalingkungan="{{$item->jumlah_kepala_lingkungan}}"
    data-bpd="{{$item->jumlah_anggota_bpd}}"
    data-lpm="{{$item->jumlah_anggota_lpm}}"
    style="float: right;"><i class="bi bi-edit"></i> Update</button>
    @endforeach

    <br>
    <br>
    <section class="section contact">

      <div class="row gy-4">
      @foreach($data as $key => $item)
          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-person"></i>
                <h3>Data RT/RW dan Dusun</h3>
                <p>Jumlah RT ({{$item->jumlah_rt}}) RT</p>
                <p>Jumlah RT ({{$item->jumlah_rw}}) RW</p>
                <p>Jumlah Dusun ({{$item->jumlah_dusun}}) Lingkungan</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-person"></i>
                <h3>Jumlah Perangkat Kelurahan:</h3>
                <p>Lurah ( {{$item->jumlah_lurah}} ) Orang</p>
                <p>Sekertaris Lurah ( {{$item->jumlah_seklur}} ) Orang</p>
                <p>Kepala Seksi ( {{$item->jumlah_kepala_seksi}} ) Orang</p>
                <p>Pelaksana ({{$item->jumlah_pelaksana}}) Orang</p>
                <p>Kepala Lingkungan ({{$item->jumlah_kepala_lingkungan}}) Orang</p>
              
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-person"></i>
                <h3>Jumlah Anggota BPD/LPM:</h3>
                <p>BPD ({{$item->jumlah_anggota_bpd}}) Orang</p>
                <p>LPM ({{$item->jumlah_anggota_lpm}}) Orang</p>
              </div>
            </div>
          </div>
         
          @endforeach
        </div>

      </div>

    </section>

  </main><!-- End #main -->


<div id="pem_update" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Edit Data Pemerintah Kelurahan Ciamis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                    <form action="{{ route('update_pemerintah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container col-md-12">
                        <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Jumlah RT</label>
                        <input type="hidden" id="id" name="id">
                        <input type="number" class="form-control @error('jumlah_rt') is-invalid @enderror" id="jumlah_rt" name="jumlah_rt" required/>
                        @error('jumlah_rt')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah RW</label>
                        <input type="number" class="form-control @error('jumlah_rw') is-invalid @enderror" id="jumlah_rw" name="jumlah_rw"  required />
                        @error('jumlah_rw')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Dusun</label>
                        <input type="jumlah_dusun" class="form-control @error('jumlah_dusun') is-invalid @enderror" id="jumlah_dusun" name="jumlah_dusun"  required />
                        @error('jumlah_dusun')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>
                <hr>
                <P>Jumlah Perangkat Kelurahan:</p>

                <div class="row">
                <div class="col-md-6">
                        <label class="form-label">Jumlah Lurah</label>
                        <input type="number" class="form-control @error('jumlah_lurah') is-invalid @enderror" id="jumlah_lurah" name="jumlah_lurah" required/>
                        @error('jumlah_lurah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Sekretaris Lurah</label>
                        <input type="number" class="form-control @error('jumlah_seklur') is-invalid @enderror" id="jumlah_seklur" name="jumlah_seklur"  required />
                        @error('jumlah_seklur')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Kepala Seksi</label>
                        <input type="number" class="form-control @error('jumlah_kepala_seksi') is-invalid @enderror" id="jumlah_kepala_seksi" name="jumlah_kepala_seksi"  required />
                        @error('jumlah_kepala_seksi')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Kepala Lingkungan</label>
                        <input type="number" class="form-control @error('jumlah_kepala_lingkungan') is-invalid @enderror" id="jumlah_kepala_lingkungan" name="jumlah_kepala_lingkungan"  required />
                        @error('jumlah_kepala_lingkungan')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Pelaksana</label>
                        <input type="number" class="form-control @error('jumlah_pelaksana') is-invalid @enderror" id="jumlah_pelaksana" name="jumlah_pelaksana"  required />
                        @error('jumlah_pelaksana')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>
                <P>Jumlah BPD/LPM:</p>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota BPD</label>
                        <input type="number" class="form-control @error('jumlah_anggota_bpd') is-invalid @enderror" id="jumlah_anggota_bpd" name="jumlah_anggota_bpd" required/>
                        @error('jumlah_anggota_bpd')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota LPM</label>
                        <input type="number" class="form-control @error('jumlah_anggota_lpm') is-invalid @enderror" id="jumlah_anggota_lpm" name="jumlah_anggota_lpm" required/>
                        @error('jumlah_anggota_lpm')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                    <div class="modal-footer d-block">
                        <button type="update" class="btn btn-warning float-end" >Update</button>
                    </div>
                    </div>
                     </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pem" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Input Data Pemerintahan Kelurahan Ciamis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_pemerintah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                        <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Jumlah RT</label>
                        <input type="number" class="form-control @error('jumlah_rt') is-invalid @enderror" id="jumlah_rt" name="jumlah_rt" required/>
                        @error('jumlah_rt')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah RW</label>
                        <input type="number" class="form-control @error('jumlah_rw') is-invalid @enderror" id="jumlah_rw" name="jumlah_rw"  required />
                        @error('jumlah_rw')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Dusun</label>
                        <input type="jumlah_dusun" class="form-control @error('jumlah_dusun') is-invalid @enderror" id="jumlah_dusun" name="jumlah_dusun"  required />
                        @error('jumlah_dusun')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>
                <hr>
                <P>Jumlah Perangkat Kelurahan:</p>

                <div class="row">
                <div class="col-md-6">
                        <label class="form-label">Jumlah Lurah</label>
                        <input type="number" class="form-control @error('jumlah_lurah') is-invalid @enderror" id="jumlah_lurah" name="jumlah_lurah" required/>
                        @error('jumlah_lurah')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Sekretaris Lurah</label>
                        <input type="number" class="form-control @error('jumlah_seklur') is-invalid @enderror" id="jumlah_seklur" name="jumlah_seklur"  required />
                        @error('jumlah_seklur')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Kepala Seksi</label>
                        <input type="number" class="form-control @error('jumlah_kepala_seksi') is-invalid @enderror" id="jumlah_kepala_seksi" name="jumlah_kepala_seksi"  required />
                        @error('jumlah_kepala_seksi')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Kepala Lingkungan</label>
                        <input type="number" class="form-control @error('jumlah_kepala_lingkungan') is-invalid @enderror" id="jumlah_kepala_lingkungan" name="jumlah_kepala_lingkungan"  required />
                        @error('jumlah_kepala_lingkungan')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Pelaksana</label>
                        <input type="number" class="form-control @error('jumlah_pelaksana') is-invalid @enderror" id="jumlah_pelaksana" name="jumlah_pelaksana"  required />
                        @error('jumlah_pelaksana')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>
                <P>Jumlah BPD/LPM:</p>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota BPD</label>
                        <input type="number" class="form-control @error('jumlah_anggota_bpd') is-invalid @enderror" id="jumlah_anggota_bpd" name="jumlah_anggota_bpd" required/>
                        @error('jumlah_anggota_bpd')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota LPM</label>
                        <input type="number" class="form-control @error('jumlah_anggota_lpm') is-invalid @enderror" id="jumlah_anggota_lpm" name="jumlah_anggota_lpm" required/>
                        @error('jumlah_anggota_lpm')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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

$('#pem_update').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var JumlahRT = button.data('jumlahrt')
var JumlahRW = button.data('jumlahrw')
var JumlahDusun = button.data('jumlahdusun')
var Lurah = button.data('lurah')
var Seklur = button.data('seklur')
var KepalaSeksi = button.data('kepalaseksi')
var Pelaksana = button.data('pelaksana')
var KepalaLingkungan = button.data('kepalalingkungan')
var Bpd = button.data('bpd')
var Lpm = button.data('lpm')


var modal = $(this)
modal.find('.modal-body #id').val(ID)
modal.find('.modal-body #jumlah_rt').val(JumlahRT)
modal.find('.modal-body #jumlah_rw').val(JumlahRW)
modal.find('.modal-body #jumlah_dusun').val(JumlahDusun)
modal.find('.modal-body #jumlah_lurah').val(Lurah)
modal.find('.modal-body #jumlah_seklur').val(Seklur)
modal.find('.modal-body #jumlah_kepala_seksi').val(KepalaSeksi)
modal.find('.modal-body #jumlah_pelaksana').val(Pelaksana)
modal.find('.modal-body #jumlah_kepala_lingkungan').val(KepalaLingkungan)
modal.find('.modal-body #jumlah_anggota_bpd').val(Bpd)
modal.find('.modal-body #jumlah_anggota_lpm').val(Lpm)




});

</script>

@include('sweetalert::alert')
@include('layouts.footer')
