<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolygonalAnimalsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polygonalanimals', function(Blueprint $table)
        {
            $table->increments('num');
            $table->string('name');
            //polygonalanimals aura une colonne de type float nommée price
            $table->float('price');
            $table->string('color');
            $table->string('img');
            $table->string('link');
            //Une colonne de type unsigned ne peut sauvegarder que des nombres positives
            $table->integer('creator_id')->unsigned();
            //Il est indiqué ici que creator_id sera la clé étrangère permettant de relier les deux tables
            $table->foreign('creator_id')->references('id')->on('creators');
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
        Schema::drop('polygonalanimals');
    }
}