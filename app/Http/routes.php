<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('creators', 'CreatorController', ['except' => ['create', 'edit']]);
Route::resource('polygonalanimals', 'PolygonalAnimalController', ['only' => ['index']]);
Route::resource('creators.polygonalanimals', 'CreatorPolygonalAnimalsController', ['except' => ['edit', 'create']]);