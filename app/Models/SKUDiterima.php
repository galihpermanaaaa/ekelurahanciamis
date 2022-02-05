<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKUDiterima extends Model
{
    use HasFactory;
    protected $table='sku_diterima';
    protected $primaryKey='	id_sku_diterima';
    protected $fillable = ['id_sku'];

    public function surat_sku()
    {
    	return $this->belongsTo('App\Models\SKU', 'id_sku');
    }
}
