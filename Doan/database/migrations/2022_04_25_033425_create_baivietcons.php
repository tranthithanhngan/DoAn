<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaivietcons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baivietcons', function (Blueprint $table) {
            $table->Increments('baivietcon_id');
            $table->text('baivietcon_name');
            $table->text('baivietcon_sum')->nullable();
            $table->text('baivietcon_content')->nullable();
            $table->string('hinhbaivietcon');
            $table->integer('baiviet_id');
            
     
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
        Schema::dropIfExists('baivietcons');
    }
}
