<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaIbadah extends Model
{
    use HasFactory;
    protected $table='sarana';
    protected $primaryKey='id';
    protected $fillable = ['sarana','jumlah'];
}
