<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product_sale', function (Blueprint $table) {

        $table->integer('sale_id')->unsigned();
        $table->foreign('sale_id')
        ->references('id')
        ->on('sales')
        ->onDelete('cascade')
        ->onUpdate('cascade');

        $table->integer('product_id')->unsigned();
        $table->foreign('product_id')
        ->references('id')
        ->on('products')
        ->onDelete('cascade')
        ->onUpdate('cascade');

        $table->double('quantity_sale');

        $table->timestamps();    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_sale', function (Blueprint $table) {
          $table->dropForeign(['product_id']);
          $table->dropForeign(['sale_id']);
        });
        Schema::drop('product_sale');
      }
    }
}
