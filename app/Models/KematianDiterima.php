<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KematianDiterima extends Model
{
    use HasFactory;
    protected $table='kematian_diterima';
    protected $primaryKey='	id_kematian_diterima';
    protected $fillable = ['id_kematian'];

    public function kematian()
    {
    	return $this->belongsTo('App\Models\Kematian', 'id_kematian');
    }
}
