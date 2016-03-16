<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Creator;

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
		Model::unguard();
		$this->call('CreatorSeed');
		$this->call('PolygonalAnimalsSeed');
	}
}