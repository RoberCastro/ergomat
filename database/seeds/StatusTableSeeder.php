<?php

use Illuminate\Database\Seeder;
use App\Statu;


class StatusTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {

    Statu::create([
      'name' => 'Active',
    ]);


    Statu::create([
      'name' => 'Inactive',
    ]);


    Statu::create([
      'name' => 'Reparation',
    ]);


    Statu::create([
      'name' => 'Prêté',
    ]);

  }
}
