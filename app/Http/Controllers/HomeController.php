<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function landingpage()
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

    public function getRW(Request $request){
        $rw = RW::where("subdis_id",$request->subdis_id)->pluck('id_rw','nama_rw');
        return response()->json($rw);
    }
}
