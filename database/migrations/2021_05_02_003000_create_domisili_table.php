<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomisiliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_domisili', function (Blueprint $table) {
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
            $table->string('alamat_asal');
            $table->string('ktp_domisili');
            $table->string('kk_domisili');
            $table->string('surat_pengantar_rt_rw_domisili');
            $table->string('token');
            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::table('surat_domisili_ditolak', function (Blueprint $table) {
            $table->foreign('id_domisili')
            ->references('id')
            ->on('surat_domisili')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_domisili_diterima', function (Blueprint $table) {
            $table->foreign('id_domisili')
            ->references('id')
            ->on('surat_domisili')
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
        Schema::table('surat_domisili_ditolak', function(Blueprint $table) {
            $table->dropforeign('surat_domisili_ditolak_id_domisili_foreign');
        });

        Schema::table('surat_domisili_diterima', function(Blueprint $table) {
            $table->dropforeign('surat_domisili_diterima_id_domisili_foreign');
        });

        Schema::dropIfExists('surat_domisili');
    }
}
