<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
	protected $table = 'creators';
	protected $fillable = ['name', 'phone'];
	protected $hidden = ['id', 'updated_at', 'created_at'];
	
	//Un creator peut avoir plusieurs animaux
	public function polygonalanimals()
	{
		return $this->hasMany('App\PolygonalAnimal');
	}
}