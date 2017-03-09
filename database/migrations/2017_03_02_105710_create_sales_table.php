<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('sales', function (Blueprint $table) {
      $table->increments('id');

      $table->integer('patient_id')->unsigned();
      $table->foreign('patient_id')
      ->references('id')
      ->on('patients')
      ->onDelete('restrict')
      ->onUpdate('restrict');

      $table->double('price')->default(0.00)->nullable();
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
    Schema::drop('sales');
  }
}
