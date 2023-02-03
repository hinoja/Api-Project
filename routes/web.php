<?php

use App\Http\Controllers\CheckMailController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\pizzaController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/pokemons', [pokemonController::class, 'index'])->name('pokemon');
});
Route::get('/pizzas', [pizzaController::class, 'index'])->name('pizza');
Route::get('/movies', [MovieController::class, 'search'])->name('movies');
Route::view('/search', 'search');
 
