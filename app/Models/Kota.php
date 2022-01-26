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

  

}
