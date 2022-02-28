<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukkanSaran extends Model
{
    use HasFactory;
    protected $table='masukkan';
    protected $primaryKey='id';
    protected $fillable = ['nama','email','telp','isi','tanggal_buat_masukkan'];
}
