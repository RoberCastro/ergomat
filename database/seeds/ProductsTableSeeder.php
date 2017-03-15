
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
    for ($i=0; $i < 2; $i++) {
      Product::create([
        'categorie_id' => 1,
        'stock_id' => 1+$i,
        'name' => 'Chaise roulante'.($i+$i),
        'description' => 'Ceci est la drescription du produit',
        'side' => 'Gauche',
        'price' => 2500,

      ]);
    }
    for ($i=0; $i < 2; $i++) {
      Product::create([
        'categorie_id' => 2,
        'stock_id' => 3+$i,
        'name' => 'Lit Model '.$i.'lDC',
        'description' => 'Ceci est la drescription du produit',
        'side' => 'Droite',
        'price' => 250,

      ]);
    }
    for ($i=0; $i < 2; $i++) {
      Product::create([
        'categorie_id' => 1,
        'stock_id' => 5+$i,
        'name' => 'Eponge chaise roulate '.$i.'xgV',
        'description' => 'Ceci est la drescription du produit',
        'side' => 'Droite',
        'price' => 250,
      ]);
    }
    for ($i=0; $i < 2; $i++) {
      Product::create([
        'categorie_id' => 1,
        'stock_id' => 7+$i,
        'name' => 'Attelle uhn'.$i.' poignet',
        'description' => 'Ceci est la drescription du produit',
        'side' => 'Droite',
        'price' => 250,

      ]);
    }
  }
}
