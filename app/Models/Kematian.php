<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;
    protected $table='kematian';
    protected $primaryKey='id';
    protected $fillable = ['nama', 'tanggal_lahir', 'tempat_lahir', 'nomor_bdt', 'untuk_persyaratan',
                            'prov_id', 'city_id', 'dis_id', 'subdis_id', 'id_rw', 'rt','nama_jalan',

                            'lingkungan','tanggal_meninggal', 'disebabkan', 'ditempat', 'surat_diperlukan_untuk', 'ktp_almarhum',
                            'kk_almarhum', 'surat_pengantar_dari_rs', 'surat_pengantar_dari_rt', 'sk_terakhir', 'karip', 'tabungan_pensiunan',
                            'token', 'id_users', 'verifikasi', 'email', 'tanggal_buat_surat', 'deskripsi', 'tanggal_verifikasi'];

                            public function provinces()
                            {
                                return $this->belongsTo('App\Models\Provinsi', 'prov_id');
                            }

                            public function cities()
                            {
                                return $this->belongsTo('App\Models\Kota', 'city_id');
                            }

                            public function districts()
                            {
                                return $this->belongsTo('App\Models\Kecamatan', 'dis_id');
                            }

                            public function subdistricts()
                            {
                                return $this->belongsTo('App\Models\Desa', 'subdis_id');
                            }

                            public function rw()
                            {
                                return $this->belongsTo('App\Models\RW', 'id_rw');
                            }

                            public function users()
                            {
                                return $this->belongsTo('App\Models\User', 'id_users');
                            }

                            public function kematian_diterima()
                            {
                                return $this->hasMany('App\Models\KematianDiterima', 'id_kematian');
                            }

                            public function kematian_ditolak()
                            {
                                return $this->hasMany('App\Models\KematianDitolak', 'id_kematian');
                            }
}
