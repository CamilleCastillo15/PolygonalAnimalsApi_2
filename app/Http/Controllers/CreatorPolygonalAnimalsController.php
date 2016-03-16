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
	public function store(CreateAnimalRequest $request, $creatorId)
	{
		$creator = Creator::find($creatorId);

		if(!$creator)
		{
			return response()->json(['message' => 'Ce creator n\'existe pas', 'code' => 404], 404);
		}

		$values = $request->all();

		$creator->polygonalanimals()->create($values);

		return response()->json(['message' => 'L\'animal associe a été crée'], 201);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
	public function update($id)
	{
		//
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
