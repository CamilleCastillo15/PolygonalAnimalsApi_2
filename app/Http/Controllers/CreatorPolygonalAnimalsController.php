<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Creator;
use App\PolygonalAnimal;

use App\Http\Requests\CreateAnimalRequest;

class CreatorPolygonalAnimalsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(){

		$this->middleware('auth.basis.once', ['except' => ['index', 'show']]);

	}

	//Cette fonction retourne tous les animaux associé à un creator
	public function index($id)
	{
		$creator = Creator::find($id);

		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}
		return response()->json(['data' => $creator->polygonalanimals], 200);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	//Cette fonction permet de créer des animaux, il faut cependant spécifier en premier l'id de son Creator, car une entrée de la table polygonalanimals dépend de creators. 
	public function store(CreateAnimalRequest $request, $creatorId)
	{
		$creator = Creator::find($creatorId);

		//Si le creator identifié par son id n'existe pas, il ne sera pas possible de créer un animal
		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}

		$values = $request->all();

		//On se sert de la fonction polygonalanimals() du model de Creator pour créer un animal qui dépendera d'un creator
		$creator->polygonalanimals()->create($values);

		return response()->json(['message' => 'L\'animal associe a été crée'], 201);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//Cette fonction permet de renvoyer les données d'un animal spécifique associé à un creator
	public function show($id, $animalId)
	{
		$creator = Creator::find($id);

		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}

		$polygonalanimal = $creator->polygonalanimals->find($animalId);

		if(!$polygonalanimal)
		{
			return response()->json(['message' => 'Cet animal n\'existe pas pour ce creator', 'code' => 404], 404);
		}
		
		return response()->json(['data' => $polygonalanimal], 200);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	//Une fonction permettant de mettre à jour une entrée de la table polygonalanimals, qui doit possèder comme paramètres la requête, l'id du creator et celui d'un de ses animaux associés
	public function update(CreateAnimalRequest $request, $creatorId, $animalId)
	{
		$creator = Creator::find($creatorId);

		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}

		$animal = $creator->polygonalanimals->find($animalId);

		if(!$animal)
		{
			return response()->json(['message' => 'Cet animal n\'existe pas', 'code' => 404], 404);
		}
		$color = $request->get('color');
		$price = $request->get('price');

		$animal->color = $color;
		$animal->price = $price;

		$animal->save();

		return response()->json(['message' => 'L\'animal a été mis à jour'], 200);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($creatorId, $animalId)
	{
		$creator = Creator::find($creatorId);
		
		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}

		$animal = $creator->polygonalanimals->find($animalId);

		if(!$animal)
		{
			return response()->json(['message' => 'Cet animal n\'existe pas', 'code' => 404], 404);
		}

		$animal->delete();

		return response()->json(['message' => 'L\'animal a été supprimé'], 200);
	}
}
