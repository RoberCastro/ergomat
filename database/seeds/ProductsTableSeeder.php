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
    			'name' => 'Ergo produit n '.$i, 
    			'description' => 'Ceci est la drescription du produit', 
    			'side' => 'Gauche',
    			'price' => 2500, 
    			'pro_date_status' => '25.02.2017',
    			]);
    	}

    	for ($i=0; $i < 3; $i++) { 
    		Product::create([
    			'name' => 'Ergo produit n '.$i, 
    			'description' => 'Ceci est la drescription du produit', 
    			'side' => 'Droite',
    			'price' => 250, 
    			'pro_date_status' => '25.02.2017',
    			]);
    	}    
    }
}
