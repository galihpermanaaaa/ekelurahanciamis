<!-- Modal Domisili Menu -->
<div class="modal fade" id="modalkdp_menu" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Surat Keterangan Domisili Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


 <div class="d-grid gap-2">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalkdp_cek">Cek Surat Keterangan Domisili Perusahaan</button>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalkdp_buat">Buat Surat Keterangan Domisili Perusahaan</button>
  </div>
            </div>
        </div>
    </div>
  </div>


    <!-- Modal Janda Menu -->
     <!-- Modal Janda Cek -->
  <div class="modal fade" id="modalkdp_cek" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Surat Keterangan Domisili Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="form" method="get" action="{{ route('layanan/domisiliPT') }}">
                    <h3 class="h4 text-white mb-4">Check Surat</h3>
                    <div class="form-group">
                      <input type="text"  class="form-control" id="token" name="token" placeholder="Masukkan token yang sudah anda dapatkan">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-pill" value="Lihat Surat">
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>







    <!-- Modal Janda Cek -->
  <!-- Modal Janda Buat -->
<div class="modal fade" id="modalkdp_buat" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Surat Keterangan Domisili Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_domisili_pt') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                        <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lembaga</label>
                        <input type="text" class="form-control @error('nama_lembaga') is-invalid @enderror" id="nama_lembaga" name="nama_lembaga" placeholder="Nama Lembaga" required/>
                        <input type="hidden" class="form-control" id="verifikasi" name="verifikasi" value="Belum Diverifikasi" readonly  />
                        <input type="hidden" class="form-control" id="tanggal_buat_surat" name="tanggal_buat_surat" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" readonly />
                        @error('nama_lembaga')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">NPWP</label>
                        <input type="number" class="form-control @error('npwp_pt') is-invalid @enderror" id="npwp_pt" name="npwp_pt" placeholder="Nomor NPWP" required />
                        @error('npwp_pt')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pimpinan</label>
                        <input type="text" class="form-control @error('pimpinan') is-invalid @enderror" id="pimpinan" name="pimpinan" placeholder="Pimpinan" required>
                        @error('pimpinan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Surat Keterangan Dari</label>
                        <input type="text" class="form-control @error('surat_keterangan_dari') is-invalid @enderror" id="surat_keterangan_dari" name="surat_keterangan_dari" placeholder="Contoh: RT/RW 001" required>
                        @error('surat_keterangan_dari')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>





                </div>

            <div class="row">



                    <div class="col-md-12">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Aktif" required />
                        @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>





            </div>




            <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Provinsi</label>
                        <select class="form-control @error('prov_id') is-invalid @enderror" name="prov_id" id="provinsi9" required>
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
                    <div class="col-md-3">
                        <label class="form-label">Kabupaten/Kota</label>
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="kota9" required>
                                                        <option selected>---Pilih Kabupaten/Kota---</option>
                                                </select>
                                                @error('city_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Kecamatan</label>
                        <select class="form-control @error('dis_id') is-invalid @enderror" name="dis_id" id="kecamatan9" required>
                                                    <option selected>---Pilih Kecamatan---</option>
                                                </select>
                                                @error('dis_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
            </div>

            <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Desa/Kelurahan</label>
                        <select class="form-control @error('subdis_id') is-invalid @enderror" name="subdis_id" id="desa9" required>
                                                    <option selected>---Pilih Desa/Kelurahan---</option>
                                                </select>
                                                @error('subdis_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">RW</label>
                        <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="rw9" required>
                                                    <option selected>--Pilih RW--</option>
                                                </select>
                                                @error('id_rw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">RT</label>
                        <select class="form-control @error('rt_asal') is-invalid @enderror" name="rt" id="rt" required>
                        <option selected disabled>--Pilih RT--</option>
                        <script>

                            for(i=1;i<=132;i++){
                                $rt = i;
                                if ($rt < 10) {
                                document.write("<option> 00" + i + "</option>");
                            } else if($rt < 100){
                               document.write("<option> 0" + i + "</option>");
                            }else{
                                document.write("<option> " + i + "</option>");
                            }

                        }
                        </script>
                        </select>



                        @error('rt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
            </div>




            <hr>
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Upload KTP</label>
                        <input type="file" class="form-control @error('ktp') is-invalid @enderror" id="ktp" name="ktp" accept="image/png, image/jpg, image/jpeg" placeholder="KTP" required />
                        @error('ktp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upload KK</label>
                        <input type="file" class="form-control @error('kk') is-invalid @enderror" id="kk" name="kk" accept="image/png, image/jpg, image/jpeg" placeholder="KK" required />
                        @error('kk')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Upload NPWP</label>
                        <input type="file" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" accept="image/png, image/jpg, image/jpeg" placeholder="NPWP" required />
                        @error('npwp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Upload Surat Keterangan</label>
                        <input type="file" class="form-control @error('surat_keterangan_rt') is-invalid @enderror" id="surat_keterangan_rt" name="surat_keterangan_rt" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Keterangan RT/RW" required />
                        @error('surat_keterangan_rt')
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


<script>
 $(document).ready(function(){
        $('#ktp').change(function(){
               var memberImgfl = $("#ktp");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#ktp').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#kk').change(function(){
               var memberImgfl = $("#kk");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#kk').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#surat_keterangan_rt').change(function(){
               var memberImgfl = $("#surat_keterangan_rt");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#surat_keterangan_rt').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#npwp').change(function(){
               var memberImgfl = $("#npwp");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#npwp').val('');
               }
           }
        });
    });
</script>


