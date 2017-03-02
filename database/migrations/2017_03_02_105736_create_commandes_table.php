<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {

    Schema::create('commandes', function (Blueprint $table) {
      $table->increments('id');
      $table->double('price');
      $table->date('date_sale')->nullable();
      $table->string('created_by')->nullable();
      $table->string('modified_by')->nullable();
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
    Schema::drop('commandes');
  }
}