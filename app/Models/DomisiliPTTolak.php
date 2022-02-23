<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliPTTolak extends Model
{
    use HasFactory;
    protected $table='domisili_pt_tolak';
    protected $primaryKey='	id_domisili_pt_ditolak';
    protected $fillable = ['id_domisili_pt'];

    public function domisili_pt()
    {
    	return $this->belongsTo('App\Models\DomisiliPT', 'id_domisili_pt');
    }
}
