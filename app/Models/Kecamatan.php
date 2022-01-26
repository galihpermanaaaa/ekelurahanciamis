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

    public function information_forms()
    {
    	return $this->hasMany('App\Models\InformationForms', 'dis_id');
    }

    public function subdistricts()
    {
    	return $this->hasMany('App\Models\Desa', 'dis_id');
    }

    public function data_orang()
    {
    	return $this->hasMany('App\Models\DataOrang', 'dis_id');
    }

    public function peta_kordinasi()
    {
    	return $this->hasMany('App\Models\PetaKordinasi', 'dis_id');
    }

    public function wilayah_kerja()
    {
    	return $this->hasMany('App\Models\WilayahKesmas', 'dis_id');
    }


}
