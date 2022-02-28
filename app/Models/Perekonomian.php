<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perekonomian extends Model
{
    use HasFactory;
    protected $table='perekonomian';
    protected $primaryKey='id';
    protected $fillable = ['tempat','jumlah'];
}
