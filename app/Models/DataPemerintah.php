<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemerintah extends Model
{
    use HasFactory;
    protected $table='data_pemerintah';
    protected $primaryKey='id';
    protected $fillable = ['jumlah_rt', 'jumlah_rw','jumlah_dusun','jumlah_lurah','jumlah_seklur','jumlah_kepala_seksi','jumlah_pelaksana','jumlah_kepala_lingkungan','jumlah_anggota_bpd','jumlah_anggota_lpm'];
}
