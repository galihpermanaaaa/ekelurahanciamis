<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDomisiliTerima extends Model
{
    protected $table='surat_domisili_diterima';
    protected $primaryKey='id_domisili_diterima';
    protected $fillable = ['id_domisili'];

    public function surat_domisili()
    {
    	return $this->belongsTo('App\Models\SuratDomisili', 'id_domisili');
    }

}
