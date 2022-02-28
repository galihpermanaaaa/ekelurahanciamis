@include('layouts.header')
@include('layouts.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Masukkan Dan Saran Dari Masyarakat Kelurahan Ciamis</h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

        <div class="col-xl-12">
          <div class="card p-4">
          <form action="" method="POST" enctype="multipart/form-data">
             @csrf
              <div class="row gy-10">

                <div class="col-md-6">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="{{ $data[0]->nama }}"  required readonly>
                </div>

                <div class="col-md-6">
                  <label>Email</label>
                  <input type="text" name="nama" class="form-control" value="{{ $data[0]->email }}"  required readonly>
                </div>

                <div class="col-md-6">
                  <label>No.HP</label>
                  <input type="text" name="nama" class="form-control" value="{{ $data[0]->telp }}"  required readonly>
                </div>

                <div class="col-md-6">
                  <label>Tanggal Masukkan & Saran</label>
                  <input type="text" name="nama" class="form-control" value="{{tanggal_indonesia($data[0]->tanggal_buat_masukkan)}}"  required readonly>
                </div>

            <br>
                <div class="col-md-12">
                    <label>Masukkan & Saran</label>
                   <textarea name="deskripsi" rows="10" class="form-control" readonly>{{ $data[0]->isi}}</textarea>
                </div>

            <br>
            <br>
              

                <div class="submit-section text-center">
                <br>
                <a href="{{ route('user/profile_kelurahan/data_masukkan_saran') }}" class="btn btn-danger btn-sm">Kembali</a>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->
