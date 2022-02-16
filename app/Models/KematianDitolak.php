<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KematianDitolak extends Model
{
    use HasFactory;
    protected $table='kematian_ditolak';
    protected $primaryKey='	id_kematian_ditolak';
    protected $fillable = ['id_kematian'];

    public function kematian()
    {
    	return $this->belongsTo('App\Models\Kematian', 'id_kematian');
    }
}
