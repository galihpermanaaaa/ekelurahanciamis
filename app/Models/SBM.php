<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SBM extends Model
{
    use HasFactory;
    protected $table='sbm';
    protected $primaryKey='id';
    protected $fillable = ['nama', 'nik', 'jk', 'tanggal_lahir', 'status_perkawinan', 'status_kewarganegaraan', 'agama', 'pekerjaan', 
                            'prov_id', 'city_id', 'dis_id', 'subdis_id', 'id_rw', 'rt',
                            'pengantar_dari', 'melengkapi',  
                            'ktp', 'kk', 'surat_pengantar_rt', 'token', 'id_users', 
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

                            public function sbm_diterima()
                            {
                                return $this->hasMany('App\Models\SBM_Diterima', 'id_sbm');
                            }

                            public function sbm_ditolak()
                            {
                                return $this->hasMany('App\Models\SBM_Ditolak', 'id_sbm');
                            }

}
