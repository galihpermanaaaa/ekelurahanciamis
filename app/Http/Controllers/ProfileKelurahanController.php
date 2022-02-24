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
        $data = DataGeografis::all();
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
