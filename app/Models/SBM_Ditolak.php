<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SBM_Ditolak extends Model
{
    use HasFactory;
    protected $table='sbm_ditolak';
    protected $primaryKey='	id_sbm_ditolak';
    protected $fillable = ['id_sbm'];

    public function sbm()
    {
    	return $this->belongsTo('App\Models\SBM', 'id_sbm');
    }
}
