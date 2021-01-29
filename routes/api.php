<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('categories', 'App\Http\Controllers\CategoriesController@getAll');
Route::get('categories/{id}', 'App\Http\Controllers\CategoriesController@getById');
Route::get('recipes', 'App\Http\Controllers\RecipesController@getAll');
Route::get('recipes/{id}', 'App\Http\Controllers\RecipesController@getById');
Route::post('categories', 'App\Http\Controllers\CategoriesController@save');
Route::post('recipes', 'App\Http\Controllers\RecipesController@save');
Route::delete('categories/{id}', 'App\Http\Controllers\CategoriesController@delete');
Route::delete('recipes/{id}', 'App\Http\Controllers\RecipesController@delete');
