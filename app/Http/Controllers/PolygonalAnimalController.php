<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\PolygonalAnimal;

class PolygonalAnimalController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$polygonalanimals = PolygonalAnimal::all();

		return response()->json(['data' => $polygonalanimals], 200);
	}
}