<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSubdistricts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->bigIncrements('subdis_id');
            $table->string('subdis_name');
            $table->unsignedBigInteger('dis_id');
            $table->timestamps();
        });

        Schema::table('rw', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_sku', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_tdk_mampu', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_domisili', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_duda', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_janda', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('sbm', function (Blueprint $table) {
            $table->foreign('subdis_id')
            ->references('subdis_id')
            ->on('subdistricts')
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
        Schema::table('rw', function(Blueprint $table) {
            $table->dropforeign('rw_subdis_id_foreign');
        });

        Schema::table('surat_sku', function(Blueprint $table) {
            $table->dropforeign('surat_sku_subdis_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropforeign('users_subdis_id_foreign');
        });

        Schema::table('surat_tdk_mampu', function(Blueprint $table) {
            $table->dropforeign('surat_tdk_mampu_subdis_id_foreign');
        });

        Schema::table('surat_domisili', function(Blueprint $table) {
            $table->dropforeign('surat_domisili_subdis_id_foreign');
        });

        Schema::table('surat_duda', function(Blueprint $table) {
            $table->dropforeign('surat_duda_subdis_id_foreign');
        });

        Schema::table('surat_janda', function(Blueprint $table) {
            $table->dropforeign('surat_janda_subdis_id_foreign');
        });

        Schema::table('sbm', function(Blueprint $table) {
            $table->dropforeign('sbm_subdis_id_foreign');
        });
        
      
        Schema::dropIfExists('subdistricts');
    }
}
