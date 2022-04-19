<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiamgias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giamgias', function (Blueprint $table) {
            $table->bigIncrements('coupon_id');
            $table->string('coupon_name');
             $table->integer('coupon_time');
              $table->string('coupon_condition');
               $table->string('coupon_code');
                $table->integer('coupon_number');
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
        Schema::dropIfExists('giamgias');
    }
}
