<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDistricts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('dis_id');
            $table->string('dis_name');
            $table->unsignedBigInteger('city_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('geometry')->nullable();
            $table->timestamps();
        });

        Schema::table('subdistricts', function (Blueprint $table) {
            $table->foreign('dis_id')
            ->references('dis_id')
            ->on('districts')
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
        Schema::table('subdistricts', function(Blueprint $table) {
            $table->dropforeign('subdistricts_dis_id_foreign');
        });
        
        Schema::dropIfExists('districts');
    }
}
