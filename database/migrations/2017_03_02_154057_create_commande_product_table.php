<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeProductTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('commande_product', function (Blueprint $table) {

      $table->integer('commande_id')->unsigned();
      $table->foreign('commande_id')
      ->references('id')
      ->on('commandes')
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
    Schema::table('commande_product', function (Blueprint $table) {
      $table->dropForeign(['commande_id']);
      $table->dropForeign(['product_id']);
    });
    Schema::drop('commande_product');
  }
}
