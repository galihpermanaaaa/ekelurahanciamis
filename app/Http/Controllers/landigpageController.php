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
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Hash;
use DB;
use Alert;
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
            'ktp'                           => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'kk'                            => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'surat_pengantar'               => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'keterangan_domisili'           => 'image|mimes:jpeg,jpg,png|max:2048',

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
