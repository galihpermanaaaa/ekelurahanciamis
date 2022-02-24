<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGeografis extends Model
{
    use HasFactory;
    protected $table='data_geografis';
    protected $primaryKey='id';
    protected $fillable = ['jarak_kantor_desa', 'luas_wilayah','bangunan_pekarangan','ladang_kebun','kolam','hutan_rakyat','hutan_negara','lainnya',
                            'berperairan_teknis','berperairan_sederhana','tidak_berperairan','panjang_jalan_nasional','panjang_jalan_provinsi',
                            'panjang_jalan_kabupaten','panjang_jalan_desa','hotmix','aspal','batu','tanah','jumlah_jembatan','sungai_besar_panjang',
                            'sungai_besar_banyaknya'];
}
