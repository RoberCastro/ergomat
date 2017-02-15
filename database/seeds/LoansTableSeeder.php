<?php

use Illuminate\Database\Seeder;
use App\Loan;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 2; $i++) { 
    		Loan::create([
    			'date_start' => '25.02.2017',
    			'date_end' => '25.11.2017',
    			]);
    	}

        for ($i=0; $i < 2; $i++) { 
    		Loan::create([
    			'date_start' => '25.02.2017',
    			'date_end' => '25.01.2020',
    			]);
    	} 
    }
}
