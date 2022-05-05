<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhluans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluans', function (Blueprint $table) {
            $table->Increments('binhluan_id');
            $table->text('binhluan');
            $table->text('binhluan_name')->nullable();
            $table->text('binhluan_chitiet')->nullable();
            $table->integer('idsanpham')->nullable();
            $table->integer('binhluan_status')->nullable();
            $table->text('binhluan_traloi')->nullable();
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
        Schema::dropIfExists('binhluans');
    }
}
