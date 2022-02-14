<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDistricts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('dis_id');
            $table->string('dis_name');
            $table->unsignedBigInteger('city_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('geometry')->nullable();
            $table->timestamps();
        });

        Schema::table('subdistricts', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_sku', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_tdk_mampu', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_domisili', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_duda', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_janda', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('sbm', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
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
        Schema::table('subdistricts', function(Blueprint $table) {
            $table->dropforeign('subdistricts_dis_id_foreign');
        });

        Schema::table('surat_sku', function(Blueprint $table) {
            $table->dropforeign('surat_sku_dis_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropforeign('users_dis_id_foreign');
        });

        Schema::table('surat_tdk_mampu', function(Blueprint $table) {
            $table->dropforeign('surat_tdk_mampu_dis_id_foreign');
        });

        Schema::table('surat_duda', function(Blueprint $table) {
            $table->dropforeign('surat_duda_dis_id_foreign');
        });

        Schema::table('surat_janda', function(Blueprint $table) {
            $table->dropforeign('surat_janda_dis_id_foreign');
        });

        Schema::table('sbm', function(Blueprint $table) {
            $table->dropforeign('sbm_dis_id_foreign');
        });
        
        Schema::dropIfExists('districts');
    }
}
