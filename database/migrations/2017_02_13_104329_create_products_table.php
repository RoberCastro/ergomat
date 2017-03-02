<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')
            ->references('id')
            ->on('categories')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->integer('statu_id')->unsigned();
            $table->foreign('statu_id')
            ->references('id')
            ->on('status')
            ->onDelete('restrict')
            ->onUpdate('restrict');


            $table->string('name');
            $table->text('description');
            $table->string('side');
            $table->double('price');
            $table->date('pro_date_status');
            $table->double('quantity');
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
         Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['categorie_id']);
            $table->dropForeign(['statu_id']);
         });
        Schema::drop('products');
    }
}
