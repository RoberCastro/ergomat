<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('loan_patient', function (Blueprint $table) {

        $table->integer('loan_id')->unsigned();
        $table->foreign('loan_id')
        ->references('id')
        ->on('loans')
        ->onDelete('cascade')
        ->onUpdate('cascade');

        $table->integer('patient_id')->unsigned();
        $table->foreign('patient_id')
        ->references('id')
        ->on('patients')
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
      Schema::table('loan_patient', function (Blueprint $table) {
          $table->dropForeign(['loan_id']);
          $table->dropForeign(['patient_id']);
      });
      Schema::drop('loan_patient');
  }
}
