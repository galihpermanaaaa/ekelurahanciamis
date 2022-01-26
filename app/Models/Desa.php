<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table='subdistricts';
    protected $primaryKey='subdis_id';
    protected $fillable = ['subdis_name', 'dis_id'];

    public function districts()
    {
    	return $this->belongsTo('App\Models\Desa', 'dis_id');
    }

    public function information_forms()
    {
    	return $this->hasMany('App\Models\InformationForms', 'subdis_id');
    }

    public function data_orang()
    {
    	return $this->hasMany('App\Models\DataOrang', 'subdis_id');
    }
}
