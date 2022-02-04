<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKMDiterima extends Model
{
    protected $table='surat_tdk_mampu_terima';
    protected $primaryKey='id_skm_diterima';
    protected $fillable = ['id_skm'];

    public function surat_tdk_mampu()
    {
    	return $this->belongsTo('App\Models\SKM', 'id');
    }

    
}
