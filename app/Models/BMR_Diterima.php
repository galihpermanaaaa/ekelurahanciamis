<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMR_Diterima extends Model
{
    use HasFactory;
    protected $table='bmr_diterima';
    protected $primaryKey='	id_bmr_diterima';
    protected $fillable = ['id_bmr'];

    public function bmr()
    {
    	return $this->belongsTo('App\Models\BMR', 'id_bmr');
    }
}
