<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;
    protected $table='rw';
    protected $primaryKey='id_rw';
    protected $fillable = ['nama_rw', 'subdis_id'];

    public function subdistricts()
    {
    	return $this->belongsTo('App\Models\Desa', 'subdis_id');
    }

    public function surat_sku()
    {
    	return $this->hasMany('App\Models\SKU', 'id_rw');
    }

    public function users()
    {
    	return $this->hasMany('App\Models\User', 'id_rw');
    }

    public function surat_tdk_mampu()
    {
    	return $this->hasMany('App\Models\SKM', 'id_rw');
    }
}
