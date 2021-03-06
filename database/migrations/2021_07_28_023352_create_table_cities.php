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

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_tdk_mampu', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_domisili', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_duda', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_janda', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('sbm', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('bmr', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('kematian', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('city_id')
            ->on('cities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        
        Schema::table('domisili_pt', function (Blueprint $table) {
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

        Schema::table('users', function(Blueprint $table) {
            $table->dropforeign('users_city_id_foreign');
        });

        Schema::table('surat_tdk_mampu', function(Blueprint $table) {
            $table->dropforeign('surat_tdk_mampu_city_id_foreign');
        });

        Schema::table('surat_domisili', function(Blueprint $table) {
            $table->dropforeign('surat_domisili_city_id_foreign');
        });

        Schema::table('surat_duda', function(Blueprint $table) {
            $table->dropforeign('surat_duda_city_id_foreign');
        });

        Schema::table('surat_janda', function(Blueprint $table) {
            $table->dropforeign('surat_janda_city_id_foreign');
        });

        Schema::table('sbm', function(Blueprint $table) {
            $table->dropforeign('sbm_city_id_foreign');
        });

        Schema::table('bmr', function(Blueprint $table) {
            $table->dropforeign('bmr_city_id_foreign');
        });

        Schema::table('kematian', function(Blueprint $table) {
            $table->dropforeign('kematian_city_id_foreign');
        });

        Schema::table('domisili_pt', function(Blueprint $table) {
            $table->dropforeign('domisili_pt_city_id_foreign');
        });


        

        Schema::dropIfExists('cities');
    }
}
