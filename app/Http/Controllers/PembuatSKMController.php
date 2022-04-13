<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\RW;
use App\Models\User;
use Carbon\Carbon;
use App\Models\SKM;
use App\Models\SKMDiterima;
use App\Models\SKMDitolak;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Codedge\Fpdf\Fpdf\Fpdf;
use Hash;
use DB;
use Auth;
use Alert;
use App\Mail\SKMMail;
use App\Mail\VerifikasiSKMKelurahanCiamis;
use App\Helpers;
use App\tgl_indo;
use Illuminate\Support\Facades\Mail;

class PembuatSKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
       
        {

        $halaman = "data_skm";
        $skm = SKM::orderBy('id', 'DESC')->get();
        $rw = RW::all();
        $count_terverifikasi = SKM::where('verifikasi', 'Terverifikasi')->count();
        $count_ditolak = SKM::where('verifikasi', 'Ditolak')->count();
        return view('user.skm.data_skm', compact('halaman', 'skm', 'rw', 'count_terverifikasi', 'count_ditolak'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function filterskmrw(Request $request)
    {

        $id_rw = $request->id_rw;
        
        if(!empty($id_rw)){
            $user = User::all();
            $skm = SKM::where('id_rw', 'like', "%" . $id_rw . "%")->get();
            $rw = RW::all();
            $count_terverifikasi = SKM::where('verifikasi', 'Terverifikasi')->count();
            $count_ditolak = SKM::where('verifikasi', 'Ditolak')->count();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('dashboard');
        }
        return view('user.skm.data_skm', compact('skm', 'rw', 'user', 'count_terverifikasi', 'count_ditolak'));
    }

    public function indexRWSkm()
    {
        if (Auth::user()->role_name=='RW')
        {

        $halaman = "data_skm";
            $skm = SKM::orderBy('id', 'DESC')
            ->where('id_rw',auth()->user()->id_rw)
            ->get();

            $user = RW::where('id_rw',auth()->user()->id_rw)->get();
        return view('user.skm.data_skm_rw', compact('halaman', 'skm', 'user'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function verifikasi_skm($id)
    {
        if (Auth::user()->role_name=='Verifikator')
        {
        $data = SKM::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.skm.verifikasi_skm',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
        }
        else
        {
            return redirect()->route('login');
        }
    }


    public function lihat_data_skm($id)
    {
       
        $data = SKM::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.skm.lihat_data_skm',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
       
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifikasi_skm_skm(Request $request)
    {
        $id                     = $request->id;
        $nama                   = $request->nama;
        $tanggal_lahir          = $request->tanggal_lahir;
        $tempat_lahir           = $request->tempat_lahir;
        $nomor_bdt              = $request->nomor_bdt;
        $id_users               = $request->id_users;
        $verifikasi             = $request->verifikasi;
        $deskripsi              = $request->deskripsi;
        $email                  = $request->email;
        $tanggal_verifikasi     = $request->tanggal_verifikasi; 
        $id_users               = $request->id_users;

        $city_id                      = $request->city_id;
        $dis_id                       = $request->dis_id;
        $subdis_id                    = $request->subdis_id;
        $id_rw                        = $request->id_rw;
        $rt                           = $request->rt;
        $token                        = $request->token;
        $tanggal_buat_surat           = $request->tanggal_buat_surat;
             

        $form = [

            'id'                 => $id,
            'nama'               => $nama,
            'tanggal_lahir'      => $tanggal_lahir,
            'tempat_lahir'      => $tempat_lahir,
            'nomor_bdt'          => $nomor_bdt,
            'id_users'           => $id_users,
            'verifikasi'         => $verifikasi,
            'deskripsi'          => $deskripsi,
            'email'              => $email,
            'tanggal_verifikasi' => $tanggal_verifikasi,
            'city_id'            => $city_id,
            'dis_id'             => $dis_id,
            'subdis_id'          => $subdis_id,
            'id_rw'              => $id_rw,
            'rt'                 => $rt,
            'token'              => $token, 
            'tanggal_buat_surat' => $tanggal_buat_surat,
            'id_users'           => $id_users,
            

        ];

        SKM::where('id',$request->id)->update($form);
        if($verifikasi=='Terverifikasi'){
            $form1 = new SKMDiterima;
            $form1->id_skm = $request->id;
            $form1->save();
        }elseif($verifikasi=='Ditolak'){
            $form2 = new SKMDitolak;
            $form2->id_skm = $request->id;
            $form2->save();
        }
        Mail::to($request->email)->send(new \App\Mail\VerifikasiSKMKelurahanCiamis($form));
        Alert::success('Data Tersebut Berhasil Diverifikasi :)','Success');
        return redirect()->route('user/skm/data_skm');

    }


    public function surat_skm($id)
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
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'          '.'/Kel.'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
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
        $this->fpdf->Cell(50,6,':  '. $p->nama_jalan.'  RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' ',0,1);
        $this->fpdf->Cell(39,6,'',0,0);
        $this->fpdf->Cell(50,6,'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);
        
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
        $this->fpdf->Cell(99,6,'Camat Ciamis',0,0);
        $this->fpdf->Cell(10,6,'Lurah Ciamis',0,1);
   

        $this->fpdf->Cell(5,25,'',0,0, 'C');
        $this->fpdf->Cell(1,30,'',0,0);
        $this->fpdf->SetFont('times','Bu',12);
        $this->fpdf->Cell(87,30,' Drs. DEDY MUDYANA, M.Si',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(150,30,'WAHYU GHIFARY SETIAWAN, S.STP., M.M.',0,1);
        $this->fpdf->SetFont('times','',11);
        $this->fpdf->Cell(10,-20,'',0,0);
        $this->fpdf->Cell(102,-20,'NIP. 19670610 198609 1 001.',0,0);
        $this->fpdf->Cell(100,-20,'NIP. 19921107 201507 1 001.',0,1);



     
        $this->fpdf->Output();
       
        exit; 
        }


        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_skm(Request $request)
   {
    $skm = SKM::findOrFail($request->id);
    $image_path = public_path().'/skm/surat_pengantar_rt_rw_skm/'.$skm->surat_pengantar_rt_rw;
    $image_path1 = public_path().'/skm/kk_skm/'.$skm->kk;
    $image_path2 = public_path().'/skm/surat_pernyataan_miskin_skm/'.$skm->surat_pernyataan_miskin;
    unlink($image_path);
    unlink($image_path1);
    unlink($image_path2);
    $skm->delete();
    Alert::success('SKM tersebut berhasil dihapus :)','Success');
    return redirect()->route('user/skm/data_skm');
   }

}