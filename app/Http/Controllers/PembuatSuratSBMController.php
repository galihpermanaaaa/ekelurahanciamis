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
use App\Models\SBM;
use App\Models\SBM_Diterima;
use App\Models\SBM_Ditolak;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Codedge\Fpdf\Fpdf\Fpdf;
use Hash;
use DB;
use Auth;
use Alert;
use App\Mail\VerifikasiSuratBelumNikah;
use App\Helpers;
use App\tgl_indo;
use Illuminate\Support\Facades\Mail;

class PembuatSuratSBMController extends Controller
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

        $halaman = "data_skbm";
        $user = User::all();
        $data = SBM::orderBy('id', 'DESC')->get();
        $rw = RW::all();
        $count_terverifikasi = SBM::where('verifikasi', 'Terverifikasi')->count();
        $count_ditolak = SBM::where('verifikasi', 'Ditolak')->count();
        return view('user.skbm.data_skbm', compact('halaman', 'data', 'rw', 'count_terverifikasi', 'count_ditolak'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function filterskbmrw(Request $request)
    {

        $id_rw = $request->id_rw;
        
        if(!empty($id_rw)){
            $user = User::all();
            $data = SBM::where('id_rw', 'like', "%" . $id_rw . "%")->get();
            $rw = RW::all();
            $count_terverifikasi = SBM::where('verifikasi', 'Terverifikasi')->count();
            $count_ditolak = SBM::where('verifikasi', 'Ditolak')->count();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('dashboard');
        }
        return view('user.skbm.data_skbm', compact('data', 'rw', 'user', 'count_terverifikasi', 'count_ditolak'));
    }

    public function indexRWSkbm()
    {
        if (Auth::user()->role_name=='RW')
        {

        $halaman = "data_skbm_rw";
            $data = SBM::orderBy('id', 'DESC')
            ->where('id_rw',auth()->user()->id_rw)
            ->get();

            $user = RW::where('id_rw',auth()->user()->id_rw)->get();
        return view('user.skbm.data_skbm_rw', compact('halaman', 'data', 'user'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function verifikasi_skbm($id)
    {
        if (Auth::user()->role_name=='Verifikator')
        {
        $data = SBM::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.skbm.verifikasi_skbm',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
        }
        else
        {
            return redirect()->route('login');
        }
    }


    public function lihat_data_skbm($id)
    {
       
        $data = SBM::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.skbm.lihat_data_skbm',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
       
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
    public function verifikasi_skbm_skbm(Request $request)
    {
        $id                     = $request->id;
        $nama                   = $request->nama;
        $tanggal_lahir          = $request->tanggal_lahir;
        $jk                     = $request->jk;
        $id_users               = $request->id_users;
        $verifikasi             = $request->verifikasi;
        $deskripsi              = $request->deskripsi;
        $email                  = $request->email;
        $tanggal_verifikasi     = $request->tanggal_verifikasi; 

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
            'jk'                 => $jk,
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

        ];

       
        SBM::where('id',$request->id)->update($form);
        if($verifikasi=='Terverifikasi'){
            $form1 = new SBM_Diterima;
            $form1->id_sbm = $request->id;
            $form1->save();
        }elseif($verifikasi=='Ditolak'){
            $form2 = new SBM_Ditolak;
            $form2->id_sbm = $request->id;
            $form2->save();
        }
        Mail::to($request->email)->send(new \App\Mail\VerifikasiSuratBelumNikah($form));
        Alert::success('Data Tersebut Berhasil Diverifikasi :)','Success');
        return redirect()->route('user/skbm/data_skbm');

    }


    public function surat_skbm($id)
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
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'          '.'/Kel.'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',13);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->MultiCell(189,8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,'J',false);

        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Nama',0,0);
        $this->fpdf->Cell(50,8,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'NIK',0,0);
        $this->fpdf->Cell(50,8,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,8,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,8,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,8,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,8,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Agama',0,0);
        $this->fpdf->Cell(50,8,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,8,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,8,'',0,0);
        $this->fpdf->Cell(35,8,'Alamat',0,0);
        $this->fpdf->Cell(50,8,':  '. $p->nama_jalan.'  RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' ',0,1);
        $this->fpdf->Cell(39,8,'',0,0);
        $this->fpdf->Cell(50,8,'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->SetFont('times','',13);
        $this->fpdf->Cell(1,0.6,'',0,0);
        $this->fpdf->MultiCell(189,8,'       Berdasarkan Surat Pengantar dari '. 'RT/RW. '. $p->rt. '/'. $p->rw->nama_rw. ' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis bahwa orang tersebut, sampai saat ini betul Belum Menikah / Belum Kawin.','J',1,);
        $this->fpdf->Cell(1,0.6,'',0,0); 
        $this->fpdf->MultiCell(189,8,'       Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum dan dapat dipergunakan sebagaimana mestinya. ','J',1,);
        $this->fpdf->Ln(3);

       
        $this->fpdf->SetFont('times','',13);
        $this->fpdf->Cell(37,8,'',0,0,'C');
        $this->fpdf->Cell(82,8,'',0,0);
        $this->fpdf->Cell(14,8,'Ciamis,',0,0);
        $this->fpdf->Cell(30,8,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,8,'',0,0,'C');
        $this->fpdf->Cell(74,8,'',0,0);
        $this->fpdf->SetFont('times','B',13);
        $this->fpdf->Cell(48,3,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(98,20,'',0,0);
        $this->fpdf->SetFont('times','BU',13);
        $this->fpdf->Cell(1,44,'WAHYU GHIFARY SETIAWAN, S.STP., M.M.',0,0,'C');
 
        $this->fpdf->SetFont('times','B',13);
        $this->fpdf->Cell(1,54,'NIP. 19921107 201507 1 001',0,1,'C');
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
    public function destroy_skbm(Request $request)
   {
    $sbm = SBM::findOrFail($request->id);
    $image_path = public_path().'/suratbelummenikah/ktp/'.$sbm->ktp;
    $image_path1 = public_path().'/suratbelummenikah/kk/'.$sbm->kk;
    $image_path2 = public_path().'/suratbelummenikah/pengantar_rt_rw/'.$sbm->surat_pengantar_rt;
    unlink($image_path);
    unlink($image_path1);
    unlink($image_path2);
    $sbm->delete();
    Alert::success('Surat Keterangan Belum Menikah tersebut berhasil dihapus :)','Success');
    return redirect()->route('user/skbm/data_skbm');
   }
}
