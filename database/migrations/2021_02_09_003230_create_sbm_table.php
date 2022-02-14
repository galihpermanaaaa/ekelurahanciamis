<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbm', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan', ['Belum Menikah']);
            $table->enum('status_kewarganegaraan', ['WNI', 'WNA']);
            $table->enum('agama', ['Islam','Kristen','Hindu','Budha','Konghuchu']);
            $table->enum('pekerjaan', ['PNS','Wiraswasta','Wirausaha','Buruh','Dokter', 'Bidan', 'TNI', 'Polisi', 'Petani', 'Karyawan Swasta', 'Karyawan Honorer', 'Karyawan BUMN', 'Karyawan BUMD', 'Anggota DPRD', 'Belum Bekerja']);
            $table->unsignedBigInteger('prov_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('dis_id');
            $table->unsignedBigInteger('subdis_id');
            $table->unsignedBigInteger('id_rw');
            $table->enum('rt', ['1','2','3','4','5','6','7','8']);

            $table->string('ktp');
            $table->string('kk');
            $table->string('surat_pengantar_rt');
            $table->string('token');

            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });

        Schema::table('sbm_diterima', function (Blueprint $table) {
            $table->foreign('id_sbm')
            ->references('id')
            ->on('sbm')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('sbm_ditolak', function (Blueprint $table) {
            $table->foreign('id_sbm')
            ->references('id')
            ->on('sbm')
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
        Schema::table('sbm_diterima', function(Blueprint $table) {
            $table->dropforeign('sbm_diterima_id_sbm_foreign');
        });

        Schema::table('sbm_ditolak', function(Blueprint $table) {
            $table->dropforeign('sbm__ditolak_id_sbm_foreign');
        });

        Schema::dropIfExists('sbm');
    }
}
