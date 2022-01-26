<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rw', function (Blueprint $table) {
            $table->bigIncrements('id_rw');
            $table->unsignedBigInteger('subdis_id');
            $table->string('nama_rw');
            $table->timestamps();
        });

        Schema::table('surat_sku', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_sku', function(Blueprint $table) {
            $table->dropforeign('surat_sku_id_rw_foreign');
        });

        Schema::dropIfExists('rw');
    }
}
