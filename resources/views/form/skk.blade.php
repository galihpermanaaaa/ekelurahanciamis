<!-- Modal Domisili Menu -->
<div class="modal fade" id="modalkematian_menu" tabindex="-1" aria-labelledby="modalkematian" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkematian">Surat Keterangan Kematian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


 <div class="d-grid gap-2">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalkematian_cek">Cek Surat Keterangan Kematian</button>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalkematian_buat">Buat Surat Keterangan Kematian</button>
  </div>
            </div>
        </div>
    </div>
  </div>


    <!-- Modal Janda Menu -->
     <!-- Modal Janda Cek -->
  <div class="modal fade" id="modalkematian_cek" tabindex="-1" aria-labelledby="modalkematian" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkematian">Surat Keterangan Kematian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="form" method="get" action="{{ route('layanan/kematian') }}">
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
<div class="modal fade" id="modalkematian_buat" tabindex="-1" aria-labelledby="modalkematian" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkematian">Surat Keterangan Kematian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_kematian') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                        <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nama Yang Meninggal</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Anda" required/>
                        <input type="hidden" class="form-control" id="verifikasi" name="verifikasi" value="Belum Diverifikasi" readonly  />
                        <input type="hidden" class="form-control" id="tanggal_buat_surat" name="tanggal_buat_surat" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" readonly />
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">NIK Yang Meninggal</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Nomor Induk Kependudukan Anda" required />
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            <div class="row">

            <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir yang meninggal" required />
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir Yang Meninggal</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required />
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>

            </div>

            <div class="row">
            <div class="col-md-6">
                        <label for="pet-select">Pilih Jenis Kelamin:</label>
                        <select  class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk-select" required>
                        <option value="">--Pilih Jenis Kelamin Anda--</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jk')
                         <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                         @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Agama Yang Meninggal</label>
                        <select  class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama" required>
                        <option value="">--Pilih Agama Anda--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghuchu">Konghuchu</option>
                        </select>
                        @error('agama')
                         <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pekerjaan Yang Meninggal</label>
                        <select  class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="select-item" required>
                        <option value="">--Pilih Pekerjaan Almarhum--</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="PNS">PNS</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="Buruh">Buruh</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Bidan">Bidan</option>
                        <option value="TNI">TNI</option>
                        <option value="Polisi">Polisi</option>
                        <option value="Petani">Petani</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Karyawan Honorer">Karyawan Honorer</option>
                        <option value="Karyawan BUMN">Karyawan BUMN</option>
                        <option value="Karyawan BUMD">Karyawan BUMD</option>
                        <option value="Anggota DPRD">Anggota DPRD</option>
                        <option value="Belum Bekerja">Belum Bekerja</option>
                        </select>
                        @error('pekerjaan')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                          </span>
                         @enderror
                    </div>

                    
                    <div class="col-md-6">
                        <label class="form-label">Kewarganegaraan Yang Meninggal</label>
                        <select  class="form-control @error('status_kewarganegaraan') is-invalid @enderror" name="status_kewarganegaraan" id="status_kewarganegaraan" required>
                        <option value="">--Pilih Status Kewarganegaraan Anda--</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>

                        </select>
                        @error('status_kewarganegaraan')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Perkawinan</label>
                        <select  class="form-control @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" id="status_perkawinan" required>
                        <option value="">--Pilih Status Perkawinan Anda--</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Duda">Duda</option>
                        <option value="Janda">Janda</option>
                        </select>
                        @error('status_perkawinan')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

            </div>
            <hr>
            <P>Alamat yang meninggal </p>
            <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Provinsi </label>
                        <select class="form-control @error('prov_id') is-invalid @enderror" name="prov_id" id="provinsi8" required>
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
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="kota8" required>
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
                        <select class="form-control @error('dis_id') is-invalid @enderror" name="dis_id" id="kecamatan8" required>
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
                        <select class="form-control @error('subdis_id') is-invalid @enderror" name="subdis_id" id="desa8" required>
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
                        <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="rw8" required>
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
                            var rt_asal = 1;
                            for(i=1;i<=132;i++){
                                document.write("<option>" + i + "</option>");
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
                        <label class="form-label">Lingkungan</label>
                        <input type="text" class="form-control @error('lingkungan') is-invalid @enderror" id="lingkungan" name="lingkungan" placeholder="Lingkungan yang meninggal" required>
                        @error('pengantar_dari')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pengantar Dari RT</label>
                        <input type="number" class="form-control @error('pengantar_dari_rt') is-invalid @enderror" id="pengantar_dari_rt" name="pengantar_dari_rt" placeholder="Contoh: 001" required>
                        @error('pengantar_dari_rt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pengantar Dari RW</label>
                        <input type="number" class="form-control @error('pengantar_dari_rw') is-invalid @enderror" id="pengantar_dari_rw" name="pengantar_dari_rw" placeholder="Contoh: 002" required>
                        @error('pengantar_dari_rw')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

            <div class="col-md-6">
                        <label class="form-label">Tanggal Meninggal</label>
                        <input type="date" class="form-control @error('tanggal_meninggal') is-invalid @enderror" id="tanggal_meninggal" name="tanggal_meninggal" required>
                        @error('tanggal_meninggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Meninggal Disebabkan</label>
                        <input type="text" class="form-control @error('disebabkan') is-invalid @enderror" id="disebabkan" name="disebabkan" required>
                        @error('disebabkan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tempat Meninggal</label>
                        <input type="text" class="form-control @error('ditempat') is-invalid @enderror" id="ditempat" name="ditempat" required>
                        @error('ditempat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Surat Keterangan ini diperlukan untuk</label>
                        <input type="text" class="form-control @error('surat_diperlukan_untuk') is-invalid @enderror" id="surat_diperlukan_untuk" name="surat_diperlukan_untuk" required>
                        @error('surat_diperlukan_untuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Pelapor</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Anda Sebagai Pelapor" required />
                        @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
            </div>
           

            <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Upload KTP Yang Meninggal</label>
                        <input type="file" class="form-control @error('ktp_almarhum') is-invalid @enderror" id="ktp_almarhum" name="ktp_almarhum" accept="image/png, image/jpg, image/jpeg" placeholder="KTP" required />
                        @error('ktp_almarhum')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upload KK Yang Meninggal</label>
                        <input type="file" class="form-control @error('kk_almarhum') is-invalid @enderror" id="kk_almarhum" name="kk_almarhum" accept="image/png, image/jpg, image/jpeg" placeholder="KK" required />
                        @error('kk_almarhum')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                 


                    <div class="col-md-6">
                        <label class="form-label">Upload Surat Pengantar Dari RT</label>
                        <input type="file" class="form-control @error('surat_pengantar_dari_rt') is-invalid @enderror" id="surat_pengantar_dari_rt" name="surat_pengantar_dari_rt" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Pengantar RT/RW" required />
                        @error('surat_pengantar_dari_rt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    
                    
                    <div class="col-md-6">
                        <label class="form-label">Upload Surat Pengantar Dari RS</label>
                        <input type="file" class="form-control @error('surat_pengantar_dari_rs') is-invalid @enderror" id="surat_pengantar_dari_rs" name="surat_pengantar_dari_rs" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Pengantar Rumah Sakit" required />
                        @error('surat_pengantar_dari_rs')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    </div>
                    <div class="row">
                    <div id ="no1" class="col-md-6" style="display:none">
                    <label class="form-label">SK Terakhir Yang Meninggal</label>
                        <input type="file" class="form-control @error('sk_terakhir') is-invalid @enderror" name="sk_terakhir" id="sk_terakhir" accept="image/png, image/jpg, image/jpeg" placeholder="SK"/>
                        @error('sk_terakhir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>

                    <div id ="no2" class="col-md-6" style="display:none">
                    <label class="form-label">Karip Yang Meninggal</label>
                        <input type="file" class="form-control @error('karip') is-invalid @enderror" name="karip" id="karip" accept="image/png, image/jpg, image/jpeg" placeholder="Karip"/>
                        @error('karip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>

                    <div id ="no3" class="col-md-6" style="display:none">
                    <label class="form-label">Tabungan Pensiunan Yang Meninggal</label>
                        <input type="file" class="form-control @error('tabungan_pensiunan') is-invalid @enderror" name="tabungan_pensiunan" id="tabungan_pensiunan" accept="image/png, image/jpg, image/jpeg" placeholder="Tabungan Pensiunan"/>
                        @error('tabungan_pensiunan')
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
<!-- Modal Kematian -->

<script type="text/javascript">
$("#select-item").click(function () {
    if($(this).val() == 'Pensiunan'){
        $('#no1').show()
		$('#no2').show()
		$('#no3').show()
    } else {
        $('#no1').hide()
		$('#no2').hide()
		$('#no3').hide()
    }
});
</script>


<script>
 $(document).ready(function(){
        $('#ktp_almarhum').change(function(){
               var memberImgfl = $("#ktp_almarhum");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#ktp_almarhum').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#kk_almarhum').change(function(){
               var memberImgfl = $("#kk_almarhum");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#kk_almarhum').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#surat_pengantar_dari_rt').change(function(){
               var memberImgfl = $("#surat_pengantar_dari_rt");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#surat_pengantar_dari_rt').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#surat_pengantar_dari_rs').change(function(){
               var memberImgfl = $("#surat_pengantar_dari_rs");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#surat_pengantar_dari_rs').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#sk_terakhir').change(function(){
               var memberImgfl = $("#sk_terakhir");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#sk_terakhir').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#karip').change(function(){
               var memberImgfl = $("#karip");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#karip').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#tabungan_pensiunan').change(function(){
               var memberImgfl = $("#tabungan_pensiunan");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#tabungan_pensiunan').val('');
               }
           }
        });
    });
</script>