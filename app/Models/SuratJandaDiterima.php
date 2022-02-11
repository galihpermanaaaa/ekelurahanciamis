<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJandaDiterima extends Model
{
    use HasFactory;
    protected $table='surat_janda_diterima';
    protected $primaryKey='	id_janda_diterima';
    protected $fillable = ['id_janda'];

    public function surat_janda()
    {
    	return $this->belongsTo('App\Models\SuratJanda', 'id_janda');
    }
}
