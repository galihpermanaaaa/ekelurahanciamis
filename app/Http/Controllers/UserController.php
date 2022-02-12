<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Rules\MatchOldPassword;
Use Alert;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\RW;
use App\Helpers;
use App\tgl_indo;


class UserController extends Controller
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

        $halaman = "data_user";
        $provinsi = Provinsi::all();
        $rw = RW::all();
        $user = User::all();
        return view('user.data_user', compact('halaman', 'user', 'provinsi', 'rw'));
        }
        else
        {
            return redirect()->route('login');
        }
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
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone_number'     => 'required|min:11|numeric',
            'role_name' => 'required|string|max:255',
            'prov_id'                       => '',
            'city_id'                       => '',
            'dis_id'                        => '',
            'subdis_id'                     => '',
            'id_rw'                         => '',
            'rt'                            => '',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone_number = $request->phone_number;
        $user->role_name    = $request->role_name;
        $user->prov_id                      = $request->prov_id;
        $user->city_id                      = $request->city_id;
        $user->dis_id                      = $request->dis_id;
        $user->subdis_id                   = $request->subdis_id;
        $user->id_rw                        = $request->id_rw;
        $user->rt                           = $request->rt;
        $user->password     = Hash::make($request->password);
        $user->save();
        Alert::success('Data User Berhasil Disimpan :)','Success');
        return redirect()->route('user/data_user');
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
    public function update(Request $request)
    {
        $id           = $request->id;
        $email        = $request->email;
        $name         = $request->name;
        $phone_number = $request->phone_number;
        $role_name    = $request->role_name;
        $prov_id    = $request->prov_id;
        $city_id    = $request->city_id;
        $dis_id    = $request->dis_id;
        $subdis_id    = $request->subdis_id;
        $id_rw    = $request->id_rw;
        $rt   = $request->rt;


        $update = [

            'id'           => $id,
            'email'        => $email,
            'name'         => $name,
            'phone_number' => $phone_number,
            'role_name'    => $role_name,
            'prov_id'       => $prov_id,
            'city_id'       => $city_id,
            'dis_id'        => $dis_id,
            'subdis_id'     => $subdis_id,
            'id_rw'         => $id_rw,
            'rt'            => $rt,

        ];
        User::where('id',$request->id)->update($update);
        Toastr::success('User Berhasil diupdate :)','Success');
        return redirect()->route('user/data_user');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
   {
    $user = User::findOrFail($request->id);
    $user->delete();
    Toastr::success('User berhasil dihapus :)','Success');
    return redirect()->route('user/data_user');
   }
}
