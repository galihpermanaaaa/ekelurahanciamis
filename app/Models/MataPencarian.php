<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPencarian extends Model
{
    use HasFactory;
    protected $table='mata_pencarian';
    protected $primaryKey='id';
    protected $fillable = ['pekerjaan','jumlah'];
}
