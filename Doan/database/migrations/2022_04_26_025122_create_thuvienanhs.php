<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuvienanhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuvienanhs', function (Blueprint $table) {
            $table->Increments('thuvienanh_id');
            $table->text('thuvienanh_name');
            $table->string('idsanpham')->nullable();
            $table->string('hinhanh')->nullable();
           
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
        Schema::dropIfExists('thuvienanhs');
    }
}
