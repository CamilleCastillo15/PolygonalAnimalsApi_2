<?php

//Php artisan permet de générer des migrations qui vont définir le modèle des tables à créer

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatorsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //La table sera crée suivant le modèle de creators
        Schema::create('creators', function(Blueprint $table)
        {
            //Elle va incrémenter l'id automatiquement à chaque nouvelle entrée crée
            $table->increments('id');
            //Elle aura une colonne de type string nommée name 
            $table->string('name');
            //Une de  type entier nommée phone
            $table->integer('phone');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('creators');
    }
}