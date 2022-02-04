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
    public function index()
    {
        if (Auth::user()->role_name=='Verifikator')
        {

        $halaman = "data_skm";
        $skm = SKM::orderBy('id', 'DESC')->get();
        return view('user.skm.data_skm', compact('halaman', 'skm'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function indexRW()
    {
        if (Auth::user()->role_name=='RW')
        {

        $halaman = "data_skm";
            $skm = SKM::orderBy('id', 'DESC')
            ->where('id_rw',auth()->user()->id_rw)
            ->get();

            $user = RW::where('id_rw',auth()->user()->id_rw)->get();
        return view('user.skm.data_skm_rw', compact('halaman', 'sku', 'user'));
        }
        else
        {
            return redirect()->route('home');
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
            return redirect()->route('home');
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

        ];

        if($verifikasi=='Terverifikasi'){
            $form1 = new SKMDiterima;
            $form1->id_skm = $request->id;
            $form1->save();
        }elseif($verifikasi=='Ditolak'){
            $form2 = new SKMDitolak;
            $form2->id_skm = $request->id;
            $form2->save();
        }
        SKM::where('id',$request->id)->update($form);
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


        $this->fpdf->Cell(190,6,'SURAT KETERANGAN USAHA',0,1,'C');
        $this->fpdf->SetFont('times','',12);
        $this->fpdf->Cell(190,6,'Nomor:'.$p->id_sku_diterima.'/'.$p->id_sku_diterima.'/Kel-'.date("Y", strtotime($p->tanggal_buat_surat)),0,1,'C');
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
        $this->fpdf->Cell(50,6,':  '.(tanggal_indonesia($p->tanggal_buat_surat)),0,1);

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
        $this->fpdf->Cell(50,6,':  '.'RT/RW.'. $p->rt. '/'. $p->rw->nama_rw. ' '. 'KELURAHAN/DESA. '. $p->subdistricts->subdis_name. ' '. 'KECAMATAN. '. $p->districts->dis_name,0,1);
        $this->fpdf->Cell(100,6,'                                     '.'KABUPATEN. '. $p->cities->city_name,0,1);

        $this->fpdf->Ln();
        $this->fpdf->Cell(10,6,'',0,0);
        $this->fpdf->write(8,'Berdasarkan Pengakuan yang bersangkutan disertai Surat Pengantar Keterangan dari RT.'. $p->rt. ' '. 'RW.'. $p->rw->nama_rw,0,1);
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
        $this->fpdf->Cell(35,6,'',0,0,'C');
        $this->fpdf->Cell(80,6,'',0,0);
        $this->fpdf->Cell(14,6,'Ciamis,',0,0);
        $this->fpdf->Cell(30,6,(tgl_indo($p->tanggal_verifikasi)),0,1);




        $this->fpdf->Cell(40,6,'',0,0,'C');
        $this->fpdf->Cell(75,6,'',0,0);
        $this->fpdf->SetFont('times','B',12);
        $this->fpdf->Cell(45,6,'Lurah Ciamis',0,1, 'C');
        

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
    public function destroy_skm(Request $request)
   {
    $skm = SKM::findOrFail($request->id);
    $skm->delete();
    Alert::success('SKM tersebut berhasil dihapus :)','Success');
    return redirect()->route('user/skm/data_skm');
   }

}