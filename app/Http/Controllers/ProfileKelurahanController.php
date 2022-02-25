<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use DB;
use Alert;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\DataGeografis;
use App\Models\DataPemerintah;
use App\Models\User;
use App\Helpers;

class ProfileKelurahanController extends Controller
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
        $halaman = "data_profile_kelurahan";
        $user = User::all();
        return view('user.profile_keluarahan.data_profile_kelurahan', compact('halaman','user'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function indexGeografis()
    {
        if (Auth::user()->role_name=='Verifikator')
        {
        $halaman = "data_geografis_kelurahan";
        $user = User::all();
        $data = DataGeografis::limit(1)->get();
        return view('user.profile_keluarahan.data_geografis_kelurahan', compact('halaman','user','data'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveGeografis(Request $request)
    {
        $request->validate([
            'jarak_kantor_desa'                 => 'required',
            'luas_wilayah'                      => 'required',
            'bangunan_pekarangan'               => 'required',
            'ladang_kebun'                      => 'required',
            'kolam'                             => 'required',
            'hutan_rakyat'                      => 'required',
            'hutan_negara'                      => 'required',
            'lainnya'                           => 'required',
            'berperairan_teknis'                => 'required',
            'berperairan_sederhana'             => 'required',
            'tidak_berperairan'                 => 'required',
            'panjang_jalan_nasional'            => 'required',
            'panjang_jalan_provinsi'            => 'required',
            'panjang_jalan_kabupaten'           => 'required',
            'panjang_jalan_desa'                => 'required',
            'hotmix'                            => 'required',
            'aspal'                             => 'required',
            'batu'                              => 'required',
            'tanah'                             => 'required',
            'jumlah_jembatan'                   => 'required',
            'sungai_besar_panjang'              => 'required',
            'sungai_besar_banyaknya'            => 'required',
           
        ]);

        $user = new DataGeografis;
        $user->jarak_kantor_desa         = $request->jarak_kantor_desa;
        $user->luas_wilayah              = $request->luas_wilayah;
        $user->bangunan_pekarangan       = $request->bangunan_pekarangan;
        $user->ladang_kebun              = $request->ladang_kebun;
        $user->kolam                     = $request->kolam;
        $user->hutan_rakyat              = $request->hutan_rakyat;
        $user->hutan_negara              = $request->hutan_negara;
        $user->lainnya                   = $request->lainnya;
        $user->berperairan_teknis        = $request->berperairan_teknis;
        $user->berperairan_sederhana     = $request->berperairan_sederhana;
        $user->tidak_berperairan         = $request->tidak_berperairan;

        $user->panjang_jalan_nasional           = $request->panjang_jalan_nasional;
        $user->panjang_jalan_provinsi           = $request->panjang_jalan_provinsi;
        $user->panjang_jalan_kabupaten          = $request->panjang_jalan_kabupaten;
        $user->panjang_jalan_desa               = $request->panjang_jalan_desa;

        $user->hotmix        = $request->hotmix;
        $user->aspal         = $request->aspal;
        $user->batu          = $request->batu;
        $user->tanah         = $request->tanah;

        $user->jumlah_jembatan              = $request->jumlah_jembatan;
        $user->sungai_besar_panjang         = $request->sungai_besar_panjang;
        $user->sungai_besar_banyaknya       = $request->sungai_besar_banyaknya;
       
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_geografis_kelurahan');
    }

    public function update_geografis(Request $request)
    {
        $id                             = $request->id;
        $jarak_kantor_desa              = $request->jarak_kantor_desa;
        $luas_wilayah                   = $request->luas_wilayah;
        $bangunan_pekarangan            = $request->bangunan_pekarangan;
        $ladang_kebun                   = $request->ladang_kebun;
        $kolam                          = $request->kolam;
        $hutan_rakyat                   = $request->hutan_rakyat;
        $hutan_negara                   = $request->hutan_negara;
        $lainnya                        = $request->lainnya;
        $berperairan_teknis             = $request->berperairan_teknis;
        $berperairan_sederhana          = $request->berperairan_sederhana;
        $tidak_berperairan              = $request->tidak_berperairan;

        $panjang_jalan_nasional         = $request->panjang_jalan_nasional;
        $panjang_jalan_provinsi         = $request->panjang_jalan_provinsi;
        $panjang_jalan_kabupaten        = $request->panjang_jalan_kabupaten;
        $panjang_jalan_desa             = $request->panjang_jalan_desa;


        $hotmix                             = $request->hotmix;
        $aspal                              = $request->aspal;
        $batu                               = $request->batu;
        $tanah                              = $request->tanah;

        $jumlah_jembatan                    = $request->jumlah_jembatan;
        $sungai_besar_panjang               = $request->sungai_besar_panjang;
        $sungai_besar_banyaknya             = $request->sungai_besar_banyaknya;



        $update = [

            'id'                                    => $id,
            'jarak_kantor_desa'                    => $jarak_kantor_desa,
            'luas_wilayah'                          => $luas_wilayah,
            'bangunan_pekarangan'                   => $bangunan_pekarangan,
            'ladang_kebun'                          => $ladang_kebun,
            'kolam'                                 => $kolam,
            'hutan_rakyat'                          => $hutan_rakyat,
            'hutan_negara'                          => $hutan_negara,
            'lainnya'                               => $lainnya,
            'berperairan_teknis'                    => $berperairan_teknis,
            'berperairan_sederhana'                 => $berperairan_sederhana,
            'tidak_berperairan'                     => $tidak_berperairan,
            'panjang_jalan_nasional'                => $panjang_jalan_nasional,
            'panjang_jalan_provinsi'                => $panjang_jalan_provinsi,
            'panjang_jalan_kabupaten'               => $panjang_jalan_kabupaten,
            'panjang_jalan_desa'                    => $panjang_jalan_desa,
            'hotmix'                                => $hotmix,
            'aspal'                                 => $aspal,
            'tanah'                                 => $tanah,
            'batu'                                  => $batu,
            'jumlah_jembatan'                       => $jumlah_jembatan,
            'sungai_besar_panjang'                  => $sungai_besar_panjang,
            'sungai_besar_banyaknya'                => $sungai_besar_banyaknya,

        ];
        DataGeografis::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_geografis_kelurahan');


    }

    public function indexPemerintah()
    {
        if (Auth::user()->role_name=='Verifikator')
        {
        $halaman = "data_pemerintah_kelurahan";
        $user = User::all();
        $data = DataPemerintah::limit(1)->get();
        return view('user.profile_keluarahan.data_pemerintah_kelurahan', compact('halaman','user','data'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function savePemerintah(Request $request)
    {
        $request->validate([
            'jumlah_rt'                      => 'required',
            'jumlah_rw'                      => 'required',
            'jumlah_dusun'                   => 'required',
            'jumlah_lurah'                   => 'required',
            'jumlah_seklur'                  => 'required',
            'jumlah_kepala_seksi'            => 'required',
            'jumlah_pelaksana'               => 'required',
            'jumlah_kepala_lingkungan'       => 'required',
            'jumlah_anggota_bpd'             => 'required',
            'jumlah_anggota_lpm'             => 'required',
           
           
        ]);

        $user = new DataPemerintah;
        $user->jumlah_rt                = $request->jumlah_rt;
        $user->jumlah_rw                = $request->jumlah_rw;
        $user->jumlah_dusun             = $request->jumlah_dusun;
        $user->jumlah_lurah             = $request->jumlah_lurah;
        $user->jumlah_seklur             = $request->jumlah_seklur;
        $user->jumlah_kepala_seksi      = $request->jumlah_kepala_seksi;
        $user->jumlah_pelaksana         = $request->jumlah_pelaksana;
        $user->jumlah_kepala_lingkungan    = $request->jumlah_kepala_lingkungan;
        $user->jumlah_anggota_bpd          = $request->jumlah_anggota_bpd;
        $user->jumlah_anggota_lpm          = $request->jumlah_anggota_lpm;
       
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_pemerintah_kelurahan');
    }


    public function update_pemerintah(Request $request)
    {
        $id                             = $request->id;
        $jumlah_rt                      = $request->jumlah_rt;
        $jumlah_rw                      = $request->jumlah_rw;
        $jumlah_dusun                   = $request->jumlah_dusun;
        $jumlah_lurah                   = $request->jumlah_lurah;
        $jumlah_seklur                  = $request->jumlah_seklur;
        $jumlah_kepala_seksi            = $request->jumlah_kepala_seksi;
        $jumlah_pelaksana               = $request->jumlah_pelaksana;
        $jumlah_kepala_lingkungan       = $request->jumlah_kepala_lingkungan;
        $jumlah_anggota_bpd             = $request->jumlah_anggota_bpd;
        $jumlah_anggota_lpm             = $request->jumlah_anggota_lpm;
       

        $update = [

            'id'                           => $id,
            'jumlah_rt'                    => $jumlah_rt,
            'jumlah_rw'                    => $jumlah_rw,
            'jumlah_dusun'                 => $jumlah_dusun,
            'jumlah_lurah'                 => $jumlah_lurah,
            'jumlah_seklur'                => $jumlah_seklur,
            'jumlah_kepala_seksi'          => $jumlah_kepala_seksi,
            'jumlah_pelaksana'             => $jumlah_pelaksana,
            'jumlah_kepala_lingkungan'     => $jumlah_kepala_lingkungan,
            'jumlah_anggota_bpd'           => $jumlah_anggota_bpd,
            'jumlah_anggota_lpm'           => $jumlah_anggota_lpm,
           
        ];
        DataPemerintah::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_pemerintah_kelurahan');


    }


   
}
