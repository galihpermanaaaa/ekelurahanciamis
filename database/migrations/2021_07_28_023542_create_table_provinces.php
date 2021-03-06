<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProvinces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('prov_id');
            $table->string('prov_name');
            $table->string('locationid');
            $table->string('status');
            $table->timestamps();
        });

       
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_sku', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_tdk_mampu', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_domisili', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_duda', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_janda', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('sbm', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('bmr', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('kematian', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('domisili_pt', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
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
      
        Schema::table('cities', function(Blueprint $table) {
            $table->dropforeign('cities_prov_id_foreign');
        });

        Schema::table('surat_sku', function(Blueprint $table) {
            $table->dropforeign('surat_sku_prov_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropforeign('users_prov_id_foreign');
        });

        Schema::table('surat_tdk_mampu', function(Blueprint $table) {
            $table->dropforeign('surat_tdk_mampu_prov_id_foreign');
        });

        Schema::table('surat_domisili', function(Blueprint $table) {
            $table->dropforeign('surat_domisili_prov_id_foreign');
        });

        Schema::table('surat_duda', function(Blueprint $table) {
            $table->dropforeign('surat_duda_prov_id_foreign');
        });

        Schema::table('surat_janda', function(Blueprint $table) {
            $table->dropforeign('surat_janda_prov_id_foreign');
        });

        Schema::table('sbm', function(Blueprint $table) {
            $table->dropforeign('sbm_prov_id_foreign');
        });

        Schema::table('bmr', function(Blueprint $table) {
            $table->dropforeign('bmr_prov_id_foreign');
        });

        Schema::table('kematian', function(Blueprint $table) {
            $table->dropforeign('kematian_prov_id_foreign');
        });

        Schema::table('domisili_pt', function(Blueprint $table) {
            $table->dropforeign('domisili_pt_prov_id_foreign');
        });



        Schema::dropIfExists('provinces');
    }
}
