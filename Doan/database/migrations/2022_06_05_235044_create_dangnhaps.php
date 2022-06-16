<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangnhaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangnhaps', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('provider_user_id')->nullable();
            $table->string('provider_user_email')->nullable();
            $table->string('provider')->nullable();
            $table->integer('user')->nullable();
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
        Schema::dropIfExists('dangnhaps');
    }
}
