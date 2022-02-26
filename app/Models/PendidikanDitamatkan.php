<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanDitamatkan extends Model
{
    use HasFactory;
    protected $table='data_pendidikan';
    protected $primaryKey='id';
    protected $fillable = ['pendidikan','jumlah'];
}
