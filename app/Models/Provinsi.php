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

    public function information_forms()
    {
    	return $this->hasMany('App\Models\InformationForms', 'prov_id');
    }

    public function data_orang()
    {
    	return $this->hasMany('App\Models\DataOrang', 'prov_id');
    }

    public function wilayah_kerja()
    {
    	return $this->hasMany('App\Models\WilayahKesmas', 'prov_id');
    }

}
