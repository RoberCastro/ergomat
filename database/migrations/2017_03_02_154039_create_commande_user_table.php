<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeUserTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('commande_user', function (Blueprint $table) {

      $table->integer('commande_id')->unsigned();
      $table->foreign('commande_id')
      ->references('id')
      ->on('commandes')
      ->onDelete('cascade')
      ->onUpdate('cascade');

      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')
      ->references('id')
      ->on('users')
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
    Schema::table('commande_user', function (Blueprint $table) {
      $table->dropForeign(['commande_id']);
      $table->dropForeign(['user_id']);
    });
    Schema::drop('commande_user');
  }
}
