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
