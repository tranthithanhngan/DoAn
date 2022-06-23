<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuongxathitrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuongxathitrans', function (Blueprint $table) {
            $table->bigIncrements('xaid');
            $table->text('name')->nullable();
            $table->text('type')->nullable();
            $table->integer('maqh')->nullable();
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
        Schema::dropIfExists('phuongxathitrans');
    }
}
