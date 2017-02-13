<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_product', function (Blueprint $table) {

          $table->integer('loan_id')->unsigned();
          $table->foreign('loan_id')
          ->references('id')
          ->on('loans')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')
          ->references('id')
          ->on('products')
          ->onDelete('cascade')
          ->onUpdate('cascade'); 

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
        Schema::table('loan_product', function (Blueprint $table) {
            $table->dropForeign(['loan_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::drop('loan_product');
    }
}
