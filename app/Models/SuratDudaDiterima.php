<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDudaDiterima extends Model
{
    use HasFactory;
    protected $table='surat_duda_diterima';
    protected $primaryKey='	id_duda_diterima';
    protected $fillable = ['id_duda'];

    public function surat_duda()
    {
    	return $this->belongsTo('App\Models\SuratDuda', 'id_duda');
    }
}
