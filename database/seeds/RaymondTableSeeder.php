<?php

use Illuminate\Database\Seeder;

class RaymondTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	$faker = Faker\Factory::create();

    	$array_data = [];

    	for ($i=0; $i < 10; $i++) {
    		array_push($array_data, [
	    		'name' 		=> $faker->name,
	            'airline' 	=> $faker->company
	    	]);
		 
		}

        DB::table('raymond')->insert($array_data);
    }
}
