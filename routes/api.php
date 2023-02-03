<?php

use App\Http\Controllers\api\Usercontroller;
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

Route::post("/register", [Usercontroller::class, 'register']);
Route::post("/login", [Usercontroller::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get("/listUser", [Usercontroller::class, 'listUser']);
    Route::delete("/destroy{id}", [Usercontroller::class,'delete']);
    Route::get("/logout", [Usercontroller::class,'logout']);
    Route::get("/pizzas", [pizzaController::class,'index']);
});
