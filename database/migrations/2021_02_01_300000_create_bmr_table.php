<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBmrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmr', function (Blueprint $table) {
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

            $table->string('pengantar_dari_rt');
            $table->string('pengantar_dari_rw');

            $table->string('ktp');
            $table->string('kk');
            $table->string('surat_pengantar_rt');
            $table->string('surat_pernyataan_bermaterai'); 
            $table->string('token');

            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::table('bmr_ditolak', function (Blueprint $table) {
            $table->foreign('id_bmr')
            ->references('id')
            ->on('bmr')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('bmr_diterima', function (Blueprint $table) {
            $table->foreign('id_bmr')
            ->references('id')
            ->on('bmr')
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
        Schema::table('bmr_ditolak', function(Blueprint $table) {
            $table->dropforeign('bmr_ditolak_id_bmr_foreign');
        });

        Schema::table('bmr_diterima', function(Blueprint $table) {
            $table->dropforeign('bmr_diterima_id_bmr_foreign');
        });

        Schema::dropIfExists('bmr');
    }
}
