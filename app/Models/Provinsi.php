<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table='provinces';
    protected $primaryKey='prov_id';
    protected $fillable = ['prov_id', 'prov_name', 'locationid', 'status'];

    public function cities()
    {
    	return $this->hasMany('App\Models\Kota', 'prov_id');
    }

    public function surat_sku()
    {
    	return $this->hasMany('App\Models\SKU', 'prov_id');
    }

    public function users()
    {
    	return $this->hasMany('App\Models\User', 'prov_id');
    }

    public function surat_tdk_mampu()
    {
    	return $this->hasMany('App\Models\SKM', 'prov_id');
    }

    public function surat_domisili()
    {
    	return $this->hasMany('App\Models\SuratDomisili', 'prov_id');
    }

    public function surat_duda()
    {
    	return $this->hasMany('App\Models\SuratDuda', 'prov_id');
    }

    public function surat_janda()
    {
    	return $this->hasMany('App\Models\SuratJanda', 'prov_id');
    }

    public function sbm()
    {
    	return $this->hasMany('App\Models\SBM', 'prov_id');
    }

}
