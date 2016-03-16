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
	public function index()
	{
		$creators = Creator::all();

		return response()->json(['data' => $creators], 200);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
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