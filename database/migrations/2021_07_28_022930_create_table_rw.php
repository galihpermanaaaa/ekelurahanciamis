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

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_tdk_mampu', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_domisili', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_duda', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_janda', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('sbm', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('bmr', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('kematian', function (Blueprint $table) {
            $table->foreign('id_rw')
            ->references('id_rw')
            ->on('rw')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('domisili_pt', function (Blueprint $table) {
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

        Schema::table('users', function(Blueprint $table) {
            $table->dropforeign('users_id_rw_foreign');
        });

        Schema::table('surat_tdk_mampu', function(Blueprint $table) {
            $table->dropforeign('surat_tdk_mampu_id_rw_foreign');
        });

        Schema::table('surat_domisili', function(Blueprint $table) {
            $table->dropforeign('surat_tdk_mampu_id_rw_foreign');
        });

        Schema::table('surat_duda', function(Blueprint $table) {
            $table->dropforeign('surat_duda_id_rw_foreign');
        });

        Schema::table('surat_janda', function(Blueprint $table) {
            $table->dropforeign('surat_janda_id_rw_foreign');
        });

        Schema::table('sbm', function(Blueprint $table) {
            $table->dropforeign('sbm_id_rw_foreign');
        });

        Schema::table('bmr', function(Blueprint $table) {
            $table->dropforeign('bmr_id_rw_foreign');
        });

        Schema::table('kematian', function(Blueprint $table) {
            $table->dropforeign('kematian_id_rw_foreign');
        });

        Schema::table('domisili_pt', function(Blueprint $table) {
            $table->dropforeign('domisili_pt_id_rw_foreign');
        });

        Schema::dropIfExists('rw');
    }
}
