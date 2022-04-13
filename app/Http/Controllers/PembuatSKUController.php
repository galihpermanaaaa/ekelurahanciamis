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
use App\Models\SKU;
use App\Models\SKUDiterima;
use App\Models\SKUDitolak;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Codedge\Fpdf\Fpdf\Fpdf;
use Hash;
use DB;
use Auth;
use Alert;
use App\Mail\SKUMail;
use App\Helpers;
use App\tgl_indo;
use Illuminate\Support\Facades\Mail;

class PembuatSKUController extends Controller
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

        $halaman = "data_sku";
        $user = User::all();
        $sku = SKU::orderBy('id', 'DESC')->get();
        $rw = RW::all();
        $count_terverifikasi = SKU::where('verifikasi', 'Terverifikasi')->count();
        $count_ditolak = SKU::where('verifikasi', 'Ditolak')->count();
        return view('user.sku.data_sku', compact('halaman', 'sku', 'rw', 'count_terverifikasi', 'count_ditolak'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function indexRW()
    {
        if (Auth::user()->role_name=='RW')
        {

        $halaman = "data_sku";
            $sku = SKU::orderBy('id', 'DESC')
            ->where('id_rw',auth()->user()->id_rw)
            ->get();

            $user = RW::where('id_rw',auth()->user()->id_rw)->get();
        return view('user.sku.data_sku_rw', compact('halaman', 'sku', 'user'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function verifikasi($id)
    {
        if (Auth::user()->role_name=='Verifikator')
        {
        $data = SKU::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.sku.verifikasi',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
        }
        else
        {
            return redirect()->route('login');
        }
    }


    public function lihat_data_sku($id)
    {
       
        $data = SKU::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.sku.lihat_data_sku',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
       
    }

    public function filterskurw(Request $request)
    {

        $id_rw = $request->id_rw;
        
        if(!empty($id_rw)){
            $user = User::all();
            $sku = SKU::where('id_rw', 'like', "%" . $id_rw . "%")->get();
            $rw = RW::all();
            $count_terverifikasi = SKU::where('verifikasi', 'Terverifikasi')->count();
            $count_ditolak = SKU::where('verifikasi', 'Ditolak')->count();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('dashboard');
        }
        return view('user.sku.data_sku', compact('sku', 'rw', 'user', 'count_terverifikasi', 'count_ditolak'));
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
    public function verifikasi_sku(Request $request)
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
        $keperluan                    = $request->keperluan;
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
            'keperluan'          => $keperluan,
            'token'              => $token, 
            'tanggal_buat_surat' => $tanggal_buat_surat,

        ];

       
        SKU::where('id',$request->id)->update($form);
        if($verifikasi=='Terverifikasi'){
            $form1 = new SKUDiterima;
            $form1->id_sku = $request->id;
            $form1->save();
        }elseif($verifikasi=='Ditolak'){
            $form2 = new SKUDitolak;
            $form2->id_sku = $request->id;
            $form2->save();
        }
        Mail::to($request->email)->send(new \App\Mail\VerifikasiSKU($form));
        Alert::success('Data Tersebut Berhasil Diverifikasi :)','Success');
        return redirect()->route('user/sku/data_sku');

    }


    public function surat_sku($id)
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
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel.'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan di bawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan:',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Nama',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->nama,0,1);


        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'NIK',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->nik,0,1);


        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Tanggal Lahir',0,0);
        $this->fpdf->Cell(50,7,':  '.(tgl_indo($p->tanggal_lahir)),0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Jenis Kelamin',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->jk,0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Status Perkawinan',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->status_perkawinan,0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Kewarganegaraan',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->status_kewarganegaraan,0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Agama',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->agama,0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Pekerjaan',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->pekerjaan,0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Alamat',0,0);
        $this->fpdf->Cell(50,7,':  '. $p->nama_jalan.'  RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' ',0,1);
        $this->fpdf->Cell(39,7,'',0,0);
        $this->fpdf->Cell(50,7,'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan surat pengantar dari RT.'. $p->rt. ' '. 'RW.'. $p->rw->nama_rw,0,1);
        $this->fpdf->Cell(1,6,'',0,0);
        $this->fpdf->write(8,'dengan nomor: '. $p->nomor_surat_pengantar_rw_rt. ' '. 'orang tersebut di atas adalah warga kami yang mempunyai kegiatan usaha'. ' dibidang : '. $p->bidang_usaha.'.'. ' Surat keterangan ini diperlukan untuk '. $p->keperluan.'.',0,1);
        
        
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Demikian Surat Keterangan ini dibuat dengan sebenarnya agar yang berwenang menjadi maklum dan dapat dipergunakan sebagaimana mestinya.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Ln();


        
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(37,7,'',0,0,'C');
        $this->fpdf->Cell(82,7,'',0,0);
        $this->fpdf->Cell(14,7,'Ciamis,',0,0);
        $this->fpdf->Cell(30,7,(tgl_indo($p->tanggal_verifikasi)),0,1);



        $this->fpdf->Cell(42,7,'',0,0,'C');
        $this->fpdf->Cell(74,7,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,7,'LURAH CIAMIS',0,1, 'C');
        

        $this->fpdf->Cell(40,20,'',0,0, 'C');
        $this->fpdf->Cell(98,20,'',0,0);
        $this->fpdf->SetFont('times','BU',12);
        $this->fpdf->Cell(1,35,'WAHYU GHIFARY SETIAWAN, S.STP., M.M.',0,0,'C');
 
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(1,44,'NIP. 19921107 201507 1 001',0,1,'C');
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
    public function destroy_sku(Request $request)
   {
    $sku = SKU::findOrFail($request->id);
    $image_path = public_path().'/sku/ktp/'.$sku->ktp;
    $image_path1 = public_path().'/sku/kk/'.$sku->kk;
    $image_path2 = public_path().'/sku/surat_pengantar/'.$sku->surat_pengantar;
    $image_path3 = public_path().'/sku/keterangan_domisili/'.$sku->keterangan_domisili;
    
    unlink($image_path);
    unlink($image_path1);
    unlink($image_path2);

    if(!empty($sku->keterangan_domisili)){
        $image_path3 = public_path().'/sku/keterangan_domisili/'.$sku->keterangan_domisili;
        unlink($image_path3);
    }else{
        $image_path3='';
    }

    
    $sku->delete();
    Alert::success('SKU tersebut berhasil dihapus :)','Success');
    return redirect()->route('user/sku/data_sku');
   }
}
