<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKUDitolak extends Model
{
    use HasFactory;
    protected $table='sku_ditolak';
    protected $primaryKey='	id_sku_ditolak';
    protected $fillable = ['id_sku'];

    public function surat_sku()
    {
    	return $this->belongsTo('App\Models\SKU', 'id_sku');
    }
}
