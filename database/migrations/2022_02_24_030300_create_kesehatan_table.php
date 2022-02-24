<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesehatan', function (Blueprint $table) {
            $table->id();
            $table->enum('tempat', ['RSU','Puskesmas','Dokter Umum','Dokter Gigi','Dokter Spesialis','Dokter Kesehatan','Rumah Bersalin','Klinik Tradisional','Apotek','Toko Obat','Polindes','Dukun Beranak','Posyando','Lab Kesehatan']);
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
        Schema::dropIfExists('kesehatan');
    }
}
