<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table='subdistricts';
    protected $primaryKey='subdis_id';
    protected $fillable = ['subdis_name', 'dis_id'];

    public function districts()
    {
    	return $this->belongsTo('App\Models\Kecamatan', 'dis_id');
    }

    public function rw()
    {
    	return $this->hasMany('App\Models\RW', 'subdis_id');
    }

    public function surat_sku()
    {
    	return $this->hasMany('App\Models\SKU', 'subdis_id');
    }

    public function users()
    {
    	return $this->hasMany('App\Models\User', 'subdis_id');
    }

    public function surat_tdk_mampu()
    {
    	return $this->hasMany('App\Models\SKM', 'subdis_id');
    }

    public function surat_domisili()
    {
    	return $this->hasMany('App\Models\SuratDomisili', 'subdis_id');
    }
}
