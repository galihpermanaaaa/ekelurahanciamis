<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_name',
        'phone_number',
        'password',
        
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function surat_sku()
    {
    	return $this->hasMany('App\Models\SKU', 'id_users');
    }

    public function surat_tdk_mampu()
    {
    	return $this->hasMany('App\Models\SKM', 'id_users');
    }

    public function surat_domisili()
    {
    	return $this->hasMany('App\Models\SuratDomisili', 'id_users');
    }

    public function provinces()
    {
    	return $this->belongsTo('App\Models\Provinsi', 'prov_id');
    }

    public function cities()
    {
    	return $this->belongsTo('App\Models\Kota', 'city_id');
    }

    public function subdistricts()
    {
    	return $this->belongsTo('App\Models\Desa', 'subdis_id');
    }

    public function districts()
    {
    	return $this->belongsTo('App\Models\Kecamatan', 'dis_id');
    }

    public function rw()
    {
    	return $this->belongsTo('App\Models\RW', 'id_rw');
    }

    public function surat_duda()
    {
    	return $this->hasMany('App\Models\SuratDuda', 'id_users');
    }

    public function surat_janda()
    {
    	return $this->hasMany('App\Models\SuratJanda', 'id_users');
    }

    public function sbm()
    {
    	return $this->hasMany('App\Models\SBM', 'id_users');
    }

    public function bmr()
    {
    	return $this->hasMany('App\Models\BMR', 'id_users');
    }

    
    
}
