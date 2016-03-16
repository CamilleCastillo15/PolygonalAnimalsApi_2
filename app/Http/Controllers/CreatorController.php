<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Creator;

use App\Http\Requests\CreateCreatorRequest;

class CreatorController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	//Cette fonction renvoie toutes les données de la table creators
	public function index()
	{
		$creators = Creator::all();

		//La réponse est encapsulée dans un JSON si elle marche sinon le code d'erreur 200 est renvoyé
		return response()->json(['data' => $creators], 200);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	//Cette fonction permet de créer des Creators
	public function store(CreateCreatorRequest $request)
	{
		$values = $request->only(['name', 'phone']);

		Creator::create($values);

		return response()->json(['message' => 'Creator ajoute'], 201);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//Cette fonction permet de renvoyer les données spécifiques à un Creator
	public function show($id)
	{
		$creator = Creator::find($id);
		
		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}
		return response()->json(['data' => $creator], 200);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	//Implémentation de la fonction update qui permet de mettre à jour des entrées de la table creators
	public function update(CreateCreatorRequest $request, $id)
	{
		//Le variable creator définit le creator identifié par l'id entré dans l'URL
		$creator = Creator::find($id);
		
		//S'il n'est pas trouvé alors un message d'erreur 404 est renvoyé
		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}

		//Les variables name et phone représentent les valeurs de la requête et sont aussi insérées dans l'URL
		$name = $request->get('name');
		$phone = $request->get('phone');

		//Le nouveau name et phone du creator correspondront donc à ces variables
		$creator->name = $name;
		$creator->phone = $phone;

		//Son nouvel état est sauvegardé
		$creator->save();

		//Un message 200 qui signifie que la requête a fonctionné est renvoyé
		return response()->json(['message' => 'Le creator a été mis à jour'], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}