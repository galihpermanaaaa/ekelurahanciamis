<!-- Modal Domisili Menu -->
<div class="modal fade" id="modaldomisili_menu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Domisili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


 <div class="d-grid gap-2">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modaldomisili_cek">Cek Surat Keterangan Domisili</button>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modaldomisili_buat">Buat Surat Keterangan Domisili</button>
  </div>
            </div>
        </div>
    </div>
  </div>


    <!-- Modal Domisili Menu -->
     <!-- Modal Domisili Cek -->
  <div class="modal fade" id="modaldomisili_cek" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Domisili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="form" method="get" action="{{ route('layanan/domisili') }}">
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







    <!-- Modal Domisili Cek -->
  <!-- Modal Domisili Buat -->
<div class="modal fade" id="modaldomisili_buat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modaldomisili" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaldomisili">Surat Keterangan Domisili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_domisili') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                        <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
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
                        <label class="form-label">NIK</label>
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
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required />
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
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
            </div>
            <div class="row">
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
                    <div class="col-md-6">
                        <label class="form-label">Kewarganegaraan</label>
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
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Agama</label>
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
                        <label class="form-label">Pekerjaan</label>
                        <select  class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" required>
                        <option value="">--Pilih Pekerjaan Anda--</option>
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
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Provinsi</label>
                        <select class="form-control @error('prov_id') is-invalid @enderror" name="prov_id" id="provinsi2" required>
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
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="kota2" required>
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
                        <select class="form-control @error('dis_id') is-invalid @enderror" name="dis_id" id="kecamatan2" required>
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
                        <select class="form-control @error('subdis_id') is-invalid @enderror" name="subdis_id" id="desa2" required>
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
                        <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="rw2" required>
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
                        <label class="form-label">Alamat Asal</label>
                        <textarea class="form-control @error('alamat_asal') is-invalid @enderror" id="alamat_asal" name="alamat_asal" placeholder="Alamat Asal Anda" required></textarea>
                        @error('alamat_asal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Anda" required />
                        @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
            </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Upload KTP</label>
                        <input type="file" class="form-control @error('ktp_domisili') is-invalid @enderror" id="ktp_domisili_1" name="ktp_domisili" accept="image/png, image/jpg, image/jpeg" placeholder="KTP" required />
                        @error('ktp_domisili')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upload KK</label>
                        <input type="file" class="form-control @error('kk_domisili') is-invalid @enderror" id="kk_domisili_1" name="kk_domisili" accept="image/png, image/jpg, image/jpeg" placeholder="KK" required />
                        @error('kk')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Upload Surat Pengantar</label>
                        <input type="file" class="form-control @error('surat_pengantar_rt_rw_domisili') is-invalid @enderror" id="surat_pengantar_rt_rw_domisili_1" name="surat_pengantar_rt_rw_domisili" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Pengantar RT/RW" required />
                        @error('surat_pengantar_rt_rw_domisili')
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
<!-- Modal Domisili -->


<script>
 $(document).ready(function(){
        $('#ktp_domisili_1').change(function(){
               var memberImgfl = $("#ktp_domisili_1");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#ktp_domisili_1').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#kk_domisili_1').change(function(){
               var memberImgfl = $("#kk_domisili_1");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#kk_domisili_1').val('');
               }
           }
        });
    });
</script>



<script>
 $(document).ready(function(){
        $('#surat_pengantar_rt_rw_domisili_1').change(function(){
               var memberImgfl = $("#surat_pengantar_rt_rw_domisili_1");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#surat_pengantar_rt_rw_domisili_1').val('');
               }
           }
        });
    });
</script>

