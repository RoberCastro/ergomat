<?php

use Illuminate\Database\Seeder;
use App\Sale;


class SalesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    for ($i=0; $i < 3; $i++) {
      Sale::create([
        'patient_id' => 1,
        'price' => 2500 + $i*10,
        'created_by' => 'admin@gmail.com',
        'modified_by' => 'basic@gmail.com',
        'date_sale' => '25.02.2017',
      ]);
    }

    for ($i=0; $i < 3; $i++) {

      Sale::create([
        'patient_id' => 2 + $i,
        'price' => 2500 + $i*10,
        'created_by' => 'admin@gmail.com',
        'modified_by' => 'basic@gmail.com',
        'date_sale' => '25.10.2014',
      ]);
    }
  }
}
