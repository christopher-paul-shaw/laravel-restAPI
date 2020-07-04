<?php

use Illuminate\Database\Seeder;

class ContractorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
		$contractor = new \App\Contractor();
		$contractor->name = "Person 1";
		$contractor->contactNumber = "0123456789";
		$contractor->save();

		$contractor = new \App\Contractor();
		$contractor->name = "Person 2";
		$contractor->contactNumber = "0123456789";
		$contractor->save();

		$contractor = new \App\Contractor();
		$contractor->name = "Person 3";
		$contractor->contactNumber = "0123456789";
		$contractor->save();

		$contractor = new \App\Contractor();
		$contractor->name = "Person 4";
		$contractor->contactNumber = "0123456789";
		$contractor->save();



    }
}
