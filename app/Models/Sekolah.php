<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table='sekolah';
    protected $primaryKey='id';
    protected $fillable = ['ting_sekolah','jumlah_sekolah','jumlah_murid','jumlah_guru'];
}
