<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table='cities';
    protected $primaryKey='city_id';
    protected $fillable = ['city_name', 'prov_id'];

    public function provinces()
    {
    	return $this->belongsTo('App\Models\Provinsi', 'prov_id');
    }

    public function districts()
    {
    	return $this->hasMany('App\Models\Kecamatan', 'city_id');
    }
    public function surat_sku()
    {
    	return $this->hasMany('App\Models\SKU', 'city_id');
    }

    public function users()
    {
    	return $this->hasMany('App\Models\User', 'city_id');
    }

    public function surat_tdik_mampu()
    {
    	return $this->hasMany('App\Models\SKM', 'city_id');
    }

    public function surat_domisili()
    {
    	return $this->hasMany('App\Models\SuratDomisili', 'city_id');
    }

    public function surat_duda()
    {
    	return $this->hasMany('App\Models\SuratDuda', 'city_id');
    }

    public function surat_janda()
    {
    	return $this->hasMany('App\Models\SuratJanda', 'city_id');
    }

    public function sbm()
    {
    	return $this->hasMany('App\Models\SBM', 'city_id');
    }

    public function bmr()
    {
    	return $this->hasMany('App\Models\BMR', 'city_id');
    }



  
}
