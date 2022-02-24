<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatapencarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_pencarian', function (Blueprint $table) {
            $table->id();
            $table->enum('pekerjaan', ['PNS','TNI/POLRI','BUMN/BUMD','Pegawai Swasta','Pertanian','Peternakan','Perikanan','Industri Pengolahan','Perdagangan','Angkutan','Jasa-jasa','Buruh Pertukangan','Buruh Pertanian','Buruh Serabutan','Pengangguran']);
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
        Schema::dropIfExists('mata_pencarian');
    }
}
