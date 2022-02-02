<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProvinces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('prov_id');
            $table->string('prov_name');
            $table->string('locationid');
            $table->string('status');
            $table->timestamps();
        });

       
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('surat_sku', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('prov_id')
            ->references('prov_id')
            ->on('provinces')
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
      
        Schema::table('cities', function(Blueprint $table) {
            $table->dropforeign('cities_prov_id_foreign');
        });

        Schema::table('surat_sku', function(Blueprint $table) {
            $table->dropforeign('surat_sku_prov_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropforeign('users_prov_id_foreign');
        });


        Schema::dropIfExists('provinces');
    }
}
