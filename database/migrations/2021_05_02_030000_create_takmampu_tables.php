<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakmampuTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_tdk_mampu', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('nomor_bdt');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
           
            $table->unsignedBigInteger('prov_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('dis_id');
            $table->unsignedBigInteger('subdis_id');
            $table->unsignedBigInteger('id_rw');
            $table->enum('rt', ['1','2','3','4','5','6','7','8']);


            $table->string('hubungan_keluarga');
            $table->string('nama_kel');
            $table->string('nik_kel');
            $table->string('tempat_kel');
            $table->date('tanggal_lahir_kel');
            $table->text('alamat');

            $table->string('kk');
            $table->string('surat_pengantar_rt_rw');
            $table->string('surat_pernyataan_miskin');
            $table->string('token');
            
            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });


        Schema::table('surat_tdk_mampu_terima', function (Blueprint $table) {
            $table->foreign('id_skm')
            ->references('id')
            ->on('surat_tdk_mampu')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_tdk_mampu_tolak', function (Blueprint $table) {
            $table->foreign('id_skm')
            ->references('id')
            ->on('surat_tdk_mampu')
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
        Schema::table('surat_tdk_mampu_terima', function(Blueprint $table) {
            $table->dropforeign('skm_diterima_id_sku_foreign');
        });

        Schema::table('surat_tdk_mampu_tolak', function(Blueprint $table) {
            $table->dropforeign('skm_ditolak_id_sku_foreign');
        });
        Schema::dropIfExists('surat_tdk_mampu');
    }
}
