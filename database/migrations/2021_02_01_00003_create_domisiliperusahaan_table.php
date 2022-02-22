<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomisiliperusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domisili_pt', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga');
            $table->unsignedBigInteger('prov_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('dis_id');
            $table->unsignedBigInteger('subdis_id');
            $table->unsignedBigInteger('id_rw');
            $table->string('rt');
            $table->string('npwp_pt');
            $table->string('pimpinan');
            $table->string('surat_keterangan_dari'); 
            $table->string('ktp');
            $table->string('kk');
            $table->string('npwp');
            $table->string('surat_keterangan_rt');
            $table->string('token');
            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::table('domisili_pt_tolak', function (Blueprint $table) {
            $table->foreign('id_domisili_pt')
            ->references('id')
            ->on('domisili_pt')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('domisili_pt_terima', function (Blueprint $table) {
            $table->foreign('id_domisili_pt')
            ->references('id')
            ->on('domisili_pt')
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
        Schema::table('domisili_pt_tolak', function(Blueprint $table) {
            $table->dropforeign('domisili_pt_tolak_id_domisili_pt_foreign');
        });

        Schema::table('domisili_pt_terima', function(Blueprint $table) {
            $table->dropforeign('domisili_pt_terima_id_domisili_pt_foreign');
        });

        Schema::dropIfExists('domisili_pt');
    }
}
