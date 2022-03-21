@include('layouts.topbarlanding')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li>Visi Misi</li>
        </ol>
        <h2>VISI MISI KELURAHAN CIAMIS</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <h4>Visi Kelurahan Ciamis</h4>
        <p>
        Berdasarkan Perbup No. 63 Tahun 2016 tentang susunan organisasi perangkat Daerah, Kelurahan Ciamis merupakan perangkat Kecamatan Ciamis, mengemban tugas membantu Camat Ciamis dalam menyelenggarakan tugas-tugas pemerintahan, pembangunan, kemasyarakatan dan Pemberdayaan Masyarakat di Kelurahan Ciamis.  
        </p>
        <P>Visi Kelurahan Ciamis disusun dengan mengacu kepada Visi Pembangunan Kabupaten Ciamis yang tertuang dalam RPJMD Kabupaten Ciamis Tahun 2019 – 2024 “ yaitu ; <b> “Mantapnya Kemandirian Ekonomi Sejahtera untuk Semua “ </b></P>
        <p>Visi Kelurahan Ciamis merupakan cita-cita yang diharapkan khususnya dalam rangka menunjang terwujudnya Visi Kabupaten Ciamis. Harapan-harapan tersebut tertuang dalam Visi : <b>“Dengan Iman dan Taqwa Kelurahan Ciamis Menigkat dalam pelayanan menuju Masyarakat Sejahtera“. </b></p>
        <br>
        <h4>Misi Kelurahan Ciamis</h4>
        <p>Perwujudan makna dari Visi Kelurahan Ciamis Kecamatan Ciamis serta untuk mewujudkan Visi tersebut diatas, Kelurahan Ciamis menetapkan misi sebagai berikut :</p>
        <p>1. Meningkatkan tata kelola pemerintahan melalui peningkatan kinerja aparatur pemerintahan.</p>
        <p>2. Meningkatkan partisipasi masyarakat di bidang pembangunan, kemasyarakatan dan pemberdayaan masyarakat</p>
        <p>3. Meningkatkan pemberdayaan ekonomi, kegiatan layanan pendidikan, kesehatan, dan sosial keagamaan</p>
        <p>4. 	Memelihara dan meningkatkan keamanan dan ketertiban di lingkungan masyarakat. </p>
        <p>5. 	Meningkatkan kualitas pelayanan menuju pelayanan prima kepada masyarakat.</p>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
      &copy; Copyright <strong><span>Kelurahan Ciamis 2022</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ URL::to('Arsha/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <!--  -->
  <script src="{{ URL::to('Arsha/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::to('Arsha/vendor/aos/aos.js') }}"></script>

  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ URL::to('Arsha/js/main.js') }}"></script>
</body>

</html>
