<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\CategoriesController@all');
Route::get('/{category}', 'App\Http\Controllers\CategoriesController@view');
Route::get('/{category}/{recipe}', 'App\Http\Controllers\RecipesController@view');
Route::post('/add-recipe', 'App\Http\Controllers\RecipesController@create');
Route::post('/add-category', 'App\Http\Controllers\CategoriesController@create');
