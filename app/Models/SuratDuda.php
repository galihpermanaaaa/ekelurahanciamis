<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDuda extends Model
{
    use HasFactory;
    protected $table='surat_duda';
    protected $primaryKey='id';
    protected $fillable = ['nama', 'nik', 'jk', 'tanggal_lahir', 'status_perkawinan', 'status_kewarganegaraan', 'agama', 'pekerjaan', 
                            'prov_id', 'city_id', 'dis_id', 'subdis_id', 'id_rw', 'rt',
                            'pengantar_dari', 'melengkapi',  
                            'ktp', 'kk', 'surat_pengantar_rt', 'kematian_akta_cerai', 'token', 'id_users', 
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

                            public function surat_duda_diterima()
                            {
                                return $this->hasMany('App\Models\SuratDudaDiterima', 'id_duda');
                            }

                            public function surat_duda_ditolak()
                            {
                                return $this->hasMany('App\Models\SuratDudaDitolak', 'id_duda');
                            }

}
