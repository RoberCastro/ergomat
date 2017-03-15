<?php

use Illuminate\Database\Seeder;
use App\Stock;


class StocksTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    for ($i=0; $i < 9; $i++) {
      Stock::create([
        'quantity' => 10 + $i,
        'date_stock' => '2017-02-23',
        'available' => 3,
        'inactive' => 2,
        'loaned' => 1 + $i,
        'reparation' => 4,
        'ordered' => 1 + $i,

      ]);
    }

  }
}
