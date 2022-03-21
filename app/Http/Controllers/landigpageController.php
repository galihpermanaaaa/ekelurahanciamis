<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\RW;
use Carbon\Carbon;
use App\Models\SKU;
use App\Models\SKUDiterima;
use App\Models\SKUDitolak;
use App\Models\SKM;
use App\Models\SKMDiterima;
use App\Models\SKMDitolak;
use App\Models\SuratDomisili;
use App\Models\SuratDomisiliTerima;
use App\Models\SuratDomisiliTolak;
use App\Models\SuratDuda;
use App\Models\SuratDudaDiterima;
use App\Models\SuratDudaDitolak;
use App\Models\SuratJanda;
use App\Models\SuratJandaDiterima;
use App\Models\SuratJandaDitolak;
use App\Models\SBM;
use App\Models\SBM_Diterima;
use App\Models\SBM_Ditolak;
use App\Models\BMR;
use App\Models\BMR_Diterima;
use App\Models\BMR_Ditolak;
use App\Models\Kematian;
use App\Models\Kematian_Ditolak;
use App\Models\Kematian_Diterima;
use App\Models\DomisiliPT;
use App\Models\DomisiliPTerima;
use App\Models\DomisiliPTolak;
use App\Models\MasukkanSaran;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Hash;
use DB;
use Alert;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Mail\SKUMail;
use App\Mail\PembuatanSuratSKMKelurahanCiamis;
use App\Mail\PembuatSuratDomisili;
use App\Mail\PembuatSuratKeteranganDuda;
use App\Mail\PembuatSuratKeteranganJanda;
use App\Mail\PembuatSuratBelumMenikah;
use App\Mail\PembuatSuratBelumMemilikiRumah;
use App\Mail\PembuatSuratDomisiliPT;
use Illuminate\Support\Facades\Mail;
use App\Helpers;
use App\tgl_indo;
use App\Models\DataGeografis;
use App\Models\DataPemerintah;
use App\Models\KelompokUmur;
use App\Models\User;
use App\Models\MataPencarian;
use App\Models\PendidikanDitamatkan;
use App\Models\AgamaKepercayaan;
use App\Models\KepalaKeluarga;
use App\Models\Sekolah;
use App\Models\Lembaga;
use App\Models\SaranaIbadah;
use App\Models\Perumahan;
use App\Models\KeluargaBerencana;
use App\Models\Kesehatan;
use App\Models\Perekonomian;
use Response;

class landigpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $provinsi = Provinsi::all();
        $sku_count = SKU::all()->count();
        $domisili_count =SuratDomisili::all()->count();
        $skm_count = SKM::all()->count();
        $duda_count = SuratDuda::all()->count();
        $janda_count = SuratJanda::all()->count();
        $sbm_count = SBM::all()->count();
        $bmr_count = BMR::all()->count();
        $kematian_count = Kematian::all()->count();
        $domisilipt_count = DomisiliPT::all()->count();
        return view('landingpage', compact('provinsi', 'sku_count', 'domisili_count', 'skm_count','duda_count', 'janda_count', 'sbm_count', 'bmr_count', 'kematian_count','domisilipt_count'));

    }

    public function visi_misi()
    {
        $halaman = "visi_misi";
        return view('visi_misi');
    }

    public function sejarah()
    {
        $halaman = "sejarah";
        return view('sejarah');
    }

    

    public function apk()
    {
        $filepath = public_path('apk/ekelurahan.apk');
        return Response::download($filepath); 
    }

    public function struktur_organisasi()
    {
        $halaman = "struktur_organisasi";
        return view('struktur_organisasi');
    }

    public function batas_kelurahan()
    {
        $halaman = "batas_kelurahan";
        return view('batas_kelurahan');
    }

    public function monografi_geografis()
    {
        $halaman = "monografi_geografis";
        $data = DataGeografis::limit(1)->get();
        return view('monografi_geografis', compact('data'));
    }

    public function gallery()
    {
        $halaman = "gallery";
        return view('gallery');
    }

    public function monografi()
    {
        $halaman = "monografi";
        $kelompok_umur1_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','0-4')->sum('jumlah');
        $kelompok_umur1_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','0-4')->sum('jumlah');

        $kelompok_umur2_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','5-9')->sum('jumlah');
        $kelompok_umur2_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','5-9')->sum('jumlah');

        $kelompok_umur3_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','10-14')->sum('jumlah');
        $kelompok_umur3_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','10-14')->sum('jumlah');

        $kelompok_umur4_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','15-19')->sum('jumlah');
        $kelompok_umur4_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','15-19')->sum('jumlah');

        $kelompok_umur5_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','20-24')->sum('jumlah');
        $kelompok_umur5_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','20-24')->sum('jumlah');

        $kelompok_umur6_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','25-29')->sum('jumlah');
        $kelompok_umur6_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','25-29')->sum('jumlah');

        $kelompok_umur7_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','30-34')->sum('jumlah');
        $kelompok_umur7_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','30-34')->sum('jumlah');

        $kelompok_umur8_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','35-39')->sum('jumlah');
        $kelompok_umur8_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','35-39')->sum('jumlah');

        $kelompok_umur9_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','40-44')->sum('jumlah');
        $kelompok_umur9_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','40-44')->sum('jumlah');

        $kelompok_umur10_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','45-49')->sum('jumlah');
        $kelompok_umur10_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','45-49')->sum('jumlah');

        $kelompok_umur11_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','50-54')->sum('jumlah');
        $kelompok_umur11_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','50-54')->sum('jumlah');

        $kelompok_umur12_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','55-59')->sum('jumlah');
        $kelompok_umur12_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','55-59')->sum('jumlah');

        $kelompok_umur13_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','60-64')->sum('jumlah');
        $kelompok_umur13_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','60-64')->sum('jumlah');

        $kelompok_umur14_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','65-69')->sum('jumlah');
        $kelompok_umur14_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','65-69')->sum('jumlah');

        $kelompok_umur15_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','70-74')->sum('jumlah');
        $kelompok_umur15_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','70-74')->sum('jumlah');

        $kelompok_umur16_lk = KelompokUmur::where('jk','Laki-laki')->where('kiteria','75keatas')->sum('jumlah');
        $kelompok_umur16_pr = KelompokUmur::where('jk','Perempuan')->where('kiteria','75keatas')->sum('jumlah');

        $pendidikan1 = PendidikanDitamatkan::where('pendidikan','Belum Sekolah')->sum('jumlah');
        $pendidikan2 = PendidikanDitamatkan::where('pendidikan','Belum Tamat SD')->sum('jumlah');
        $pendidikan3 = PendidikanDitamatkan::where('pendidikan','SD')->sum('jumlah');
        $pendidikan4 = PendidikanDitamatkan::where('pendidikan','SMP')->sum('jumlah');
        $pendidikan5 = PendidikanDitamatkan::where('pendidikan','SMA')->sum('jumlah');
        $pendidikan6 = PendidikanDitamatkan::where('pendidikan','DI')->sum('jumlah');
        $pendidikan7 = PendidikanDitamatkan::where('pendidikan','DII')->sum('jumlah');
        $pendidikan8 = PendidikanDitamatkan::where('pendidikan','DIII')->sum('jumlah');
        $pendidikan9 = PendidikanDitamatkan::where('pendidikan','SI')->sum('jumlah');
        $pendidikan10 = PendidikanDitamatkan::where('pendidikan','SII')->sum('jumlah');
        $pendidikan11 = PendidikanDitamatkan::where('pendidikan','SIII')->sum('jumlah');

        $matapencarian1 = MataPencarian::where('pekerjaan','PNS')->sum('jumlah');
        $matapencarian2 = MataPencarian::where('pekerjaan','TNI/POLRI')->sum('jumlah');
        $matapencarian3 = MataPencarian::where('pekerjaan','BUMN/BUMD')->sum('jumlah');
        $matapencarian4 = MataPencarian::where('pekerjaan','Pegawai Swasta')->sum('jumlah');
        $matapencarian5 = MataPencarian::where('pekerjaan','Pertanian')->sum('jumlah');
        $matapencarian6 = MataPencarian::where('pekerjaan','Perikanan')->sum('jumlah');
        $matapencarian7 = MataPencarian::where('pekerjaan','Industri Pengolahan')->sum('jumlah');
        $matapencarian8 = MataPencarian::where('pekerjaan','Perdagangan')->sum('jumlah');
        $matapencarian9 = MataPencarian::where('pekerjaan','Angkutan')->sum('jumlah');
        $matapencarian10 = MataPencarian::where('pekerjaan','Jasa-jasa')->sum('jumlah');
        $matapencarian11 = MataPencarian::where('pekerjaan','Buruh Pertukangan')->sum('jumlah');
        $matapencarian12 = MataPencarian::where('pekerjaan','Buruh Pertanian')->sum('jumlah');
        $matapencarian13 = MataPencarian::where('pekerjaan','Buruh Serabutan')->sum('jumlah');
        $matapencarian14 = MataPencarian::where('pekerjaan','Pengangguran')->sum('jumlah');
        $matapencarian15 = MataPencarian::where('pekerjaan','Pensiunan')->sum('jumlah'); 

        $agama1 = AgamaKepercayaan::where('agama','Islam')->sum('jumlah');
        $agama2 = AgamaKepercayaan::where('agama','Kristen')->sum('jumlah');
        $agama3 = AgamaKepercayaan::where('agama','Katholik')->sum('jumlah');
        $agama4 = AgamaKepercayaan::where('agama','Hindu')->sum('jumlah');
        $agama5 = AgamaKepercayaan::where('agama','Budha')->sum('jumlah');
        $agama6 = AgamaKepercayaan::where('agama','Konghuchu')->sum('jumlah');
        $agama7 = AgamaKepercayaan::where('agama','Kepercayaan')->sum('jumlah');

        $kk1 = KepalaKeluarga::where('kk','Laki-laki')->sum('jumlah');
        $kk2 = KepalaKeluarga::where('kk','Perempuan')->sum('jumlah');

        $sekolah = Sekolah::all();
        $jumlah_guru = Sekolah::all()->sum('jumlah_guru');
        $jumlah_murid = Sekolah::all()->sum('jumlah_murid');
        $jumlah_sekolah = Sekolah::all()->sum('jumlah_sekolah');

        $lem1 =  Lembaga::where('lembaga','LPM')->sum('jumlah');
        $lem2 =  Lembaga::where('lembaga','TP/PKK')->sum('jumlah');
        $lem3 =  Lembaga::where('lembaga','BKM')->sum('jumlah');
        $lem4 =  Lembaga::where('lembaga','POKMAS')->sum('jumlah');
        $lem5 =  Lembaga::where('lembaga','Karang Taruna')->sum('jumlah');
        $lem6 =  Lembaga::where('lembaga','UPZ')->sum('jumlah');
        $lem7 =  Lembaga::where('lembaga','BKMM')->sum('jumlah');
        $lem8 =  Lembaga::where('lembaga','Pondok Pesantren')->sum('jumlah');
        $lem9 =  Lembaga::where('lembaga','MUI')->sum('jumlah');

        $sarana = SaranaIbadah::all();
        $jumlah_sarana = SaranaIbadah::all()->sum('jumlah');

        $perum1 =  Perumahan::where('status_kepemilikan','Sendiri')->sum('jumlah');
        $perum2 =  Perumahan::where('status_kepemilikan','Sewa Kontrak')->sum('jumlah');
        $perum3 =  Perumahan::where('status_kepemilikan','Perumnas')->sum('jumlah');
        $perum4 =  Perumahan::where('status_kepemilikan','Developer Swasta')->sum('jumlah');
        $perum5 =  Perumahan::where('status_kepemilikan','Penyedia Perseorangan')->sum('jumlah');
       
        $kesehatan = Kesehatan::all();
        $jumlah_kesehatan = Kesehatan::all()->sum('jumlah');

        $perekonomian = Perekonomian::all();
        $jumlah_perekonomian = Perekonomian::all()->sum('jumlah');

        $kb1 =  KeluargaBerencana::where('berencana','PUS')->sum('jumlah');
        $kb2 =  KeluargaBerencana::where('berencana','Peserta KB Aktif')->sum('jumlah');
        $kb3 =  KeluargaBerencana::where('berencana','Pra KS')->sum('jumlah');
        $kb4 =  KeluargaBerencana::where('berencana','KS 1')->sum('jumlah');
        $kb5 =  KeluargaBerencana::where('berencana','KS')->sum('jumlah');
        return view('monografi', compact('halaman','kelompok_umur1_lk','kelompok_umur1_pr',
        'kelompok_umur2_lk','kelompok_umur2_pr','kelompok_umur3_lk','kelompok_umur3_pr', 'kelompok_umur4_lk','kelompok_umur4_pr',
        'kelompok_umur5_lk','kelompok_umur5_pr','kelompok_umur6_lk','kelompok_umur6_pr','kelompok_umur7_lk','kelompok_umur7_pr',
        'kelompok_umur8_lk','kelompok_umur8_pr','kelompok_umur9_lk','kelompok_umur9_pr','kelompok_umur10_lk','kelompok_umur10_pr',
        'kelompok_umur11_lk','kelompok_umur11_pr','kelompok_umur12_lk','kelompok_umur12_pr','kelompok_umur13_lk','kelompok_umur13_pr',
        'kelompok_umur14_lk','kelompok_umur14_pr','kelompok_umur15_lk','kelompok_umur15_pr','kelompok_umur16_lk','kelompok_umur16_pr',
        'pendidikan1','pendidikan2','pendidikan3','pendidikan4','pendidikan5','pendidikan6','pendidikan7','pendidikan8','pendidikan9','pendidikan10',
        'matapencarian1','matapencarian2','matapencarian3','matapencarian4','matapencarian5','matapencarian6','matapencarian7','matapencarian8','matapencarian9','matapencarian10',
        'matapencarian11','matapencarian12','matapencarian13','matapencarian14','matapencarian15','agama1','agama2','agama3','agama4','agama5','agama6','agama7',
        'kk1','kk2','sekolah','jumlah_guru','jumlah_murid','jumlah_sekolah','lem1','lem2','lem3','lem4','lem5','lem6','lem7','lem8','lem9','sarana','jumlah_sarana',
        'perum1','perum2','perum3','perum4','perum5','kesehatan','jumlah_kesehatan','perekonomian','jumlah_perekonomian','kb1','kb2','kb3','kb4','kb5'));
    }

    public function pemerintahan_kelurahan()
    {
        $halaman = "pemerintahan_kelurahan";
        return view('pemerintahan_kelurahan');
    }

    public function getKota(Request $request){
        $kota = Kota::where("prov_id",$request->prov_id)->pluck('city_id','city_name');
        return response()->json($kota);
    }

    public function getKecamatan(Request $request){
        $kecamatan = Kecamatan::where("city_id",$request->city_id)->pluck('dis_id','dis_name');
        return response()->json($kecamatan);
    }

    public function getDesa(Request $request){
        $desa = Desa::where("dis_id",$request->dis_id)->pluck('subdis_id','subdis_name');
        return response()->json($desa);
    }
    public function getRw(Request $request){
        $rw = RW::where("subdis_id",$request->subdis_id)->pluck('id_rw','nama_rw');
        return response()->json($rw);
    }

    public function saveMasukkan(Request $request)
    {
        $request->validate([
            'nama'                       => 'required',
            'email'                        => 'required',
            'telp'                        => 'required',
            'isi'                        => 'required',
            'tanggal_buat_masukkan'      => 'required',
            
        ]);

        $user = new MasukkanSaran;
        $user->nama                              = $request->nama;
        $user->email                             = $request->email;
        $user->telp                              = $request->telp;
        $user->isi                               = $request->isi;
        $user->tanggal_buat_masukkan             = $request->tanggal_buat_masukkan;
        $user->save();
        Alert::success('Masukkan Dan Saran Anda Berhasil Dikirimkan :)','Success');
        return redirect()->route('index');
    }

    public function saveSku(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'jk'                            => 'required',
            'tanggal_lahir'                 => 'required|date',
            'status_perkawinan'             => 'required',
            'status_kewarganegaraan'        => 'required',
            'agama'                         => 'required',
            'pekerjaan'                     => 'required',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',
            'nomor_surat_pengantar_rw_rt'   => 'required',
            'keperluan'                     => 'required',
            'bidang_usaha'                  => 'required',
            'ktp'                           => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk'                            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar'               => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'keterangan_domisili'           => 'image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1 = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('sku/ktp'), $file1);

        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('sku/kk'), $file2);

        $file3 = time().'.'.$request->surat_pengantar->extension();
        $request->surat_pengantar->move(public_path('sku/surat_pengantar'), $file3);

        if(!empty($request->keterangan_domisili)){
            $file4 = time().'.'.$request->keterangan_domisili->extension();
            $request->keterangan_domisili->move(public_path('sku/keterangan_domisili'), $file4);
        }else{
            $file4 = '';
            $request->keterangan_domisili;
        }


        $form = new SKU;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->jk                           = $request->jk;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->status_perkawinan            = $request->status_perkawinan;
        $form->status_kewarganegaraan       = $request->status_kewarganegaraan;
        $form->agama                        = $request->agama;
        $form->pekerjaan                    = $request->pekerjaan;
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                      = $request->dis_id;
        $form->subdis_id                   = $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;

        $form->nomor_surat_pengantar_rw_rt     = $request->nomor_surat_pengantar_rw_rt;
        $form->keperluan                       = $request->keperluan;
        $form->bidang_usaha                    = $request->bidang_usaha;

        $form->ktp                              = $file1;
        $form->kk                               = $file2;
        $form->surat_pengantar                  = $file3;
        $form->keterangan_domisili              = $file4;

        $form->token                            = $token;
        $form->verifikasi                        = $request->verifikasi;
        $form->email                            = $request->email;
        $form->tanggal_buat_surat                = $request->tanggal_buat_surat;


      

        $form->save();
        Mail::to($request->email)->send(new \App\Mail\SKUMail($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }


    public function filtersku(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $sku = SKU::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.sku', compact('sku'));
    }

    public function layanan_surat_sku($id)
    {
        $data = SKU::join('sku_diterima', 'sku_diterima.id_sku', '=', 'surat_sku.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','Legal']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN USAHA',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'      '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Agama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW '. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name.' '.'Kabupaten '. $p->cities->city_name,0,1);
  

        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Pengantar Keterangan dari RT.'. $p->rt. ' '. 'RW.'. $p->rw->nama_rw,0,1);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Dengan Nomor: .'. $p->nomor_surat_pengantar_rw_rt. ' '. 'orang tersebut di atas adalah warga kami yang mempunyai kegiatan usaha',0,1);
        $this->fpdf->write(8,'dibidang : '. $p->bidang_usaha.'.'. ' Surat keterangan ini diperlukan untuk: '. $p->keperluan.'.',0,1);
        
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);




        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }
    }

    public function saveSkm(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'tempat_lahir'                  => 'required',
            'nomor_bdt'                     => '',
            'untuk_persyaratan'             => 'required',
            'tanggal_lahir'                 => 'required|date',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',

            'hubungan_keluarga'             => 'required',
            'nama_kel'                      => 'required',
            'nik_kel'                       => 'required',
            'tempat_kel'                    => 'required',
            'tanggal_lahir_kel'             => 'required',
            'alamat'                        => 'required',


            'surat_pengantar_rt_rw'         => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk'                            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pernyataan_miskin'       => 'required|image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);


        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('skm/kk_skm'), $file2);

        $file3 = time().'.'.$request->surat_pengantar_rt_rw->extension();
        $request->surat_pengantar_rt_rw->move(public_path('skm/surat_pengantar_rt_rw_skm'), $file3);

        $file4 = time().'.'.$request->surat_pernyataan_miskin->extension();
        $request->surat_pernyataan_miskin->move(public_path('skm/surat_pernyataan_miskin_skm'), $file4);

        $form = new SKM;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->tempat_lahir                 = $request->tempat_lahir;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->nomor_bdt                    = $request->nomor_bdt;
        $form->untuk_persyaratan            = $request->untuk_persyaratan;

        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                      = $request->dis_id;
        $form->subdis_id                   = $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;

        $form->nik_kel                          = $request->nik;
        $form->nama_kel                         = $request->nama;
        $form->tempat_kel                       = $request->tempat_kel;
        $form->tanggal_lahir_kel                = $request->tanggal_lahir_kel;
        $form->alamat                            = $request->alamat;
        $form->hubungan_keluarga                = $request->hubungan_keluarga;

        $form->kk                                   = $file2;
        $form->surat_pengantar_rt_rw                = $file3;
        $form->surat_pernyataan_miskin              = $file4;

        $form->token                            = $token;
        $form->verifikasi                        = $request->verifikasi;
        $form->email                            = $request->email;
        $form->tanggal_buat_surat                = $request->tanggal_buat_surat;

        $form->save();
        Mail::to($request->email)->send(new \App\Mail\PembuatanSuratSKMKelurahanCiamis($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    public function filterskm(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $skm = SKM::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.skm', compact('skm'));
    }

    public function layanan_surat_skm($id)
    {
        $data = SKM::join('surat_tdk_mampu_terima', 'surat_tdk_mampu_terima.id_skm', '=', 'surat_tdk_mampu.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage();
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN TIDAK MAMPU',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,': WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jabatan',0,0);
        $this->fpdf->Cell(50,6,': Lurah Ciamis',0,1);

        $this->fpdf->Ln(3);

        $this->fpdf->write(8,'Dengan ini menerangkan bahwa:',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nomor BDT',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nomor_bdt,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tempat Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->tempat_lahir,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name. ' '.'Kabupaten '. $p->cities->city_name,0,1);
       
        
        $this->fpdf->Ln(3);
        $this->fpdf->write(8,'Hubungan Keluarga'.' '.$p->hubungan_keluarga.' '. 'Dari:',0,1); 
        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama_kel,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik_kel,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tempat Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->tempat_kel,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir_kel)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->alamat,0,1);
        


        $this->fpdf->Ln(3);
        $this->fpdf->Cell(10,0.5,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Pengantar Keterangan dari Ketua RT.'. $p->rt. ' '. 'RW.'. $p->rw->nama_rw. ' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis benar bahwa orang tersebut di atas keadaan ekonominya kurang mampu dan pemutakhiran data pada Basis Data Terpadu (BDT) '. $p->nomor_bdt. ' (Optional 1/Mengikuti yg atas).',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,0.5,'',0,0);
        $this->fpdf->write(8,'Surat keterangan ini diperlukan '. $p->untuk_persyaratan,0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,0.5,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini kami buat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln(3);
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(110,6,'',0,0,'C');
        $this->fpdf->Cell(5,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);

        
        $this->fpdf->Cell(22,8,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(101,6,'Camat Ciamis',0,0);
        $this->fpdf->Cell(10,6,'Lurah Ciamis',0,1);
   

        $this->fpdf->Cell(5,25,'',0,0, 'C');
        $this->fpdf->Cell(1,30,'',0,0);
        $this->fpdf->SetFont('times','Bu',12);
        $this->fpdf->Cell(87,30,' Drs. DEDY MUDYANA, M.Si',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(150,30,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,1);
        $this->fpdf->SetFont('times','',11);
        $this->fpdf->Cell(10,-20,'',0,0);
        $this->fpdf->Cell(102,-20,'NIP. 19670610 198609 1 001.',0,0);
        $this->fpdf->Cell(100,-20,'NIP. 19921107 201507 1 001.',0,1);
        $this->fpdf->Output();
        exit; 
        }
        
    }

    public function saveDomisili(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'jk'                            => 'required',
            'tanggal_lahir'                 => 'required|date',
            'status_perkawinan'             => 'required',
            'status_kewarganegaraan'        => 'required',
            'agama'                         => 'required',
            'pekerjaan'                     => 'required',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',
            'alamat_asal'                   => 'required',
            'ktp_domisili'                           => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk_domisili'                            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar_rt_rw_domisili'         => 'required|image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1_domisili = time().'.'.$request->ktp_domisili->extension();
        $request->ktp_domisili->move(public_path('skd/ktp_domisili'), $file1_domisili);

        $file2_domisili = time().'.'.$request->kk_domisili->extension();
        $request->kk_domisili->move(public_path('skd/kk_domisili'), $file2_domisili);

        $file3_domisili = time().'.'.$request->surat_pengantar_rt_rw_domisili->extension();
        $request->surat_pengantar_rt_rw_domisili->move(public_path('skd/pengantar_domisili'), $file3_domisili);


        $form = new SuratDomisili;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->jk                           = $request->jk;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->status_perkawinan            = $request->status_perkawinan;
        $form->status_kewarganegaraan       = $request->status_kewarganegaraan;
        $form->agama                        = $request->agama;
        $form->pekerjaan                    = $request->pekerjaan;
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                      = $request->dis_id;
        $form->subdis_id                   = $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;
        $form->alamat_asal                  = $request->alamat_asal;
       

        $form->ktp_domisili                              = $file1_domisili;
        $form->kk_domisili                               = $file2_domisili;
        $form->surat_pengantar_rt_rw_domisili           = $file3_domisili;


        $form->token                            = $token;
        $form->verifikasi                        = $request->verifikasi;
        $form->email                            = $request->email;
        $form->tanggal_buat_surat                = $request->tanggal_buat_surat;

        $form->save();
        
        Mail::to($request->email)->send(new \App\Mail\PembuatSuratDomisili($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    public function filterdomisili(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $domisili = SuratDomisili::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.domisili', compact('domisili'));
    }

    public function layanan_surat_domisili($id)
    {
        $data = SuratDomisili::join('surat_domisili_diterima', 'surat_domisili_diterima.id_domisili', '=', 'surat_domisili.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','a4']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN DOMISILI',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Agama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat Asal',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->alamat_asal,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat Sekarang',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name. ' '.'Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Pengantar Keterangan dari RT.'. $p->rt. ' '. 'RW.'. $p->rw->nama_rw. ' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis'. ','. ' benar bahwa orang tersebut di atas adalah warga yang saat ini berdomisili pada alamat di atas'. '.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum dan dapat dipergunakan sebagaimana mestinya'. '.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);




        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }
        
    }

    public function saveDuda(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'jk'                            => 'required',
            'tanggal_lahir'                 => 'required|date',
            'status_perkawinan'             => 'required',
            'status_kewarganegaraan'        => 'required',
            'agama'                         => 'required',
            'pekerjaan'                     => 'required',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',

            'pengantar_dari'                => 'required',
            'melengkapi'                     => 'required',

            'ktp'                           => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk'                            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar_rt'              => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kematian_akta_cerai'           => 'image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1 = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('suratduda/ktp_duda'), $file1);

        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('suratduda/kk_duda'), $file2);

        $file3 = time().'.'.$request->surat_pengantar_rt->extension();
        $request->surat_pengantar_rt->move(public_path('suratduda/surat_pengantar_rt_duda'), $file3);

        $file4 = time().'.'.$request->kematian_akta_cerai->extension();
        $request->kematian_akta_cerai->move(public_path('suratduda/kematian_akta_cerai'), $file4);

        $form = new SuratDuda;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->jk                           = $request->jk;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->status_perkawinan            = $request->status_perkawinan;
        $form->status_kewarganegaraan       = $request->status_kewarganegaraan;
        $form->agama                        = $request->agama;
        $form->pekerjaan                    = $request->pekerjaan;
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                      = $request->dis_id;
        $form->subdis_id                   = $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;

        $form->pengantar_dari               = $request->pengantar_dari;
        $form->melengkapi                       = $request->melengkapi;
       

        $form->ktp                              = $file1;
        $form->kk                               = $file2;
        $form->surat_pengantar_rt               = $file3;
        $form->kematian_akta_cerai              = $file4;

        $form->token                            = $token;
        $form->verifikasi                        = $request->verifikasi;
        $form->email                            = $request->email;
        $form->tanggal_buat_surat                = $request->tanggal_buat_surat;


      

        $form->save();
        Mail::to($request->email)->send(new \App\Mail\PembuatSuratKeteranganDuda($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    public function filterduda(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $duda = SuratDuda::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.duda', compact('duda'));
    }

    public function layanan_surat_duda($id)
    {
        $data = SuratDuda::join('surat_duda_diterima', 'surat_duda_diterima.id_duda', '=', 'surat_duda.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','a4']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN DUDA',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Agama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name. ' '.'Kabupaten '. $p->cities->city_name,0,1);


        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Pengantar '. 'RT. '. $p->rt. ' '. 'RW. '. $p->rw->nama_rw.', bahwa orang tersebut adalah warga kami yang berstatus Duda dan sampai sekarang belum menikah lagi.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Surat keterangan ini diperlukan untuk persyaratan melengkapi '. $p->melengkapi,0,1);
        $this->fpdf->Ln();

        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }
        
    }

    public function saveJanda(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'jk'                            => 'required',
            'tanggal_lahir'                 => 'required|date',
            'status_perkawinan'             => 'required',
            'status_kewarganegaraan'        => 'required',
            'agama'                         => 'required',
            'pekerjaan'                     => 'required',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',

            'pengantar_dari'                => 'required',
            'melengkapi'                     => 'required',

            'ktp'                           => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk'                            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar_rt'              => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kematian_akta_cerai'           => 'image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1 = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('suratjanda/ktp_janda'), $file1);

        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('suratjanda/kk_janda'), $file2);

        $file3 = time().'.'.$request->surat_pengantar_rt->extension();
        $request->surat_pengantar_rt->move(public_path('suratjanda/surat_pengantar_rt_janda'), $file3);

        $file4 = time().'.'.$request->kematian_akta_cerai->extension();
        $request->kematian_akta_cerai->move(public_path('suratjanda/kematian_akta_cerai'), $file4);

        $form = new SuratJanda;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->jk                           = $request->jk;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->status_perkawinan            = $request->status_perkawinan;
        $form->status_kewarganegaraan       = $request->status_kewarganegaraan;
        $form->agama                        = $request->agama;
        $form->pekerjaan                    = $request->pekerjaan;
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                      = $request->dis_id;
        $form->subdis_id                   = $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;

        $form->pengantar_dari               = $request->pengantar_dari;
        $form->melengkapi                       = $request->melengkapi;
       

        $form->ktp                              = $file1;
        $form->kk                               = $file2;
        $form->surat_pengantar_rt               = $file3;
        $form->kematian_akta_cerai              = $file4;

        $form->token                            = $token;
        $form->verifikasi                        = $request->verifikasi;
        $form->email                            = $request->email;
        $form->tanggal_buat_surat                = $request->tanggal_buat_surat;


      

        $form->save();
        Mail::to($request->email)->send(new \App\Mail\PembuatSuratKeteranganJanda($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    public function filterjanda(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $janda = Suratjanda::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.janda', compact('janda'));
    }

    public function layanan_surat_janda($id)
    {
        $data = SuratJanda::join('surat_janda_diterima', 'surat_janda_diterima.id_janda', '=', 'surat_janda.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','a4']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN JANDA',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Agama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name. ' '.'Kabupaten '. $p->cities->city_name,0,1);


        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan surat pengantar '. 'RT. '. $p->rt. ' '. 'RW. '. $p->rw->nama_rw.', bahwa orang tersebut adalah warga kami yang berstatus Janda dan sampai sekarang belum menikah lagi.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Surat keterangan ini diperlukan untuk persyaratan melengkapi '. $p->melengkapi,0,1);
        $this->fpdf->Ln();

        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }
        
    }

    public function saveSBM(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'jk'                            => 'required',
            'tanggal_lahir'                 => 'required|date',
            'status_perkawinan'             => 'required',
            'status_kewarganegaraan'        => 'required',
            'agama'                         => 'required',
            'pekerjaan'                     => 'required',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',

            'ktp'                           => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk'                            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar_rt'              => 'required|image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1 = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('suratbelummenikah/ktp'), $file1);

        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('suratbelummenikah/kk'), $file2);

        $file3 = time().'.'.$request->surat_pengantar_rt->extension();
        $request->surat_pengantar_rt->move(public_path('suratbelummenikah/pengantar_rt_rw'), $file3);

       

        $form = new SBM;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->jk                           = $request->jk;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->status_perkawinan            = $request->status_perkawinan;
        $form->status_kewarganegaraan       = $request->status_kewarganegaraan;
        $form->agama                        = $request->agama;
        $form->pekerjaan                    = $request->pekerjaan;
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                      = $request->dis_id;
        $form->subdis_id                   = $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;

        $form->ktp                              = $file1;
        $form->kk                               = $file2;
        $form->surat_pengantar_rt               = $file3;


        $form->token                            = $token;
        $form->verifikasi                        = $request->verifikasi;
        $form->email                            = $request->email;
        $form->tanggal_buat_surat                = $request->tanggal_buat_surat;


      

        $form->save();
        Mail::to($request->email)->send(new \App\Mail\PembuatSuratBelumMenikah($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    public function filterskbm(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $data = SBM::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.skbm', compact('data'));
    }

    public function layanan_surat_skbm($id)
    {
        $data = SBM::join('sbm_diterima', 'sbm_diterima.id_sbm', '=', 'sbm.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','a4']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN BELUM MENIKAH',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Agama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Pengantar Keterangan dari '. 'RT/RW. '. $p->rt. '/'. $p->rw->nama_rw. ' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis bahwa orang tersebut, sampai saat ini betul belum Menikah / Belum Kawin.',0,1);
        $this->fpdf->Ln();

        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }

    }

    public function saveBMR(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'jk'                            => 'required',
            'tanggal_lahir'                 => 'required|date',
            'status_perkawinan'             => 'required',
            'status_kewarganegaraan'        => 'required',
            'agama'                         => 'required',
            'pekerjaan'                     => 'required',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',

            'pengantar_dari_rt'             => 'required',
            'pengantar_dari_rw'             => 'required',

            'ktp'                           => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk'                            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar_rt'            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pernyataan_bermaterai'   => 'required|image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1 = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('bmr/ktp'), $file1);

        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('bmr/kk'), $file2);

        $file3 = time().'.'.$request->surat_pengantar_rt->extension();
        $request->surat_pengantar_rt->move(public_path('bmr/pengantar_rt_rw'), $file3);

        $file4 = time().'.'.$request->surat_pernyataan_bermaterai->extension();
        $request->surat_pernyataan_bermaterai->move(public_path('bmr/surat_pernyataan_bermaterai'), $file4);

       

        $form = new BMR;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->jk                           = $request->jk;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->status_perkawinan            = $request->status_perkawinan;
        $form->status_kewarganegaraan       = $request->status_kewarganegaraan;
        $form->agama                        = $request->agama;
        $form->pekerjaan                    = $request->pekerjaan;
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                      =  $request->dis_id;
        $form->subdis_id                   =  $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;

        $form->pengantar_dari_rt            = $request->pengantar_dari_rt;
        $form->pengantar_dari_rw            = $request->pengantar_dari_rw;

        $form->ktp                              = $file1;
        $form->kk                               = $file2;
        $form->surat_pengantar_rt               = $file3;
        $form->surat_pernyataan_bermaterai      = $file4;


        $form->token                            = $token;
        $form->verifikasi                        = $request->verifikasi;
        $form->email                            = $request->email;
        $form->tanggal_buat_surat                = $request->tanggal_buat_surat;


      
     
        $form->save();
        Mail::to($request->email)->send(new \App\Mail\PembuatSuratBelumMemilikiRumah($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    public function filterbmr(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $data = BMR::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.bmr', compact('data'));
    }


    public function layanan_surat_bmr($id)
    {
        $data = BMR::join('bmr_diterima', 'bmr_diterima.id_bmr', '=', 'bmr.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','a4']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN BELUM MEMILIKI RUMAH',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'      '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
         $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Agama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Pengantar Keterangan dari RT '.$p->pengantar_dari_rt. '  RW '.$p->pengantar_dari_rw. '  Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis bahwa orang tersebut, memang tidak memiliki hak kepemilikan atas rumah.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }

    }

    public function saveKematian(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'jk'                            => 'required',
            'tempat_lahir'                  => 'required',
            'tanggal_lahir'                 => 'required|date',
            'status_perkawinan'             => 'required',
            'status_kewarganegaraan'        => 'required',
            'agama'                         => 'required',
            'pekerjaan'                     => 'required',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',

            'lingkungan'                         => 'required',
            'pengantar_dari_rt'                  => 'required',
            'pengantar_dari_rw'                  => 'required',
            'tanggal_meninggal'                  => 'required|date',
            'disebabkan'                         => 'required',
            'ditempat'                           => 'required',
            'surat_diperlukan_untuk'             => 'required',

            'ktp_almarhum'                       => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk_almarhum'                        => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar_dari_rs'            => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_pengantar_dari_rt'            => 'required|image|mimes:jpeg,jpg,png|max:5000',

            'sk_terakhir'                       => 'image|mimes:jpeg,jpg,png|max:5000|nullable',
            'karip'                             => 'image|mimes:jpeg,jpg,png|max:5000|nullable',
            'tabungan_pensiunan'                => 'image|mimes:jpeg,jpg,png|max:5000|nullable',
          

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1 = time().'.'.$request->ktp_almarhum->extension();
        $request->ktp_almarhum->move(public_path('kematian/ktp'), $file1);

        $file2 = time().'.'.$request->kk_almarhum->extension();
        $request->kk_almarhum->move(public_path('kematian/kk'), $file2);

        $file3 = time().'.'.$request->surat_pengantar_dari_rt->extension();
        $request->surat_pengantar_dari_rt->move(public_path('kematian/pengantar_rt_rw'), $file3);


        if(!empty($request->surat_pengantar_dari_rs)){
            $file4 = time().'.'.$request->surat_pengantar_dari_rs->extension();
            $request->surat_pengantar_dari_rs->move(public_path('kematian/pengantar_rs'), $file4);
        }else{
            $file4 = '';
            $request->surat_pengantar_dari_rs;
        }

        if(!empty($request->sk_terakhir)){
            $file5 = time().'.'.$request->sk_terakhir->extension();
            $request->sk_terakhir->move(public_path('kematian/sk_terakhir'), $file5);
        }else{
            $file5 = '';
            $request->sk_terakhir;
        }
       

        if(!empty($request->karip)){
            $file6 = time().'.'.$request->karip->extension();
            $request->karip->move(public_path('kematian/karip'), $file6);
        }else{
            $file6 = '';
            $request->karip;
        }

        if(!empty($request->tabungan_pensiunan)){
            $file7 = time().'.'.$request->tabungan_pensiunan->extension();
            $request->tabungan_pensiunan->move(public_path('kematian/tabungan'), $file7);
        }else{
            $file7 = '';
            $request->tabungan_pensiunan;
        }


        $form = new Kematian;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->jk                           = $request->jk;
        $form->tempat_lahir                = $request->tempat_lahir;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->status_perkawinan            = $request->status_perkawinan;
        $form->status_kewarganegaraan       = $request->status_kewarganegaraan;
        $form->agama                        = $request->agama;
        $form->pekerjaan                    = $request->pekerjaan;
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                       =  $request->dis_id;
        $form->subdis_id                    =  $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;
        $form->lingkungan                   = $request->lingkungan;

        $form->pengantar_dari_rt            = $request->pengantar_dari_rt;
        $form->pengantar_dari_rw            = $request->pengantar_dari_rw;
        $form->tanggal_meninggal            = $request->tanggal_meninggal;
        $form->disebabkan                   = $request->disebabkan;
        $form->ditempat                     = $request->ditempat;
        $form->surat_diperlukan_untuk       = $request->surat_diperlukan_untuk;

        $form->ktp_almarhum                              = $file1;
        $form->kk_almarhum                               = $file2;
        $form->surat_pengantar_dari_rs                   = $file3;
        $form->surat_pengantar_dari_rt                   = $file4;
        $form->sk_terakhir                               = $file5;
        $form->karip                                     = $file6;
        $form->tabungan_pensiunan                        = $file7;


        $form->token                                 = $token;
        $form->verifikasi                            = $request->verifikasi;
        $form->email                                 = $request->email;
        $form->tanggal_buat_surat                    = $request->tanggal_buat_surat;


      
        
        $form->save();
        Mail::to($request->email)->send(new \App\Mail\PembuatSuratKematian($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    public function filterkematian(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $data = Kematian::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.kematian', compact('data'));
    }

    public function layanan_surat_kematian($id)
    {
        $data = Kematian::join('kematian_diterima', 'kematian_diterima.id_kematian', '=', 'kematian.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','a4']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN KEMATIAN',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'      '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NIK',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nik,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tempat Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->tempat_lahir,0,1);


        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,6,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Agama',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Pengantar Keterangan dari RT '. $p->pengantar_dari_rt. ' RW '. $p->pengantar_dari_rw. ' Lingkungan '.$p->lingkungan. ' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis, benar bahwa orang tersebut diatas telah meninggal dunia pada tanggal '.(tgl_indo($p->tanggal_meninggal)). '.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Disebabkan '. $p->disebabkan. ' di '. $p->ditempat. '.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Surat Keterangan ini diperlukan untuk '. $p->surat_diperlukan_untuk. '.',0,1);
        $this->fpdf->Ln();

        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }
    }

    public function saveDomisiliPT(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nama_lembaga'                  => 'required|string|max:100',
            'prov_id'                       => 'required',
            'city_id'                       => 'required',
            'dis_id'                        => 'required',
            'subdis_id'                     => 'required',
            'id_rw'                         => 'required',
            'rt'                            => 'required',

            'npwp_pt'                            => 'required',
            'pimpinan'                           => 'required',
            'surat_keterangan_dari'              => 'required',


            'ktp'                       => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'kk'                        => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'npwp'                      => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'surat_keterangan_rt'       => 'required|image|mimes:jpeg,jpg,png|max:5000',

            'verifikasi'                    => 'required',
            'email'                         => 'required',
            'tanggal_buat_surat'            => 'required|date',
            
        ]);

        $file1 = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('domisiliPT/ktp'), $file1);

        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('domisiliPT/kk'), $file2);

        $file3 = time().'.'.$request->npwp->extension();
        $request->npwp->move(public_path('domisiliPT/npwp'), $file3);

        $file4 = time().'.'.$request->surat_keterangan_rt->extension();
        $request->surat_keterangan_rt->move(public_path('domisiliPT/surat_keterangan_rt'), $file4);



        $form = new DomisiliPT;
        $form->nama_lembaga                 = $request->nama_lembaga;
     
        $form->prov_id                      = $request->prov_id;
        $form->city_id                      = $request->city_id;
        $form->dis_id                       =  $request->dis_id;
        $form->subdis_id                    =  $request->subdis_id;
        $form->id_rw                        = $request->id_rw;
        $form->rt                           = $request->rt;

        $form->npwp_pt                          = $request->npwp_pt;
        $form->pimpinan                         = $request->pimpinan;
        $form->surat_keterangan_dari            = $request->surat_keterangan_dari;

        $form->ktp                                       = $file1;
        $form->kk                                        = $file2;
        $form->npwp                                      = $file3;
        $form->surat_keterangan_rt                       = $file4;

        $form->token                                 = $token;
        $form->verifikasi                            = $request->verifikasi;
        $form->email                                 = $request->email;
        $form->tanggal_buat_surat                    = $request->tanggal_buat_surat;


      
        
        $form->save();
        Mail::to($request->email)->send(new \App\Mail\PembuatSuratDomisiliPT($form));
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat Harap Periksa Email anda untuk mendapatkan hasil inputan anda, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
    }

    
    public function filterdomisiliPT(Request $request)
    {

        $token = $request->token;
        
        if(!empty($token)){
            $data = DomisiliPT::where('token', 'like', "%" . $token . "%")->get();
        }else{
            Alert::error('Maaf', 'token tersebut tidak ditemukan, silahkan lakukan pembuatan surat untuk mendapatkan token ')->persistent('Close');
            return redirect()->route('index');
        }
        return view('layanan.domisili_pt', compact('data'));
    }

    public function layanan_surat_domisilipt($id)
    {
        $data = DomisiliPT::join('domisili_pt_terima', 'domisili_pt_terima.id_domisili_pt_diterima', '=', 'domisili_pt.id')
        ->where('id',$id)->get();

        foreach ($data as $p) {
          
        $this->fpdf = new Fpdf;
        $this->fpdf->SetFont('times', 'B', 15);
        $this->fpdf->AddPage(['P','mm','a4']);
        $this->fpdf->image('assets/img/logocms.png',14,10,16,25);
        // $this->fpdf->Text(10, 10, $p->nama);
        
        $this->fpdf->SetFont('times','B',20);

        // Membuat string
        $this->fpdf->Cell(200,6,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,7,'KECAMATAN CIAMIS',0,1,'C');
        $this->fpdf->Cell(200,8,'KELURAHAN CIAMIS',0,1,'C');

        $this->fpdf->SetFont('times','B',10);
        $this->fpdf->Cell(200,9,'Jalan Pemuda Nomor 1 Telp.(0265)771045 Ciamis 46211',0,1,'C');
        $this->fpdf->SetFont('times','B',9);
        // $this->fpdf->Cell(200,5,'',0,1,'C');


        // Setting spasi kebawah supaya tidak rapat
        $this->fpdf->Cell(10,5,'',0,1);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->Line(10,39,200,39);
        $this->fpdf->SetLineWidth(0);
        $this->fpdf->Line(10,40,200,40);

        $this->fpdf->SetFont('times','BU',14);


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN DOMISILI',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel:'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan dibawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan dengan sebenarnya bahwa :',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Nama Lembaga',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->nama_lembaga,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Alamat',0,0);
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' '. 'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'NPWP Perusahaan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->npwp_pt,0,1);

        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->Cell(35,6,'Pimpinan',0,0);
        $this->fpdf->Cell(50,6,':  '.$p->pimpinan,0,1);

        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Keterangan dari RT. '. $p->surat_keterangan_dari.' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis, bahwa '.$p->nama_lembaga.' berdomisili pada alamat tersebut di atas.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,6,'',0,0,'C');
        $this->fpdf->Cell(82,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,6,'',0,0,'C');
        $this->fpdf->Cell(77,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(100,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(4,35,'WAHYU GHIFARY SETIAWAN, S.STP., MM.',0,0,'C');

        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(2,44,'NIP. 19921107 201507 1 001',0,1,'C');
        $this->fpdf->Output();
       
        exit; 
        }
    }
}