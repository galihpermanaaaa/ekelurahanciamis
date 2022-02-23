<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatageografisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_geografis', function (Blueprint $table) {
            $table->id();
            $table->string('jarak_kantor_desa');
            $table->string('luas_wilayah');
            $table->string('bangunan_pekarangan');
            $table->string('ladang_kebun');
            $table->string('kolam');
            $table->string('hutan_rakyat');
            $table->string('hutan_negara');
            $table->string('lainnya');

            $table->string('berperairan_teknis');
            $table->string('berperairan_sederhana');
            $table->string('tidak_berperairan');

            $table->string('panjang_jalan_nasional');
            $table->string('panjang_jalan_provinsi');
            $table->string('panjang_jalan_kabupaten');
            $table->string('panjang_jalan_desa');

            $table->string('hotmix');
            $table->string('aspal');
            $table->string('batu');
            $table->string('tanah');

            $table->string('jumlah_jembatan');
            $table->string('sungai_besar_panjang');
            $table->string('sungai_besar_banyaknya');
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
        Schema::dropIfExists('data_geografis');
    }
}
