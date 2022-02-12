<!-- Modal Domisili Menu -->
<div class="modal fade" id="modalduda_menu" tabindex="-1" aria-labelledby="modalduda" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalduda">Surat Keterangan Duda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


 <div class="d-grid gap-2">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalduda_cek">Cek Surat Keterangan Duda</button>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalduda_buat">Buat Surat Keterangan Duda</button>
  </div>
            </div>
        </div>
    </div>
  </div>


    <!-- Modal Duda Menu -->
     <!-- Modal Duda Cek -->
  <div class="modal fade" id="modalduda_cek" tabindex="-1" aria-labelledby="modalduda" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalduda">Surat Keterangan Duda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="form" method="get" action="{{ route('layanan/duda') }}">
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







    <!-- Modal Duda Cek -->
  <!-- Modal Duda Buat -->
<div class="modal fade" id="modalduda_buat" tabindex="-1" aria-labelledby="modalduda" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalduda">Surat Keterangan Duda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('save_duda') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                        <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Anda" required/>
                        <input type="hidden" class="form-control" id="verifikasi" name="verifikasi" value="Belum Diverifikasi" readonly  />
                        <input type="hidden" class="form-control" id="tanggal_buat_surat" name="tanggal_buat_surat" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" readonly />
                        <input type="hidden" value="Laki-laki" name="jk" required>
                        <input type="hidden" value="Duda" name="status_perkawinan"  required>
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
                        <select class="form-control @error('prov_id') is-invalid @enderror" name="prov_id" id="provinsi5" required>
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
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="kota5" required>
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
                        <select class="form-control @error('dis_id') is-invalid @enderror" name="dis_id" id="kecamatan5" required>
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
                        <select class="form-control @error('subdis_id') is-invalid @enderror" name="subdis_id" id="desa5" required>
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
                        <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="rw5" required>
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
                        <label class="form-label">Pengantar Dari Lingkungan</label>
                        <input type="text" class="form-control @error('pengantar_dari') is-invalid @enderror" id="pengantar_dari" name="pengantar_dari" placeholder="Contoh: RT/RW" required>
                        @error('pengantar_dari')
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
                            <label class="form-label">Melengkapi Persyaratan</label>
                            <input type="text" class="form-control @error('melengkapi') is-invalid @enderror" id="melengkapi" name="melengkapi" placeholder="Persyaratan...." required>
                            @error('lingkungan')
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
                        <input type="file" class="form-control @error('ktp') is-invalid @enderror" id="ktp_duda" name="ktp" accept="image/png, image/jpg, image/jpeg" placeholder="KTP" required />
                        @error('ktp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upload KK</label>
                        <input type="file" class="form-control @error('kk') is-invalid @enderror" id="kk_duda" name="kk" accept="image/png, image/jpg, image/jpeg" placeholder="KK" required />
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
                        <input type="file" class="form-control @error('surat_pengantar_rt') is-invalid @enderror" id="surat_pengantar_rt_duda" name="surat_pengantar_rt" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Pengantar RT/RW" required />
                        @error('surat_pengantar_rt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Upload Surat Kematian/Cerai</label>
                        <input type="file" class="form-control @error('kematian_akta_cerai') is-invalid @enderror" id="kematian_akta_cerai_duda" name="kematian_akta_cerai" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Pengantar RT/RW" required />
                        @error('kematian_akta_cerai')
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
<!-- Modal Duda -->


<script>
 $(document).ready(function(){
        $('#ktp_duda').change(function(){
               var memberImgfl = $("#ktp_duda");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#ktp_duda').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#kk_duda').change(function(){
               var memberImgfl = $("#kk_duda");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#kk_duda').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#surat_pengantar_rt_duda').change(function(){
               var memberImgfl = $("#surat_pengantar_rt_duda");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#surat_pengantar_rt_duda').val('');
               }
           }
        });
    });
</script>

<script>
 $(document).ready(function(){
        $('#kematian_akta_cerai_duda').change(function(){
               var memberImgfl = $("#kematian_akta_cerai_duda");
               var lg = memberImgfl[0].files.length; // get Files length
               var memberProfiles = memberImgfl[0].files;
               var totalflsize = 0;
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   totalflsize = totalflsize+memberProfiles[i].size; // get file size
               }
               if(totalflsize > 5000000) {
                    alert('Gagal Upload File Maksimal 5 MB');
                    $('#kematian_akta_cerai_duda').val('');
               }
           }
        });
    });
</script>
