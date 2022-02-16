<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKematianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan', ['Belum Menikah', 'Kawin', 'Duda', 'Janda']);
            $table->enum('status_kewarganegaraan', ['WNI', 'WNA']);
            $table->enum('agama', ['Islam','Kristen','Hindu','Budha','Konghuchu']);
            $table->enum('pekerjaan', ['PNS','Wiraswasta','Wirausaha','Buruh','Dokter', 'Bidan', 'TNI', 'Polisi', 'Petani', 'Karyawan Swasta', 'Karyawan Honorer', 'Karyawan BUMN', 'Karyawan BUMD', 'Anggota DPRD', 'Belum Bekerja','Pensiunan']);
            $table->unsignedBigInteger('prov_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('dis_id');
            $table->unsignedBigInteger('subdis_id');
            $table->unsignedBigInteger('id_rw');
            $table->string('rt');

            $table->string('lingkungan');
            $table->date('tanggal_meninggal');
            $table->string('disebabkan');
            $table->string('ditempat');
            $table->string('surat_diperlukan_untuk');

            $table->string('ktp_almarhum');
            $table->string('kk_almarhum');
            $table->string('surat_pengantar_dari_rs')->nullable();;
            $table->string('surat_pengantar_dari_rt');

            $table->string('sk_terakhir')->nullable();;
            $table->string('karip')->nullable();;
            $table->string('tabungan_pensiunan')->nullable();;

            $table->string('token');
            $table->unsignedBigInteger('id_users')->nullable();
            $table->enum('verifikasi', ['Terverifikasi', 'Belum Diverifikasi', 'Ditolak'])->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_buat_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::table('kematian_diterima', function (Blueprint $table) {
            $table->foreign('id_kematian')
            ->references('id')
            ->on('kematian')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('kematian_ditolak', function (Blueprint $table) {
            $table->foreign('id_kematian')
            ->references('id')
            ->on('kematian')
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
        Schema::table('kematian_diterima', function(Blueprint $table) {
            $table->dropforeign('kematian_diterima_id_kematian_foreign');
        });

        Schema::table('kematian_ditolak', function(Blueprint $table) {
            $table->dropforeign('kematian_ditolak_id_kematian_foreign');
        });

        Schema::dropIfExists('kematian');
    }
}
