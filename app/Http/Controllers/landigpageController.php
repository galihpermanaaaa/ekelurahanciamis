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
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Hash;
use DB;
use Alert;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Mail\SKUMail;
use App\Mail\PembuatanSuratSKMKelurahanCiamis;
use Illuminate\Support\Facades\Mail;
use App\Helpers;
use App\tgl_indo;

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
        return view('landingpage', compact('provinsi'));

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
        $request->ktp->move(public_path('ktp'), $file1);

        $file2 = time().'.'.$request->kk->extension();
        $request->kk->move(public_path('kk'), $file2);

        $file3 = time().'.'.$request->surat_pengantar->extension();
        $request->surat_pengantar->move(public_path('surat_pengantar'), $file3);

        $file4 = time().'.'.$request->keterangan_domisili->extension();
        $request->keterangan_domisili->move(public_path('keterangan_domisili'), $file4);

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
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat, Token Anda : '.$token)->persistent('Close');
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

    public function saveSkm(Request $request)
    {
        $token=null;
        $token = Str::random(11);


        $request->validate([
            'nik'                           => 'required|min:16|numeric',
            'nama'                          => 'required|string|max:30',
            'tempat_lahir'                  => 'required',
            'nomor_bdt'                     => '',
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
            'tempat_kel'                    => 'tempat_kel',
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
        $request->kk->move(public_path('kk_skm'), $file2);

        $file3 = time().'.'.$request->surat_pengantar_rt_rw->extension();
        $request->surat_pengantar_rt_rw->move(public_path('surat_pengantar_rt_rw'), $file3);

        $file4 = time().'.'.$request->surat_pernyataan_miskin->extension();
        $request->surat_pernyataan_miskin->move(public_path('surat_pernyataan_miskin'), $file4);

        $form = new SKM;
        $form->nik                          = $request->nik;
        $form->nama                         = $request->nama;
        $form->tempat_lahir                 = $request->tempat_lahir;
        $form->tanggal_lahir                = $request->tanggal_lahir;
        $form->nomor_bdt                    = $request->nomor_bdt;

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
        Alert::success('Congrats', 'Surat Anda Berhasil di Buat, Token Anda : '.$token)->persistent('Close');
        return redirect()->route('index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
