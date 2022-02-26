<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokUmur extends Model
{
    use HasFactory;
    protected $table='data_umur';
    protected $primaryKey='id';
    protected $fillable = ['jk','kiteria','jumlah'];
}
