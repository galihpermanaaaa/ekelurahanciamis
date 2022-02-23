<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapemerintahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemerintah', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah_rt');
            $table->string('jumlah_rw');
            $table->string('jumlah_dusun');
            $table->string('jumlah_lurah');
            $table->string('jumlah_seklur');
            $table->string('jumlah_kepala_seksi');
            $table->string('jumlah_pelaksana');
            $table->string('jumlah_kepala_lingkungan');
            $table->string('jumlah_anggota_bpd');
            $table->string('jumlah_anggota_lpm');
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
        Schema::dropIfExists('data_pemerintah');
    }
}
