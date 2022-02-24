<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerekonomianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perekonomian', function (Blueprint $table) {
            $table->id();
            $table->enum('tempat', ['Toko Eceran','Warung Eceran','Rumah Makan','Warung Nasi','Wartel/Warpostel','Outlet Hp/Voucer','Salon Kecantikan/Rias','Pemangkas Rambut','Bengkel Mobil','Bengkel Motor','Bengkel Sepeda','Tambal Ban','Bengkel Barang Elektronik','Pabrik Makanan/ Minuman','Pabrik Lainnya','Huller Gabah','Ojeg Sepada Motor','Angkot','Angkutan Antar Kota/ Propinsi','Becak']);
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perekonomian');
    }
}
