<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhangs', function (Blueprint $table) {
            $table->bigIncrements('order_details_id');
            $table->integer('order_id');
             $table->integer('idsanpham');
              $table->string('tensanpham');
               $table->float('giasanpham');
                $table->integer('product_sales_quantity');
                $table->string('product_coupon');
                $table->string('product_feeship');
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
        Schema::dropIfExists('chitietdonhangs');
    }
}
