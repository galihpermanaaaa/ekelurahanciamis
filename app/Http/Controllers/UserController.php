<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Rules\MatchOldPassword;


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
        $user = User::all();
        return view('user.data_user', compact('halaman', 'user'));
        }
        else
        {
            return redirect()->route('dashboard');
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
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone_number'     => 'required|min:11|numeric',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone_number = $request->phone_number;
        $user->role_name    = $request->role_name;
        $user->password     = Hash::make($request->password);
        $user->save();
        Toastr::success('Data User Berhasil Disimpan :)','Success');
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

        $update = [

            'id'           => $id,
            'email'        => $email,
            'name'         => $name,
            'phone_number' => $phone_number,
            'role_name'    => $role_name,

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
