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
use App\Models\DomisiliPT;
use App\Models\DomisiliPTTerima;
use App\Models\DomisiliPTolak;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Codedge\Fpdf\Fpdf\Fpdf;
use Hash;
use DB;
use Auth;
use Alert;
use App\Mail\VerifikasiSuratKeteranganDomisiliPT;
use App\Helpers;
use App\tgl_indo;
use Illuminate\Support\Facades\Mail;

class PembuatSuratDomisiliPTController extends Controller
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

        $halaman = "data_domisilipt";
        $user = User::all();
        $data = DomisiliPT::orderBy('id', 'DESC')->get();
        $count_terverifikasi = DomisiliPT::where('verifikasi', 'Terverifikasi')->count();
        $count_ditolak = DomisiliPT::where('verifikasi', 'Ditolak')->count();
        $rw = RW::all();
        return view('user.domisili_pt.data_domisilipt', compact('halaman', 'data', 'rw', 'count_terverifikasi', 'count_ditolak'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function filterdomisilipt(Request $request)
    {

        $id_rw = $request->id_rw;
        
        if(!empty($id_rw)){
            $user = User::all();
            $data = DomisiliPT::where('id_rw', 'like', "%" . $id_rw . "%")->get();
            $rw = RW::all();
            $count_terverifikasi = DomisiliPT::where('verifikasi', 'Terverifikasi')->count();
            $count_ditolak = DomisiliPT::where('verifikasi', 'Ditolak')->count();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('dashboard');
        }
        return view('user.domisili_pt.data_domisilipt', compact('data', 'rw', 'user', 'count_terverifikasi', 'count_ditolak'));
    }

    public function indexRWDomisiliPT()
    {
        if (Auth::user()->role_name=='RW')
        {

        $halaman = "data_domisilipt_rw";
            $data = DomisiliPT::orderBy('id', 'DESC')
            ->where('id_rw',auth()->user()->id_rw)
            ->get();

            $user = RW::where('id_rw',auth()->user()->id_rw)->get();
        return view('user.domisili_pt.data_domisilipt_rw', compact('halaman', 'data', 'user'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function verifikasi_domisilipt($id)
    {
        if (Auth::user()->role_name=='Verifikator')
        {
        $data = DomisiliPT::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.domisili_pt.verifikasi_domisilipt',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
        }
        else
        {
            return redirect()->route('login');
        }
    }


    public function lihat_data_domisilipt($id)
    {
       
        $data = DomisiliPT::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.domisili_pt.lihat_data_domisilipt',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
       
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
    public function verifikasi_domisilipt_domisilipt(Request $request)
    {
        $id                     = $request->id;
        $nama_lembaga           = $request->nama_lembaga;
        $npwp_pt                = $request->npwp_pt;
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
            'nama_lembaga'      => $nama_lembaga,
            'npwp_pt'            => $npwp_pt,
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

       
        DomisiliPT::where('id',$request->id)->update($form);
        if($verifikasi=='Terverifikasi'){
            $form1 = new DomisiliPTTerima;
            $form1->id_domisili_pt = $request->id;
            $form1->save();
        }elseif($verifikasi=='Ditolak'){
            $form2 = new DomisiliPTTolak;
            $form2->id_domisili_pt = $request->id;
            $form2->save();
        }
        Mail::to($request->email)->send(new \App\Mail\VerifikasiSuratKeteranganDomisiliPT($form));
        Alert::success('Data Tersebut Berhasil Diverifikasi :)','Success');
        return redirect()->route('user/domisili_pt/data_domisilipt');

    }


    public function surat_domisilipt($id)
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
        $this->fpdf->Cell(190,6,'Nomor: 140/'.'        '.'/Kel.'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Yang bertanda tangan dibawah ini Lurah Ciamis Kecamatan Ciamis Kabupaten Ciamis menerangkan dengan sebenarnya bahwa :',0,1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Nama Lembaga',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->nama_lembaga,0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'Alamat',0,0);
        $this->fpdf->Cell(50,7,':  '. $p->nama_jalan.'  RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'Kelurahan '. $p->subdistricts->subdis_name. ' ',0,1);
        $this->fpdf->Cell(39,7,'',0,0);
        $this->fpdf->Cell(50,7,'Kecamatan '. $p->districts->dis_name.' Kabupaten '. $p->cities->city_name,0,1);

        $this->fpdf->Cell(1,7,'',0,0);
        $this->fpdf->Cell(35,7,'NPWP Perusahaan',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->npwp_pt,0,1);

        $this->fpdf->Cell(1,7,'',0,0); 
        $this->fpdf->Cell(35,7,'Pimpinan',0,0);
        $this->fpdf->Cell(50,7,':  '.$p->pimpinan,0,1);

        $this->fpdf->Cell(10,7,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Surat Keterangan dari '. $p->surat_keterangan_dari.' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis, bahwa '.$p->nama_lembaga.' berdomisili pada alamat tersebut di atas.',0,1);
        $this->fpdf->Ln();
        $this->fpdf->Cell(10,7,'',0,0);
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
    public function destroy_domisilipt(Request $request)
   {
    $skdp = DomisiliPT::findOrFail($request->id);
    
        $image_path = $skdp->ktp;
        $image_path1 = $skdp->kk;
        $image_path2 = $skdp->npwp;
        $image_path3 = $skdp->surat_keterangan_rt;

        if(!empty($skdp->ktp)){
            $image_path = public_path().'/domisiliPT/ktp/'.$skdp->ktp;
            unlink($image_path);
        }else{
            $image_path='';
           
        }
 
        if(!empty($skdp->kk)){
            $image_path1 = public_path().'/domisiliPT/kk/'.$skdp->kk;
            unlink($image_path1);
        }else{
            $image_path1='';
        }

        if(!empty($skdp->npwp)){
            $image_path2 = public_path().'/domisiliPT/npwp/'.$skdp->npwp;
            unlink($image_path2);
        }else{
            $image_path2='';
        }

        if(!empty($skdp->surat_keterangan_rt)){
            $image_path3 = public_path().'/domisiliPT/surat_keterangan_rt/'.$skdp->surat_keterangan_rt;
            unlink($image_path3);
        }else{
            $image_path3='';
        }

    $skdp->delete();
    Alert::success('Data tersebut berhasil dihapus :)','Success');
    return redirect()->route('user/domisili_pt/data_domisilipt');
   }
}