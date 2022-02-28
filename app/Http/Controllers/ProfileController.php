<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Helpers;
use App\tgl_indo;
use App\Rules\MatchOldPassword;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_list = User::where('id', '=', Auth::user()->id)->get();
        return view('profile.data_profile',compact('user_list'));
    }

    public function update_password(Request $request)
   {
       $request->validate([
           'current_password' => ['required', new MatchOldPassword],
           'new_password' => ['required'],
           'new_confirm_password' => ['same:new_password'],
       ]);
  
       User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
       Toastr::success('Password anda berhasil diupdate :)','Success');
       return redirect()->route('profile/data_profile');
   }

   public function update_profile(Request $request)
   {
       $id           = $request->id;
       $name        = $request->name;
       $email        = $request->email;

       $old_image = User::find($id);
       $image_name = $request->hidden_image;
       $image = $request->file('image');
       
       $update = [

           'id'           => $id,
           'name'         => $name,
           'email'        => $email,

       ];
       User::where('id',$request->id)->update($update);
       Toastr::success('Profile anda telah berhasil diupdate :)','Success');
       return redirect()->route('profile/data_profile');
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
