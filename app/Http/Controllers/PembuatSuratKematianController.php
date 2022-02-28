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
use App\Models\Kematian;
use App\Models\KematianDiterima;
use App\Models\KematianDitolak;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Codedge\Fpdf\Fpdf\Fpdf;
use Hash;
use DB;
use Auth;
use Alert;
use App\Mail\VerifikasiSuratKeteranganKematian;
use App\Helpers;
use App\tgl_indo;
use Illuminate\Support\Facades\Mail;

class PembuatSuratKematianController extends Controller
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

        $halaman = "data_kematian";
        $user = User::all();
        $data = Kematian::orderBy('id', 'DESC')->get();
        $count_terverifikasi = Kematian::where('verifikasi', 'Terverifikasi')->count();
        $count_ditolak = Kematian::where('verifikasi', 'Ditolak')->count();
        $rw = RW::all();
        return view('user.kematian.data_kematian', compact('halaman', 'data', 'rw', 'count_terverifikasi', 'count_ditolak'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function filterkematian(Request $request)
    {

        $id_rw = $request->id_rw;
        
        if(!empty($id_rw)){
            $user = User::all();
            $data = Kematian::where('id_rw', 'like', "%" . $id_rw . "%")->get();
            $rw = RW::all();
            $count_terverifikasi = Kematian::where('verifikasi', 'Terverifikasi')->count();
            $count_ditolak = Kematian::where('verifikasi', 'Ditolak')->count();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('dashboard');
        }
        return view('user.kematian.data_kematian', compact('data', 'rw', 'user', 'count_terverifikasi', 'count_ditolak'));
    }

    public function indexRWKematian()
    {
        if (Auth::user()->role_name=='RW')
        {

        $halaman = "data_kematian_rw";
            $data = Kematian::orderBy('id', 'DESC')
            ->where('id_rw',auth()->user()->id_rw)
            ->get();

            $user = RW::where('id_rw',auth()->user()->id_rw)->get();
        return view('user.kematian.data_kematian_rw', compact('halaman', 'data', 'user'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function verifikasi_kematian($id)
    {
        if (Auth::user()->role_name=='Verifikator')
        {
        $data = Kematian::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.kematian.verifikasi_kematian',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
        }
        else
        {
            return redirect()->route('login');
        }
    }


    public function lihat_data_kematian($id)
    {
       
        $data = Kematian::where('id',$id)->get();
        $provinsi =Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $rw = RW::all();
        return view('user.kematian.lihat_data_kematian',compact('data', 'provinsi', 'kota', 'kecamatan', 'desa', 'rw'));
       
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
    public function verifikasi_kematian_kematian(Request $request)
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

       
        Kematian::where('id',$request->id)->update($form);
        if($verifikasi=='Terverifikasi'){
            $form1 = new KematianDiterima;
            $form1->id_kematian = $request->id;
            $form1->save();
        }elseif($verifikasi=='Ditolak'){
            $form2 = new KematianDitolak;
            $form2->id_kematian = $request->id;
            $form2->save();
        }
        Mail::to($request->email)->send(new \App\Mail\VerifikasiSuratKeteranganKematian($form));
        Alert::success('Data Tersebut Berhasil Diverifikasi :)','Success');
        return redirect()->route('user/kematian/data_kematian');

    }


    public function surat_kematian($id)
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
        $this->fpdf->Cell(190,6,'Nomor:'.$p->id_kematian_diterima.'/'.$p->id_kematian_diterima.'/Kel-'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
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
        $this->fpdf->write(8,'Sepengetahuan kami berdasarkan Surat Pengantar Keterangan dari RT '. $p->pengantar_dari_rt. ' RW '. $p->pengantar_dari_rw. ' Lingkungan '.$p->lingkungan. ' Kelurahan Ciamis Kecamatan Ciamis Kabupaten Ciamis, benar bahwa orang tersebut diatas telah meninggal dunia pada tanggal '.(tgl_indo($p->tanggal_meninggal)). '.',0,1);
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

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_kematian(Request $request)
   {
    $kematian = Kematian::findOrFail($request->id);
    
        $image_path = $kematian->ktp_almarhum;
        $image_path1 = $kematian->kk_almarhum;
        $image_path2 = $kematian->surat_pengantar_dari_rs;
        $image_path3 = $kematian->surat_pengantar_dari_rt;
        $image_path4 = $kematian->sk_terakhir;
        $image_path5 = $kematian->karip;
        $image_path6 = $kematian->tabungan_pensiunan;

        if(!empty($kematian->ktp_almarhum)){
            $image_path = public_path().'/kematian/ktp/'.$kematian->ktp_almarhum;
            unlink($image_path);
        }else{
            $image_path='';
           
        }

        if(!empty( $kematian->kk_almarhum)){
            $image_path1 = public_path().'/kematian/kk/'.$kematian->kk_almarhum;
            unlink($image_path1);
        }else{
            $image_path1='';
        }

        if(!empty($kematian->surat_pengantar_dari_rs)){
            $image_path2 = public_path().'/kematian/pengantar_rs/'.$kematian->surat_pengantar_dari_rs;
            unlink($image_path2);
        }else{
            $image_path2='';
        }

        if(!empty($kematian->surat_pengantar_dari_rt)){
            $image_path3 = public_path().'/kematian/pengantar_rt_rw/'.$kematian->surat_pengantar_dari_rt;
            unlink($image_path3);
        }else{
            $image_path3='';
        }


        if(!empty($kematian->sk_terakhir)){
            $image_path4 = public_path().'/kematian/sk_terakhir/'.$kematian->sk_terakhir;
            unlink($image_path4);
        }else{
            $image_path4='';
        }

        if(!empty($kematian->karip)){
            $image_path5 = public_path().'/kematian/karip/'.$kematian->karip;
            unlink($image_path5);
        }else{
            $image_path5='';
        }

        if(!empty($kematian->tabungan_pensiunan)){
            $image_path6 = public_path().'/kematian/tabungan/'.$kematian->tabungan_pensiunan;
            unlink($image_path6);
        }else{
            $image_path6='';
        }
  
    $kematian->delete();
    Alert::success('Data tersebut berhasil dihapus :)','Success');
    return redirect()->route('user/kematian/data_kematian');
   }
}
