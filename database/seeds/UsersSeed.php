<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Creator;
use App\User;

//Cette classe sera lancée quand la  commande php artisan db:seed sera entrée dans le terminal
class UsersSeed extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([

				'email' => 'fake@fake.com',
				'password' => Hash::make('pass')

			]);
	}
}