<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKM extends Model
{
    use HasFactory;
    protected $table='surat_tdk_mampu';
    protected $primaryKey='id';
    protected $fillable = ['nama', 'tanggal_lahir', 'tempat_lahir', 'nomor_bdt', 'untuk_persyaratan',
                            'prov_id', 'city_id', 'dis_id', 'subdis_id', 'id_rw', 'rt', 'nama_jalan',
                            'hubungan_keluarga','nama_kel', 'nik_kel', 'tempat_kel', 'tanggal_lahir_kel', 'alamat',
                            'kk', 'surat_pengantar_rt_rw', 'surat_pernyataan_miskin',
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

                            public function surat_tdk_mampu_terima()
                            {
                                return $this->hasMany('App\Models\SKMDiterima', 'id_skm');
                            }

                            public function surat_tdk_mampu_tolak()
                            {
                                return $this->hasMany('App\Models\SKMDitolak', 'id_skm');
                            }


}
