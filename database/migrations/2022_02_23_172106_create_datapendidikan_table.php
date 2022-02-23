<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->enum('pendidikan', ['Belum Sekolah','Belum Tamat SD','SD','SMP','SMA','DI','DII','DIII','SI','SII','SIII']);
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
        Schema::dropIfExists('data_pendidikan');
    }
}
