
<?php
use Illuminate\Database\Seeder;
use App\Product;
class ProductsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    for ($i=0; $i < 3; $i++) {
      Product::create([
        'categorie_id' => 1,
        'statu_id' => 2,
        'name' => 'Ergo produit n '.$i,
        'description' => 'Ceci est la drescription du produit',
        'side' => 'Gauche',
        'price' => 2500,
        'pro_date_status' => '2017-02-25',
        'quantity' => 3 + $i,
      ]);
    }
    for ($i=0; $i < 3; $i++) {
      Product::create([
        'categorie_id' => 1,
        'statu_id' => 3,
        'name' => 'Ergo produit n '.$i,
        'description' => 'Ceci est la drescription du produit',
        'side' => 'Droite',
        'price' => 250,
        'pro_date_status' => '2017-02-25',
        'quantity' => 10 + $i,
      ]);
    }
  }
}
