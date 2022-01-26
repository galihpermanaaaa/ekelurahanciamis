<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('city_id');
            $table->string('city_name');
            $table->unsignedBigInteger('prov_id');
            $table->timestamps();
        });


        Schema::table('districts', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_sku', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
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
       
        Schema::table('districts', function(Blueprint $table) {
            $table->dropforeign('districts_city_id_foreign');
        });

        Schema::table('surat_sku', function(Blueprint $table) {
            $table->dropforeign('surat_sku_city_id_foreign');
        });

        Schema::dropIfExists('cities');
    }
}
