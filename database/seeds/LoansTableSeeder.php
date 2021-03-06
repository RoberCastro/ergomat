<?php

use Illuminate\Database\Seeder;
use App\Loan;
use Carbon\Carbon;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::create(1975, 12, 25, 14, 15, 16, 'Europe/Zurich');
        $dttt = Carbon::create(2017, 12, 30, 14, 25, 45, 'Europe/Zurich');


        for ($i=0; $i < 2; $i++) {
    		Loan::create([
          'patient_id' => 1,
    			'date_start' => $dt->toDateString(),
    			'date_end' => $dttt->toDateString(),
          'created_by' => 'admin@gmail.com',
          'modified_by' => 'admin@gmail.com',
    			]);
    	}

        for ($i=0; $i < 2; $i++) {
    		Loan::create([
          'patient_id' => 2,
    			'date_start' => $dt->toDateString(),
    			'date_end' => $dttt->toDateString(),
          'created_by' => 'basic@gmail.com',
          'modified_by' => 'basic@gmail.com',

    			]);
    	}
    }
}
