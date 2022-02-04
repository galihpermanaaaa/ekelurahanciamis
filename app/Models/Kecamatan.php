<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table='districts';
    protected $primaryKey='dis_id';
    protected $fillable = ['dis_name', 'city_id'];

    public function cities()
    {
    	return $this->belongsTo('App\Models\Kota', 'city_id');
    }

    public function subdistricts()
    {
    	return $this->hasMany('App\Models\Desa', 'dis_id');
    }

    public function surat_sku()
    {
    	return $this->hasMany('App\Models\SKU', 'dis_id');
    }

    public function users()
    {
    	return $this->hasMany('App\Models\User', 'dis_id');
    }

    public function surat_tdk_mampu()
    {
    	return $this->hasMany('App\Models\SKM', 'dis_id');
    }

}
