<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliPT extends Model
{
    use HasFactory;
    protected $table='domisili_pt';
    protected $primaryKey='id';
    protected $fillable = ['nama_lembaga', 'npwp_pt', 'pimpinan', 'surat_keterangan_dari',
                            'surat_keterangan_rt','ktp', 'kk', 'npwp',
                            'prov_id', 'city_id', 'dis_id', 'subdis_id', 'id_rw', 'rt',
                             'id_users','verifikasi', 'email', 'tanggal_buat_surat', 'deskripsi', 'tanggal_verifikasi'];

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

                            public function domisili_pt_terima()
                            {
                                return $this->hasMany('App\Models\DomisiliPTTerima', 'id_domisili_pt');
                            }

                            public function domisili_pt_tolak()
                            {
                                return $this->hasMany('App\Models\DomisiliPTTolak', 'id_domisili_pt');
                            }
                        }
