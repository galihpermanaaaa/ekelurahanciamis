<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomisiliperusahaantolakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domisili_pt_tolak', function (Blueprint $table) {
            $table->bigIncrements('id_domisili_pt_ditolak');
            $table->unsignedBigInteger('id_domisili_pt');
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
        Schema::dropIfExists('domisili_pt_tolak');
    }
}
