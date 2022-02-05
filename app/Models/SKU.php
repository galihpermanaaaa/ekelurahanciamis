<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    use HasFactory;
    protected $table='surat_sku';
    protected $primaryKey='id';
    protected $fillable = ['nama', 'jk', 'tanggal_lahir', 'status_perkawinan', 'status_kewarganegaraan', 'agama', 'pekerjaan', 
                            'prov_id', 'city_id', 'dis_id', 'subdis_id', 'id_rw', 'rt', 'nomor_surat_pengantar_rw_rt', 
                            'keperluan', 'bidang_usaha', 'ktp', 'kk', 'surat_pengantar', 'keterangan_domisili', 'token', 'id_users', 
                            'verifikasi', 'email', 'tanggal_buat_surat', 'deskripsi', 'tanggal_verifikasi'];

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

                            public function sku_diterima()
                            {
                                return $this->hasMany('App\Models\SKUDiterima', 'id_sku');
                            }

                            public function sku_ditolak()
                            {
                                return $this->hasMany('App\Models\SKUDitolak', 'id_sku');
                            }


}
