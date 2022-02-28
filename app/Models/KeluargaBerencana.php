<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaBerencana extends Model
{
    use HasFactory;
    protected $table='keluarga_berencana';
    protected $primaryKey='id';
    protected $fillable = ['berencana','jumlah'];
}
 