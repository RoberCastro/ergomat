<?php

use Illuminate\Database\Seeder;
use App\Commande;


class CommandesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    for ($i=0; $i < 3; $i++) {
      Commande::create([

        'price' => 2500 + $i*10,
        'date_commande' => '25.02.2017',
      ]);
    }

    for ($i=0; $i < 3; $i++) {
      Commande::create([

        'price' => 1000 + $i*10,
        'date_commande' => '20.02.2013',
      ]);
    }
  }
}
