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

    	$array_data = [];

    	for ($i=0; $i < 10; $i++) {
    		array_push($array_data, [
	    		'name' 		=> str_random(10),
	            'airline' 	=> str_random(10)
	    	]);
		 
		}

        DB::table('raymond')->insert($array_data);
    }
}
