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
use App\Models\DomisiliPT;
use App\Models\DomisiliPTTerima;
use App\Models\DomisiliPTolak;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Codedge\Fpdf\Fpdf\Fpdf;
use Hash;
use DB;
use Auth;
use Alert;
use App\Mail\VerifikasiSuratKeteranganDomisiliPT;
use App\Helpers;
use App\tgl_indo;
use Illuminate\Support\Facades\Mail;

class PembuatSuratDomisiliPTController extends Controller
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

        $halaman = "data_domisilipt";
        $user = User::all();
        $data = DomisiliPT::orderBy('id', 'DESC')->get();
        $count_terverifikasi = DomisiliPT::where('verifikasi', 'Terverifikasi')->count();
        $count_ditolak = DomisiliPT::where('verifikasi', 'Ditolak')->count();
        $rw = RW::all();
        return view('user.domisili_pt.data_domisilipt', compact('halaman', 'data', 'rw', 'count_terverifikasi', 'count_ditolak'));
        }
        else
        {
            return redirect()->route('login');
        }
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
