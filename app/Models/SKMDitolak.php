<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKMDitolak extends Model
{
    protected $table='surat_tdk_mampu_tolak';
    protected $primaryKey='id_skm_ditolak';
    protected $fillable = ['id_skm'];

    public function surat_tdk_mampu()
    {
    	return $this->belongsTo('App\Models\SKM', 'id');
    }
}
