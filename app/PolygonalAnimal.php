<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PolygonalAnimal extends Model

{
	//Nom de la table
	protected $table = 'polygonalanimals';

	//Et de sa clé primaire si elle n'est pas égale à id
	protected $primaryKey = 'num';

	//Les éléments remplissables
	protected $fillable = ['name', 'price', 'color', 'img','link', 'creator_id'];
	
	//Et ceux cachés
	protected $hidden = ['num', 'created_at', 'updated_at', 'creator_id'];

	//Indication que la table dépend de Creator
	public function creator()
	{
		return $this->belongsTo('App\Creator');
	}
	
}