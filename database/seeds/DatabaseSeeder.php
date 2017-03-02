<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $this->call(StatusTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(UsersTableSeeder::class);

    $this->call(ProductsTableSeeder::class);
    $this->call(LoansTableSeeder::class);
    $this->call(PatientsTableSeeder::class);
    
    $this->call(CommandesTableSeeder::class);
    $this->call(SalesTableSeeder::class);


  }
}
