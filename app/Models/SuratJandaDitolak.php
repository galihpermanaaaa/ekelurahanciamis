<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJandaDitolak extends Model
{
    use HasFactory;
    protected $table='surat_janda_ditolak';
    protected $primaryKey='	id_janda_ditolak';
    protected $fillable = ['id_janda'];

    public function surat_janda()
    {
    	return $this->belongsTo('App\Models\SuratJanda', 'id_janda');
    }
}
