<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_sku', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan', ['Belum Menikah', 'Kawin', 'Duda', 'Janda']);
            $table->enum('status_kewarganegaraan', ['WNI', 'WNA']);
            $table->enum('agama', ['Islam','Kristen','Hindu','Budha','Konghuchu']);
            $table->enum('pekerjaan', ['PNS','Wiraswasta','Wirausaha','Buruh','Dokter', 'Bidan', 'TNI', 'Polisi', 'Petani', 'Karyawan Swasta', 'Karyawan Honorer', 'Karyawan BUMN', 'Karyawan BUMD', 'Anggota DPRD', 'Belum Bekerja']);
            $table->unsignedBigInteger('prov_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('dis_id');
            $table->unsignedBigInteger('subdis_id');
            $table->unsignedBigInteger('id_rw');
            $table->string('rt');
            $table->string('nama_jalan');
            $table->string('nomor_surat_pengantar_rw_rt');
            $table->string('keperluan');
            $table->string('bidang_usaha');
            $table->string('ktp');
            $table->string('kk');
            $table->string('surat_pengantar');
            $table->string('keterangan_domisili')->nullable();
            $table->string('token');
            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::table('sku_ditolak', function (Blueprint $table) {
            $table->foreign('id_sku')
            ->references('id')
            ->on('surat_sku')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('sku_diterima', function (Blueprint $table) {
            $table->foreign('id_sku')
            ->references('id')
            ->on('surat_sku')
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
        Schema::table('sku_diterima', function(Blueprint $table) {
            $table->dropforeign('sku_diterima_id_sku_foreign');
        });

        Schema::table('sku_ditolak', function(Blueprint $table) {
            $table->dropforeign('sku_ditolak_id_sku_foreign');
        });

        Schema::dropIfExists('surat_sku');
    }
}
