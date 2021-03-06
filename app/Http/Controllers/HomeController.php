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
use App\Models\SuratDuda;
use App\Models\SuratDudaDiterima;
use App\Models\SuratDudaDitolak;
use App\Models\SuratJanda;
use App\Models\SuratJandaDiterima;
use App\Models\SuratJandaDitolak;
use App\Models\Kematian;
use App\Models\KematianDiterima;
use App\Models\KematianDitolak;
use App\Models\SBM;
use App\Models\SBM_Diterima;
use App\Models\SBM_Ditolak;
use App\Models\BMR;
use App\Models\BMR_Diterima;
use App\Models\BMR_Ditolak;
use App\Models\DomisiliPT;
use App\Models\DomisiliPTTerima;
use App\Models\DomisiliPTTolak;
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

        $duda = SuratDuda::where('verifikasi', 'Belum Diverifikasi')->get();
        $duda_count = $duda->count();

        $janda = SuratJanda::where('verifikasi', 'Belum Diverifikasi')->get();
        $janda_count = $janda->count();

        $skbm = SBM::where('verifikasi', 'Belum Diverifikasi')->get();
        $skbm_count = $skbm->count();

        $bmr = BMR::where('verifikasi', 'Belum Diverifikasi')->get();
        $bmr_count = $bmr->count();

        $kematian = Kematian::where('verifikasi', 'Belum Diverifikasi')->get();
        $kematian_count = $kematian->count();

        $domisilipt = DomisiliPT::where('verifikasi', 'Belum Diverifikasi')->get();
        $domisilipt_count = $domisilipt->count();




        $domisilipt_verifikasi = DomisiliPT::where('verifikasi', 'Terverifikasi')->get();
        $domisilipt_count_verifikasi = $domisilipt_verifikasi->count();

        $kematian_verifikasi = Kematian::where('verifikasi', 'Terverifikasi')->get();
        $kematian_count_verifikasi = $kematian_verifikasi->count();

        $bmr_verifikasi = BMR::where('verifikasi', 'Terverifikasi')->get();
        $bmr_count_verifikasi = $bmr_verifikasi->count();

        $sku_verifikasi = SKU::where('verifikasi', 'Terverifikasi')->get();
        $sku_count_verifikasi = $sku_verifikasi->count();

        $skm_verifikasi = SKM::where('verifikasi', 'Terverifikasi')->get();
        $skm_count_verifikasi = $skm_verifikasi->count();

        $skd_verifikasi = SuratDomisili::where('verifikasi', 'Terverifikasi')->get();
        $skd_count_verifikasi = $skd_verifikasi->count();

        $duda_verifikasi = SuratDuda::where('verifikasi', 'Terverifikasi')->get();
        $duda_count_verifikasi = $duda_verifikasi->count();

        $janda_verifikasi = SuratJanda::where('verifikasi', 'Terverifikasi')->get();
        $janda_count_verifikasi = $janda_verifikasi->count();

        $skbm_verifikasi = SBM::where('verifikasi', 'Terverifikasi')->get();
        $skbm_count_verifikasi = $skbm_verifikasi->count();

       

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



        $duda_verifikasi_rw_terverifikasi = SuratDuda::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $duda_count_verifikasi_rw_terverifikasi = $duda_verifikasi_rw_terverifikasi->count();

        $duda_verifikasi_rw_ditolak = SuratDuda::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $duda_count_verifikasi_rw_ditolak = $duda_verifikasi_rw_ditolak->count();

        $duda_verifikasi_rw_belum = SuratDuda::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $duda_count_verifikasi_rw_belum = $duda_verifikasi_rw_belum->count();

        

        $janda_verifikasi_rw_terverifikasi = SuratJanda::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $janda_count_verifikasi_rw_terverifikasi = $janda_verifikasi_rw_terverifikasi->count();

        $janda_verifikasi_rw_ditolak = SuratJanda::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $janda_count_verifikasi_rw_ditolak = $janda_verifikasi_rw_ditolak->count();

        $janda_verifikasi_rw_belum = SuratJanda::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $janda_count_verifikasi_rw_belum = $janda_verifikasi_rw_belum->count();


        $skbm_verifikasi_rw_terverifikasi = SBM::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $skbm_count_verifikasi_rw_terverifikasi = $skbm_verifikasi_rw_terverifikasi->count();

        $skbm_verifikasi_rw_ditolak = SBM::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $skbm_count_verifikasi_rw_ditolak = $skbm_verifikasi_rw_ditolak->count();

        $skbm_verifikasi_rw_belum = SBM::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $skbm_count_verifikasi_rw_belum = $skbm_verifikasi_rw_belum->count();



        $bmr_verifikasi_rw_terverifikasi = BMR::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $bmr_count_verifikasi_rw_terverifikasi = $bmr_verifikasi_rw_terverifikasi->count();

        $bmr_verifikasi_rw_ditolak = BMR::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $bmr_count_verifikasi_rw_ditolak = $bmr_verifikasi_rw_ditolak->count();

        $bmr_verifikasi_rw_belum = BMR::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $bmr_count_verifikasi_rw_belum = $bmr_verifikasi_rw_belum->count();


        $kematian_verifikasi_rw_terverifikasi = Kematian::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $kematian_count_verifikasi_rw_terverifikasi = $kematian_verifikasi_rw_terverifikasi->count();

        $kematian_verifikasi_rw_ditolak = Kematian::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $kematian_count_verifikasi_rw_ditolak = $kematian_verifikasi_rw_ditolak->count();

        $kematian_verifikasi_rw_belum = Kematian::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $kematian_count_verifikasi_rw_belum = $kematian_verifikasi_rw_belum->count();


        $domisilipt_verifikasi_rw_terverifikasi = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $domisilipt_count_verifikasi_rw_terverifikasi = $domisilipt_verifikasi_rw_terverifikasi->count();

        $domisilipt_verifikasi_rw_ditolak = DomisiliPT::where('verifikasi', 'Ditolak')->where('id_rw',auth()->user()->id_rw)->get();
        $domisilipt_count_verifikasi_rw_ditolak = $domisilipt_verifikasi_rw_ditolak->count();

        $domisilipt_verifikasi_rw_belum = DomisiliPT::where('verifikasi', 'Belum Diverifikasi')->where('id_rw',auth()->user()->id_rw)->get();
        $domisilipt_count_verifikasi_rw_belum = $domisilipt_verifikasi_rw_belum->count();

        
       

        $sku_tab = SKU::all()->count();
        $skm_tab = SKM::all()->count();
        $skd_tab = SuratDomisili::all()->count();
        $duda_tab = SuratDuda::all()->count();
        $janda_tab = SuratJanda::all()->count();
        $skbm_tab = SBM::all()->count();
        $bmr_tab = BMR::all()->count();
        $kematian_tab = Kematian::all()->count();
        $domisilipt_tab = DomisiliPT::all()->count();


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
        

        $skm_rep_1 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $skm_rep_2 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $skm_rep_3 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $skm_rep_4 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $skm_rep_5 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $skm_rep_6 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $skm_rep_7 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $skm_rep_8 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $skm_rep_9 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $skm_rep_10 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $skm_rep_11 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $skm_rep_12 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $skm_rep_13 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $skm_rep_14 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $skm_rep_15 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $skm_rep_16 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $skm_rep_17 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $skm_rep_18 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $skm_rep_19 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $skm_rep_20 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $skm_rep_21 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $skm_rep_22 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $skm_rep_23 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $skm_rep_24 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $skm_rep_25 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $skm_rep_26 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $skm_rep_27 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $skm_rep_28 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $skm_rep_29 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $skm_rep_30 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $skm_rep_31 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $skm_rep_32 = SKM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();

        $domi_rep_1 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $domi_rep_2 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $domi_rep_3 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $domi_rep_4 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $domi_rep_5 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $domi_rep_6 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $domi_rep_7 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $domi_rep_8 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $domi_rep_9 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $domi_rep_10 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $domi_rep_11 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $domi_rep_12 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $domi_rep_13 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $domi_rep_14 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $domi_rep_15 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $domi_rep_16 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $domi_rep_17 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $domi_rep_18 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $domi_rep_19 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $domi_rep_20 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $domi_rep_21 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $domi_rep_22 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $domi_rep_23 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $domi_rep_24 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $domi_rep_25 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $domi_rep_26 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $domi_rep_27 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $domi_rep_28 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $domi_rep_29 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $domi_rep_30 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $domi_rep_31 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $domi_rep_32 = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();


        $duda_rep_1 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $duda_rep_2 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $duda_rep_3 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $duda_rep_4 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $duda_rep_5 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $duda_rep_6 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $duda_rep_7 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $duda_rep_8 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $duda_rep_9 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $duda_rep_10 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $duda_rep_11 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $duda_rep_12 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $duda_rep_13 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $duda_rep_14 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $duda_rep_15 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $duda_rep_16 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $duda_rep_17 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $duda_rep_18 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $duda_rep_19 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $duda_rep_20 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $duda_rep_21 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $duda_rep_22 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $duda_rep_23 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $duda_rep_24 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $duda_rep_25 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $duda_rep_26 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $duda_rep_27 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $duda_rep_28 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $duda_rep_29 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $duda_rep_30 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $duda_rep_31 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $duda_rep_32 = SuratDuda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();

        $janda_rep_1 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $janda_rep_2 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $janda_rep_3 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $janda_rep_4 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $janda_rep_5 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $janda_rep_6 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $janda_rep_7 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $janda_rep_8 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $janda_rep_9 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $janda_rep_10 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $janda_rep_11 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $janda_rep_12 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $janda_rep_13 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $janda_rep_14 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $janda_rep_15 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $janda_rep_16 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $janda_rep_17 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $janda_rep_18 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $janda_rep_19 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $janda_rep_20 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $janda_rep_21 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $janda_rep_22 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $janda_rep_23 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $janda_rep_24 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $janda_rep_25 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $janda_rep_26 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $janda_rep_27 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $janda_rep_28 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $janda_rep_29 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $janda_rep_30 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $janda_rep_31 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $janda_rep_32 = SuratJanda::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();

        $sbm_rep_1 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $sbm_rep_2 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $sbm_rep_3 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $sbm_rep_4 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $sbm_rep_5 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $sbm_rep_6 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $sbm_rep_7 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $sbm_rep_8 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $sbm_rep_9 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $sbm_rep_10 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $sbm_rep_11 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $sbm_rep_12 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $sbm_rep_13 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $sbm_rep_14 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $sbm_rep_15 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $sbm_rep_16 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $sbm_rep_17 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $sbm_rep_18 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $sbm_rep_19 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $sbm_rep_20 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $sbm_rep_21 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $sbm_rep_22 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $sbm_rep_23 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $sbm_rep_24 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $sbm_rep_25 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $sbm_rep_26 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $sbm_rep_27 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $sbm_rep_28 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $sbm_rep_29 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $sbm_rep_30 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $sbm_rep_31 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $sbm_rep_32 = SBM::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();



        $bmr_rep_1 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $bmr_rep_2 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $bmr_rep_3 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $bmr_rep_4 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $bmr_rep_5 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $bmr_rep_6 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $bmr_rep_7 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $bmr_rep_8 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $bmr_rep_9 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $bmr_rep_10 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $bmr_rep_11 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $bmr_rep_12 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $bmr_rep_13 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $bmr_rep_14 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $bmr_rep_15 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $bmr_rep_16 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $bmr_rep_17 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $bmr_rep_18 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $bmr_rep_19 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $bmr_rep_20 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $bmr_rep_21 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $bmr_rep_22 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $bmr_rep_23 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $bmr_rep_24 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $bmr_rep_25 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $bmr_rep_26 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $bmr_rep_27 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $bmr_rep_28 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $bmr_rep_29 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $bmr_rep_30 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $bmr_rep_31 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $bmr_rep_32 = BMR::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();

        $skk_rep_1 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $skk_rep_2 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $skk_rep_3 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $skk_rep_4 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $skk_rep_5 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $skk_rep_6 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $skk_rep_7 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $skk_rep_8 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $skk_rep_9 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $skk_rep_10 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $skk_rep_11 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $skk_rep_12 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $skk_rep_13 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $skk_rep_14 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $skk_rep_15 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $skk_rep_16 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $skk_rep_17 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $skk_rep_18 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $skk_rep_19 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $skk_rep_20 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $skk_rep_21 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $skk_rep_22 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $skk_rep_23 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $skk_rep_24 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $skk_rep_25 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $skk_rep_26 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $skk_rep_27 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $skk_rep_28 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $skk_rep_29 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $skk_rep_30 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $skk_rep_31 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $skk_rep_32 = Kematian::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();



        $skdp_rep_1 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '01')->count();
        $skdp_rep_2 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '02')->count();
        $skdp_rep_3 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '03')->count();
        $skdp_rep_4 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '04')->count();
        $skdp_rep_5 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '05')->count();
        $skdp_rep_6 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '06')->count();
        $skdp_rep_7 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '07')->count();
        $skdp_rep_8 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '08')->count();
        $skdp_rep_9 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '09')->count();
        $skdp_rep_10 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '10')->count();
        $skdp_rep_11 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '11')->count();
        $skdp_rep_12 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '12')->count();
        $skdp_rep_13 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '13')->count();
        $skdp_rep_14 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '14')->count();
        $skdp_rep_15 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '15')->count();
        $skdp_rep_16 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '16')->count();
        $skdp_rep_17 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '17')->count();
        $skdp_rep_18 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '18')->count();
        $skdp_rep_19 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '19')->count();
        $skdp_rep_20 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '20')->count();
        $skdp_rep_21 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '21')->count();
        $skdp_rep_22 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '22')->count();
        $skdp_rep_23 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '23')->count();
        $skdp_rep_24 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '24')->count();
        $skdp_rep_25 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '25')->count();
        $skdp_rep_26 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '26')->count();
        $skdp_rep_27 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '27')->count();
        $skdp_rep_28 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '28')->count();
        $skdp_rep_29 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '29')->count();
        $skdp_rep_30 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '30')->count();
        $skdp_rep_31 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '31')->count();
        $skdp_rep_32 = DomisiliPT::where('verifikasi', 'Terverifikasi')->where('subdis_id', '25821')
        ->where('id_rw', '32')->count();

        
        

        $sku_jk_lk = SKU::where('verifikasi', 'Terverifikasi')->where('jk', 'Laki-laki')->count();
        $sku_jk_pr = SKU::where('verifikasi', 'Terverifikasi')->where('jk', 'Perempuan')->count();

        $skd_jk_lk = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('jk', 'Laki-laki')->count();
        $skd_jk_pr = SuratDomisili::where('verifikasi', 'Terverifikasi')->where('jk', 'Perempuan')->count();

        $skbm_jk_lk = SBM::where('verifikasi', 'Terverifikasi')->where('jk', 'Laki-laki')->count();
        $skbm_jk_pr = SBM::where('verifikasi', 'Terverifikasi')->where('jk', 'Perempuan')->count();

        $kematian_jk_lk = Kematian::where('verifikasi', 'Terverifikasi')->where('jk', 'Laki-laki')->count();
        $kematian_jk_pr = Kematian::where('verifikasi', 'Terverifikasi')->where('jk', 'Perempuan')->count();

        

        $log_skd = SuratDomisili::orderBy('id', 'DESC')->take(3)->get();
        $log_skm = SKM::orderBy('id', 'DESC')->take(3)->get();
        $log_sku = SKU::orderBy('id', 'DESC')->take(3)->get();
        $log_duda = SuratDuda::orderBy('id', 'DESC')->take(3)->get();
        $log_janda = SuratJanda::orderBy('id', 'DESC')->take(3)->get();
        $log_skbm = SBM::orderBy('id', 'DESC')->take(3)->get();
        $log_kematian = Kematian::orderBy('id', 'DESC')->take(3)->get();
        $log_domisilipt = DomisiliPT::orderBy('id', 'DESC')->take(3)->get();




 
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
        'jumlah_sku_30', 'jumlah_sku_31', 'jumlah_sku_32', 'skm_rep_1','skm_rep_2', 'skm_rep_3', 'skm_rep_4', 'skm_rep_5', 'skm_rep_6', 'skm_rep_7', 'skm_rep_8',
        'skm_rep_9', 'skm_rep_10', 'skm_rep_11', 'skm_rep_12', 'skm_rep_13', 'skm_rep_14', 'skm_rep_15', 'skm_rep_16', 'skm_rep_17', 'skm_rep_18', 'skm_rep_19', 'skm_rep_20', 
    'skm_rep_21', 'skm_rep_22', 'skm_rep_23', 'skm_rep_24', 'skm_rep_25', 'skm_rep_26', 'skm_rep_27', 'skm_rep_28', 'skm_rep_29', 'skm_rep_30', 'skm_rep_31', 'skm_rep_32', 
    'domi_rep_1', 'domi_rep_2', 'domi_rep_3', 'domi_rep_4', 'domi_rep_5', 'domi_rep_5', 'domi_rep_6', 'domi_rep_7', 'domi_rep_8', 'domi_rep_9', 'domi_rep_10', 
    'domi_rep_11', 'domi_rep_12', 'domi_rep_13', 'domi_rep_14', 'domi_rep_15', 'domi_rep_16', 'domi_rep_17', 'domi_rep_18', 'domi_rep_19', 'domi_rep_20',
    'domi_rep_21', 'domi_rep_21', 'domi_rep_22', 'domi_rep_23', 'domi_rep_24', 'domi_rep_25', 'domi_rep_26', 'domi_rep_27', 'domi_rep_28', 'domi_rep_29', 'domi_rep_30', 'domi_rep_31','domi_rep_32', 
    'sku_jk_lk', 'sku_jk_pr', 'skd_jk_lk', 'skd_jk_pr', 'log_skd', 'log_sku', 'log_skm', 'duda', 'duda_count', 'duda_count_verifikasi', 'duda_tab', 'log_duda', 'duda_rep_1', 'duda_rep_2', 'duda_rep_3', 
    'duda_rep_4', 'duda_rep_5', 'duda_rep_6', 'duda_rep_7', 'duda_rep_8', 'duda_rep_9', 'duda_rep_10', 'duda_rep_11', 'duda_rep_12', 'duda_rep_13', 'duda_rep_14',
    'duda_rep_15', 'duda_rep_16', 'duda_rep_17', 'duda_rep_18', 'duda_rep_19', 'duda_rep_20', 'duda_rep_21', 'duda_rep_22', 'duda_rep_23', 'duda_rep_24', 'duda_rep_25', 'duda_rep_26', 'duda_rep_27', 'duda_rep_28',
    'duda_rep_29', 'duda_rep_30', 'duda_rep_31', 'duda_rep_32','janda_count_verifikasi', 'janda_verifikasi','janda','janda_count', 'janda_tab', 'log_janda', 'janda_rep_1', 'janda_rep_2', 'janda_rep_3','janda_rep_4',
    'janda_rep_5','janda_rep_6','janda_rep_7','janda_rep_8','janda_rep_9','janda_rep_10','janda_rep_11','janda_rep_12','janda_rep_13','janda_rep_14','janda_rep_15',
    'janda_rep_16','janda_rep_17','janda_rep_18','janda_rep_19','janda_rep_20','janda_rep_21','janda_rep_22','janda_rep_23','janda_rep_24','janda_rep_25','janda_rep_26','janda_rep_27','janda_rep_28','janda_rep_29',
    'janda_rep_30','janda_rep_31','janda_rep_32','duda_verifikasi_rw_terverifikasi', 'duda_count_verifikasi_rw_terverifikasi', 'duda_verifikasi_rw_ditolak', 'duda_count_verifikasi_rw_ditolak', 'duda_verifikasi_rw_belum',
    'duda_count_verifikasi_rw_belum', 'janda_verifikasi_rw_terverifikasi', 'janda_count_verifikasi_rw_terverifikasi', 'janda_verifikasi_rw_ditolak',
    'janda_count_verifikasi_rw_ditolak', 'janda_verifikasi_rw_belum', 'janda_count_verifikasi_rw_belum', 'skbm_tab', 'log_skbm', 'skbm', 'skbm_count', 'skbm_count_verifikasi', 'skbm_verifikasi', 'skbm_jk_lk', 'skbm_jk_pr',
    'sbm_rep_1', 'sbm_rep_2', 'sbm_rep_3', 'sbm_rep_4', 'sbm_rep_5', 'sbm_rep_6', 'sbm_rep_7', 'sbm_rep_8', 'sbm_rep_9', 'sbm_rep_10', 'sbm_rep_11', 'sbm_rep_12', 'sbm_rep_13', 
    'sbm_rep_14', 'sbm_rep_15', 'sbm_rep_16', 'sbm_rep_17', 'sbm_rep_18', 'sbm_rep_19', 'sbm_rep_20', 'sbm_rep_21', 'sbm_rep_22', 'sbm_rep_23', 'sbm_rep_24', 'sbm_rep_25', 'sbm_rep_25', 'sbm_rep_26',
    'sbm_rep_27', 'sbm_rep_28', 'sbm_rep_28', 'sbm_rep_29', 'sbm_rep_30', 'sbm_rep_31', 'sbm_rep_32','skbm_verifikasi_rw_terverifikasi', 'skbm_count_verifikasi_rw_terverifikasi', 'skbm_verifikasi_rw_ditolak', 'skbm_count_verifikasi_rw_ditolak',
    'skbm_verifikasi_rw_belum', 'skbm_count_verifikasi_rw_belum', 'bmr_tab', 'bmr','bmr_count', 'bmr_verifikasi', 'bmr_count_verifikasi', 'bmr_rep_1', 'bmr_rep_2', 'bmr_rep_3', 'bmr_rep_4', 'bmr_rep_5', 'bmr_rep_6', 'bmr_rep_7', 'bmr_rep_8',
    'bmr_rep_9', 'bmr_rep_10', 'bmr_rep_11', 'bmr_rep_12', 'bmr_rep_13', 'bmr_rep_14', 'bmr_rep_15', 'bmr_rep_16', 'bmr_rep_17', 'bmr_rep_18', 'bmr_rep_19', 'bmr_rep_20', 'bmr_rep_21', 'bmr_rep_22', 'bmr_rep_22', 'bmr_rep_23',
    'bmr_rep_24', 'bmr_rep_25', 'bmr_rep_25', 'bmr_rep_26', 'bmr_rep_27', 'bmr_rep_28', 'bmr_rep_29', 'bmr_rep_30', 'bmr_rep_31', 'bmr_rep_32', 'bmr_verifikasi_rw_terverifikasi', 'bmr_count_verifikasi_rw_terverifikasi', 'bmr_verifikasi_rw_ditolak', 'bmr_count_verifikasi_rw_ditolak',
    'bmr_verifikasi_rw_belum', 'bmr_count_verifikasi_rw_belum', 'kematian', 'kematian_count', 'kematian_verifikasi', 'kematian_count_verifikasi', 'kematian_tab', 'kematian_jk_lk', 'kematian_jk_pr', 'log_kematian', 'skk_rep_1', 'skk_rep_2', 'skk_rep_3', 'skk_rep_4', 'skk_rep_5', 'skk_rep_6', 'skk_rep_7', 'skk_rep_8', 'skk_rep_9', 'skk_rep_10',
    'skk_rep_11', 'skk_rep_12', 'skk_rep_13','skk_rep_14', 'skk_rep_15', 'skk_rep_16', 'skk_rep_17', 'skk_rep_18', 'skk_rep_18', 'skk_rep_19', 'skk_rep_20',
    'skk_rep_21', 'skk_rep_22', 'skk_rep_23', 'skk_rep_24', 'skk_rep_25', 'skk_rep_26', 'skk_rep_27', 'skk_rep_28', 'skk_rep_29', 'skk_rep_30', 'skk_rep_31', 'skk_rep_32', 'kematian_verifikasi_rw_terverifikasi', 'kematian_count_verifikasi_rw_terverifikasi', 'kematian_verifikasi_rw_ditolak', 'kematian_count_verifikasi_rw_ditolak',
    'kematian_verifikasi_rw_belum', 'kematian_count_verifikasi_rw_belum', 'domisilipt_tab', 'domisilipt', 'domisilipt_count', 'domisilipt_verifikasi', 'domisilipt_count_verifikasi', 'skdp_rep_1', 'skdp_rep_2', 'skdp_rep_3', 'skdp_rep_4', 'skdp_rep_5', 'skdp_rep_6', 'skdp_rep_7', 'skdp_rep_8', 'skdp_rep_9',
    'skdp_rep_10', 'skdp_rep_11', 'skdp_rep_12', 'skdp_rep_13', 'skdp_rep_14', 'skdp_rep_15', 'skdp_rep_16', 'skdp_rep_17', 'skdp_rep_18', 'skdp_rep_19', 'skdp_rep_20',
    'skdp_rep_21', 'skdp_rep_22', 'skdp_rep_23', 'skdp_rep_24', 'skdp_rep_25', 'skdp_rep_25', 'skdp_rep_26', 'skdp_rep_27', 'skdp_rep_28', 'skdp_rep_29', 'skdp_rep_30',
    'skdp_rep_31', 'skdp_rep_32', 'domisilipt_verifikasi_rw_terverifikasi','domisilipt_count_verifikasi_rw_terverifikasi','domisilipt_count_verifikasi_rw_ditolak',
    'domisilipt_verifikasi_rw_belum','domisilipt_count_verifikasi_rw_belum','log_domisilipt'));
    }

}
