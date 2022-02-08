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

        $sku_rep_02 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '2')
        ->get();
        $jumlah_sku_02 = $sku_rep_02->count();

        $sku_rep_03 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '3')
        ->get();
        $jumlah_sku_03 = $sku_rep_03->count();

        $sku_rep_04 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '4')
        ->get();
        $jumlah_sku_04 = $sku_rep_04->count();

        $sku_rep_05 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '5')
        ->get();
        $jumlah_sku_05 = $sku_rep_05->count();

        $sku_rep_06 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '6')
        ->get();
        $jumlah_sku_06 = $sku_rep_06->count();

        $sku_rep_07 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '7')
        ->get();
        $jumlah_sku_07 = $sku_rep_07->count();

        $sku_rep_08 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '8')
        ->get();
        $jumlah_sku_08 = $sku_rep_08->count();

        $sku_rep_09 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '9')
        ->get();
        $jumlah_sku_09 = $sku_rep_09->count();

        $sku_rep_10 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '10')
        ->get();
        $jumlah_sku_10 = $sku_rep_10->count();

        $sku_rep_11 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '11')
        ->get();
        $jumlah_sku_11 = $sku_rep_11->count();

        $sku_rep_12 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '12')
        ->get();
        $jumlah_sku_12 = $sku_rep_12->count();

        $sku_rep_13 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '13')
        ->get();
        $jumlah_sku_13 = $sku_rep_13->count();

        $sku_rep_14 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '14')
        ->get();
        $jumlah_sku_14 = $sku_rep_14->count();


        $sku_rep_15 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '15')
        ->get();
        $jumlah_sku_15 = $sku_rep_15->count();

        $sku_rep_16 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '16')
        ->get();
        $jumlah_sku_16 = $sku_rep_16->count();

        $sku_rep_17 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '17')
        ->get();
        $jumlah_sku_17 = $sku_rep_17->count();


        $sku_rep_18 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '18')
        ->get();
        $jumlah_sku_18 = $sku_rep_18->count();


        $sku_rep_19 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '19')
        ->get();
        $jumlah_sku_19 = $sku_rep_19->count();

        $sku_rep_20 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '20')
        ->get();
        $jumlah_sku_20 = $sku_rep_20->count();

        $sku_rep_21 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '21')
        ->get();
        $jumlah_sku_21 = $sku_rep_21->count();

        $sku_rep_22 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '22')
        ->get();
        $jumlah_sku_22 = $sku_rep_22->count();

        $sku_rep_23 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '23')
        ->get();
        $jumlah_sku_23 = $sku_rep_23->count();


        $sku_rep_24 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '24')
        ->get();
        $jumlah_sku_24 = $sku_rep_24->count();

        $sku_rep_25 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '25')
        ->get();
        $jumlah_sku_25 = $sku_rep_25->count();


        $sku_rep_26 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '26')
        ->get();
        $jumlah_sku_26 = $sku_rep_26->count();

        $sku_rep_27 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '27')
        ->get();
        $jumlah_sku_27 = $sku_rep_27->count();

        $sku_rep_28 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '28')
        ->get();
        $jumlah_sku_28 = $sku_rep_28->count();

        $sku_rep_29 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '29')
        ->get();
        $jumlah_sku_29 = $sku_rep_29->count();

        $sku_rep_30 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '30')
        ->get();
        $jumlah_sku_30 = $sku_rep_30->count();

        $sku_rep_31 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '31')
        ->get();
        $jumlah_sku_31 = $sku_rep_31->count();

        $sku_rep_32 = SKU::where('verifikasi', 'Terverifikasi')
        ->where('subdis_id', '25821')
        ->where('id_rw', '32')
        ->get();
        $jumlah_sku_32 = $sku_rep_32->count();



        return view('dashboard', compact('sku', 'sku_count', 'skm', 'skm_count', 'skd', 'skd_count', 'sku_verifikasi', 'sku_count_verifikasi', 
        'skm_verifikasi', 'skm_count_verifikasi', 'skd_verifikasi', 'skd_count_verifikasi', 'user_rw', 'skd_verifikasi_rw_terverifikasi',
        'skd_count_verifikasi_rw_terverifikasi', 'skd_verifikasi_rw_ditolak', 'skd_count_verifikasi_rw_ditolak', 'skd_verifikasi_rw_belum', 'skd_count_verifikasi_rw_belum', 
        'skm_verifikasi_rw_terverifikasi', 'skm_count_verifikasi_rw_terverifikasi', 'skm_verifikasi_rw_ditolak', 'skm_count_verifikasi_rw_ditolak', 
        'skm_verifikasi_rw_belum', 'skm_count_verifikasi_rw_belum', 'sku_verifikasi_rw_terverifikasi', 'sku_count_verifikasi_rw_terverifikasi', 
        'sku_verifikasi_rw_ditolak', 'sku_count_verifikasi_rw_ditolak', 'sku_verifikasi_rw_belum', 'sku_count_verifikasi_rw_belum', 'sku_tab',
        'skm_tab', 'skd_tab', 'sku_rep_01', 'jumlah_sku_01', 'sku_rep_02', 'sku_rep_03', 'sku_rep_04', 'sku_rep_05', 'sku_rep_06', 'sku_rep_07', 
        'sku_rep_07', 'sku_rep_08', 'sku_rep_09', 'sku_rep_10', 'sku_rep_11', 'sku_rep_12', 'sku_rep_13', 'sku_rep_14', 'sku_rep_15', 'sku_rep_16',
        'sku_rep_17', 'sku_rep_18', 'sku_rep_19', 'sku_rep_20', 'sku_rep_21', 'sku_rep_21', 'sku_rep_22', 'sku_rep_22', 'sku_rep_23', 'sku_rep_24', 
        'sku_rep_25', 'sku_rep_26', 'sku_rep_27', 'sku_rep_28', 'sku_rep_29', 'sku_rep_30', 'sku_rep_31', 'sku_rep_32', 'jumlah_sku_01', 'jumlah_sku_02', 
    'jumlah_sku_03', 'jumlah_sku_04', 'jumlah_sku_05', 'jumlah_sku_06', 'jumlah_sku_07', 'jumlah_sku_08', 'jumlah_sku_09', 'jumlah_sku_10', 'jumlah_sku_11',
        'jumlah_sku_12', 'jumlah_sku_13', 'jumlah_sku_14', 'jumlah_sku_15', 'jumlah_sku_16', 'jumlah_sku_17', 'jumlah_sku_18', 'jumlah_sku_19', 'jumlah_sku_20',
        'jumlah_sku_21', 'jumlah_sku_22', 'jumlah_sku_23', 'jumlah_sku_24', 'jumlah_sku_25', 'jumlah_sku_26', 'jumlah_sku_27', 'jumlah_sku_28', 'jumlah_sku_29',
        'jumlah_sku_30', 'jumlah_sku_31', 'jumlah_sku_32'));
    }



}
