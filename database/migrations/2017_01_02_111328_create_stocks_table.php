<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('stocks', function (Blueprint $table) {
      $table->increments('id');
      $table->double('quantity')->nullable();
      $table->date('date_stock')->nullable();
      $table->double('available')->nullable();
      $table->double('inactive')->nullable();
      $table->double('loaned')->nullable();
      $table->double('reparation')->nullable();
      $table->double('ordered')->nullable();
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
    Schema::drop('stocks');
  }
}
