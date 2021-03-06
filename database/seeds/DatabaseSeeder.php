<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Creator;
use App\User;

//Cette classe sera lancée quand la  commande php artisan db:seed sera entrée dans le terminal
class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		Creator::truncate();
		User::truncate();

		Model::unguard();

		//Deux autres classes vont être appelées
		$this->call('CreatorSeed');
		$this->call('PolygonalAnimalsSeed');
		$this->call('UsersSeed');
	}
}