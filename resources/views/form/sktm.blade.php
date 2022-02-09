<!-- Modal SKTM Menu -->
<div class="modal fade" id="modalSKTM_menu" tabindex="-1" aria-labelledby="modalSKTM" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSKTM">Surat Keterangan Tidak Mampu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

  <div class="d-grid gap-2">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalSKTM_cek">Cek Surat Keterangan Tidak Mampu</button>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalSKTM_buat">Buat Surat Keterangan Tidak Mampu</button>
  </div>
            </div>
        </div>
    </div>
  </div>
    <!-- Modal SKTM Menu -->


  <!-- Modal SKTM Cek -->
  <div class="modal fade" id="modalSKTM_cek" tabindex="-1" aria-labelledby="modalSKTM" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSKTM">Surat Keterangan Tidak Mampu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="form" method="get" action="{{ route('layanan/skm') }}">
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
    <!-- Modal SKTM Cek -->


  <!-- Modal SKTM Buat -->
<div class="modal fade" id="modalSKTM_buat" tabindex="-1" aria-labelledby="modalSKTM" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSKTM">Surat Keterangan Tidak Mampu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <form action="{{ route('save_skm') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="container col-md-12">
                        <h5><u> Identitas Yang Bersangkutan</u></h5>
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
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required />
                    @error('tempat_lahir')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
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
                    <label class="form-label">Nomor BDT</label>
                    <input type="text" class="form-control @error('nomor_bdt') is-invalid @enderror" id="nomor_bdt" name="nomor_bdt" placeholder="Nomor BDT" required />
                    @error('nomor_bdt')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Anda" required />
                    @error('nomor_bdt')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>

            <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Provinsi</label>
                        <select class="form-control @error('prov_id') is-invalid @enderror" name="prov_id" id="provinsi1" required>
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
                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="kota1" required>
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
                        <select class="form-control @error('dis_id') is-invalid @enderror" name="dis_id" id="kecamatan1" required>
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
                        <select class="form-control @error('subdis_id') is-invalid @enderror" name="subdis_id" id="desa1" required>
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
                        <select class="form-control @error('id_rw') is-invalid @enderror" name="id_rw" id="rw1" required>
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
                        <select class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" required>
                        <option selected disabled>--Pilih RT--</option>
                        <script>
                            var rt = 1;
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




        </br>

            <h5><u> Identitas Keluarga</u></h5>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Hubungan Keluarga</label>
                    <input type="text" class="form-control @error('hubungan_keluarga') is-invalid @enderror" id="hubungan_keluarga" name="hubungan_keluarga" placeholder="Contoh: Ayah Kandung/Ibu Kandung/Saudara Kandung" required/>
                    @error('hubungan_keluarga')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Keluarga Anda</label>
                    <input type="text" class="form-control @error('nama_kel') is-invalid @enderror" id="nama_kel" name="nama_kel" placeholder="Nama Keluarga Anda" required/>
                    @error('nama_kel')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


            </div>

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">NIK Keluarga Anda</label>
                <input type="number" class="form-control @error('nik_kel') is-invalid @enderror" id="nik_kel" name="nik_kel" placeholder="Nomor Induk Kependudukan Keluarga Anda" required />
                @error('nik_kel')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Tempat Lahir Keluarga Anda</label>
                <input type="text" class="form-control @error('tempat_kel') is-invalid @enderror" id="tempat_kel" name="tempat_kel" placeholder="Tempat Lahir Keluarga Anda" required />
                @error('tempat_lahir')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Tanggal Lahir Keluarga Anda</label>
                <input type="date" class="form-control @error('tanggal_lahir_kel') is-invalid @enderror" id="tanggal_lahir_kel" name="tanggal_lahir_kel" placeholder="Tanggal Lahir Keluarga Anda" required />
                @error('tanggal_lahir_kel')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Alamat Lengkap Keluarga Anda</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                @error('alamat')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>

        </div>
            </div>
        </br>
    <hr>
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Tujuan membuat surat ini untuk persyaratan: </label>
                        <input type="text" class="form-control @error(' untuk_persyaratan') is-invalid @enderror" id="untuk_persyaratan" name="untuk_persyaratan"  placeholder="Contoh: Untuk Bantuan Pendidikan" required />
                        @error('surat_pengantar_rt_rw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Upload Kartu Keluarga</label>
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
                        <label class="form-label">Upload Surat Pengantar RT/RW</label>
                        <input type="file" class="form-control @error('surat_pengantar_rt_rw') is-invalid @enderror" id="surat_pengantar_rt_rw" name="surat_pengantar_rt_rw" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Pengantar dari RT/RW" required />
                        @error('surat_pengantar_rt_rw')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Upload Surat Pernyataan Miskin</label>
                        <input type="file" class="form-control @error('surat_pernyataan_miskin') is-invalid @enderror" id="surat_pernyataan_miskin" name="surat_pernyataan_miskin" accept="image/png, image/jpg, image/jpeg" placeholder="Surat Pernyataan Miskin" required />
                        <p>**Untuk Upload Surat Pernyataan Miskin harus bermaterai 10.000 ditandatangani: RT, RW Dan Yang Bersangkutan</p>
                        @error('surat_pernyataan_miskin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>

                    </div>
                    <p>**Untuk Upload file berupa JPEG/PNG/JPG</p>

                    <div class="modal-footer d-block">

                        <button type="submit" class="btn btn-warning float-end" data-target="#contohModal">Submit</button>
                    </div>
             </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal SKTM -->
