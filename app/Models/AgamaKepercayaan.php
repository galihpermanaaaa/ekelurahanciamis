<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgamaKepercayaan extends Model
{
    use HasFactory;
    protected $table='agama_kepercayaan';
    protected $primaryKey='id';
    protected $fillable = ['agama','jumlah'];
}
