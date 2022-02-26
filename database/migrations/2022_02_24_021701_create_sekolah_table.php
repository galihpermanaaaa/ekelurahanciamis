<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->enum('ting_sekolah', ['TKA Umum','TKA/TPA','SD/MI','SMP/MTS','SMK/SMA/Aliyah','Perguruan Tinggi']);
            $table->string('jumlah_sekolah');
            $table->string('jumlah_murid');
            $table->string('jumlah_guru');
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
        Schema::dropIfExists('sekolah');
    }
}
