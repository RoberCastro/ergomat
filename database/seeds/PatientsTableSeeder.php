<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 3; $i++) {
        Patient::create([

          'user_id' => 1,
          'reference' => 40000+$i,

          ]);
      }

      for ($i=0; $i < 3; $i++) {
        Patient::create([

          'user_id' => 2,
          'reference' => 50000+$i,

          ]);
      }
    }
}
