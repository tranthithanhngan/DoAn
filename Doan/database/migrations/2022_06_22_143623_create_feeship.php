<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('feeship', function (Blueprint $table) {
            $table->bigIncrements('fee_id');
            $table->integer('fee_matp')->nullable();
            $table->integer('fee_maqh')->nullable();
            $table->integer('fee_xaid')->nullable();
            $table->text('fee_feeship')->nullable();
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
        Schema::dropIfExists('feeship');
    }
}
