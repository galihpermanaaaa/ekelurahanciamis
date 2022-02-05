<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('role_name')->nullable();
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('prov_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('dis_id');
            $table->unsignedBigInteger('subdis_id');
            $table->unsignedBigInteger('id_rw');
            $table->string('rt');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('surat_sku', function (Blueprint $table) {
            $table->foreign('id_users')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_tdk_mampu', function (Blueprint $table) {
            $table->foreign('id_users')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_domisili', function (Blueprint $table) {
            $table->foreign('id_users')
            ->references('id')
            ->on('users')
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
        Schema::table('surat_sku', function(Blueprint $table) {
            $table->dropforeign('surat_sku_id_users_foreign');
        });

        Schema::table('surat_tdk_mampu', function(Blueprint $table) {
            $table->dropforeign('surat_tdk_mampu_id_users_foreign');
        });

        Schema::table('surat_domisili', function(Blueprint $table) {
            $table->dropforeign('surat_domisili_id_users_foreign');
        });

        
        Schema::dropIfExists('users');
    }
}
