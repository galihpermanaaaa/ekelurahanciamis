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

}
