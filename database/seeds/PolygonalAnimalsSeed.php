<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\PolygonalAnimal;

use Faker\Factory as Faker;

class PolygonalAnimalsSeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		$faker = Faker::create();
		for($i = 0; $i < 30; $i++)
		{
			PolygonalAnimal::create
			([
				//Faker peut aussi générer des couleurs
				'color' => $faker->safeColorName(),
				'price' => $faker->randomFloat(),
				'creator_id' => $faker->numberBetween(1,5)
			]);
		}
	}
}