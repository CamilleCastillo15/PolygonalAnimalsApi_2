<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Creator;

use Faker\Factory as Faker;

class CreatorSeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{

		//Le fager développé par fzaninotto a été installé grâce à composer et intégré au projet
		$faker = Faker::create();
		
		//6 entrées vont être crées dans la table Creator
		for($i = 0; $i < 6; $i++)
		{
			Creator::create
			([
				//Faker peut générer des mots ou des entiers situés dans un interval que l'on peut indiquer
				'name' => $faker->word(),
				'phone' => $faker->randomDigit(5)
			]);
		}
	}
}