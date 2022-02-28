<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;
    protected $table='perumahan';
    protected $primaryKey='id';
    protected $fillable = ['status_kepemilikan','jumlah'];
}
