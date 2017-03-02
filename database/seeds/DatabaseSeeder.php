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
    $this->call(PatientsTableSeeder::class);
    $this->call(LoansTableSeeder::class);

    $this->call(CommandesTableSeeder::class);
    $this->call(SalesTableSeeder::class);

    //Get array of ids
    $loanIds      = DB::table('loans')->pluck('id');
    $productIds      = DB::table('products')->pluck('id');
    $commandeIds      = DB::table('commandes')->pluck('id');
    $userIds      = DB::table('users')->pluck('id');

    //Seed user_role table with 20 entries
    foreach ((range(0, 3)) as $index)
    {
      DB::table('loan_product')->insert(
        [
          'loan_id' => $loanIds[$index],
          'product_id' => $productIds[$index]
        ]
      );
    }

    foreach ((range(0, 3)) as $index)
    {
      DB::table('commande_user')->insert(
        [
          'commande_id' => $loanIds[$index],
          'user_id' => $commandeIds[$index]
        ]
      );
    }

    foreach ((range(0, 3)) as $index)
    {
      DB::table('commande_product')->insert(
        [
          'commande_id' => $commandeIds[$index],
          'product_id' => $productIds[$index]
        ]
      );
    }




  }
}
