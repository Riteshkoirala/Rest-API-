<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PartisionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/partisions', [PartisionController::class, 'index']);
//Route::post('/partisions', [PartisionController::class, 'store']);

Route::apiResource('/partisions', PartisionController::class);
Route::resource('/partisions', PartisionController::class)->only(['index', 'store']);
Route::resource('/authors', AuthorController::class)->only(['index', 'show']);
