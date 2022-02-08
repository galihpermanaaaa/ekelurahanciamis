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
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Hash;
use DB;
use Alert;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Mail\SKUMail;
use App\Mail\PembuatanSuratSKMKelurahanCiamis;
use App\Mail\PembuatSuratDomisili;
use Illuminate\Support\Facades\Mail;
use App\Helpers;
use App\tgl_indo;

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

        $sku = SKU::where('verifikasi', 'Belum Diverifikasi')->get();
        $sku_count = $sku->count();

        $skm = SKM::where('verifikasi', 'Belum Diverifikasi')->get();
        $skm_count = $skm->count();

        $skd = SuratDomisili::where('verifikasi', 'Belum Diverifikasi')->get();
        $skd_count = $skd->count();


        $sku_verifikasi = SKU::where('verifikasi', 'Terverifikasi')->get();
        $sku_count_verifikasi = $sku_verifikasi->count();

        $skm_verifikasi = SKM::where('verifikasi', 'Terverifikasi')->get();
        $skm_count_verifikasi = $skm_verifikasi->count();

        $skd_verifikasi = SuratDomisili::where('verifikasi', 'Terverifikasi')->get();
        $skd_count_verifikasi = $skd_verifikasi->count();

        $user_rw = RW::where('id_rw',auth()->user()->id_rw)->get();

        $skd_verifikasi_rw_terverifikasi = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $skd_count_verifikasi_rw_terverifikasi = $skd_verifikasi_rw_terverifikasi->count();

        $skd_verifikasi_rw_ditolak = SuratDomisili::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $skd_count_verifikasi_rw_ditolak = $skd_verifikasi_rw_ditolak->count();

        $skd_verifikasi_rw_belum = SuratDomisili::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $skd_count_verifikasi_rw_belum = $skd_verifikasi_rw_belum->count();


        


        $skm_verifikasi_rw_terverifikasi = SKM::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $skm_count_verifikasi_rw_terverifikasi = $skm_verifikasi_rw_terverifikasi->count();

        $skm_verifikasi_rw_ditolak = SKM::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $skm_count_verifikasi_rw_ditolak = $skm_verifikasi_rw_ditolak->count();

        $skm_verifikasi_rw_belum = SKM::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $skm_count_verifikasi_rw_belum = $skm_verifikasi_rw_belum->count();


        $sku_verifikasi_rw_terverifikasi = SKU::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $sku_count_verifikasi_rw_terverifikasi = $sku_verifikasi_rw_terverifikasi->count();

        $sku_verifikasi_rw_ditolak = SKU::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $sku_count_verifikasi_rw_ditolak = $sku_verifikasi_rw_ditolak->count();

        $sku_verifikasi_rw_belum = SKU::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $sku_count_verifikasi_rw_belum = $sku_verifikasi_rw_belum->count();


        $sku_tab = SKU::all()->count();
        $skm_tab = SKM::all()->count();
        $skd_tab = SuratDomisili::all()->count();


        $sku_rep_01 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '1')
        ->get();
        $jumlah_sku_01 = $sku_rep_01->count();


        return view('dashboard', compact('sku', 'sku_count', 'skm', 'skm_count', 'skd', 'skd_count', 'sku_verifikasi', 'sku_count_verifikasi', 
        'skm_verifikasi', 'skm_count_verifikasi', 'skd_verifikasi', 'skd_count_verifikasi', 'user_rw', 'skd_verifikasi_rw_terverifikasi',
        'skd_count_verifikasi_rw_terverifikasi', 'skd_verifikasi_rw_ditolak', 'skd_count_verifikasi_rw_ditolak', 'skd_verifikasi_rw_belum', 'skd_count_verifikasi_rw_belum', 
        'skm_verifikasi_rw_terverifikasi', 'skm_count_verifikasi_rw_terverifikasi', 'skm_verifikasi_rw_ditolak', 'skm_count_verifikasi_rw_ditolak', 
         'skm_verifikasi_rw_belum', 'skm_count_verifikasi_rw_belum', 'sku_verifikasi_rw_terverifikasi', 'sku_count_verifikasi_rw_terverifikasi', 
        'sku_verifikasi_rw_ditolak', 'sku_count_verifikasi_rw_ditolak', 'sku_verifikasi_rw_belum', 'sku_count_verifikasi_rw_belum', 'sku_tab',
        'skm_tab', 'skd_tab', 'sku_rep_01', 'jumlah_sku_01'));
    }



}
