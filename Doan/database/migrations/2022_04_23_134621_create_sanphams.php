<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->Increments('idsanpham');
            $table->string('motasanpham');
            $table->string('tensanpham');
            $table->integer('iddanhmuc');
            $table->integer('idthuonghieu');
            $table->string('giasanpham');
            $table->string('size');
            $table->string('dotuoi');
            $table->string('hinhsanpham');
            $table->integer('slsanpham');
            $table->integer('sldaban')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphams');
    }
}
