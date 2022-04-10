<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJandaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_janda', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan', ['Janda']);
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
            
            $table->string('pengantar_dari');
            $table->string('melengkapi');
           
            $table->string('ktp');
            $table->string('kk');
            $table->string('surat_pengantar_rt');
            $table->string('kematian_akta_cerai');
            $table->string('token');

            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::table('surat_janda_ditolak', function (Blueprint $table) {
            $table->foreign('id_janda')
            ->references('id')
            ->on('surat_janda')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_janda_diterima', function (Blueprint $table) {
            $table->foreign('id_janda')
            ->references('id')
            ->on('surat_janda')
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
        Schema::table('surat_janda_ditolak', function(Blueprint $table) {
            $table->dropforeign('surat_janda_ditolak_id_janda_foreign');
        });

        Schema::table('surat_janda_diterima', function(Blueprint $table) {
            $table->dropforeign('surat_janda_diterima_id_janda_foreign');
        });
        Schema::dropIfExists('surat_janda');
    }
}
