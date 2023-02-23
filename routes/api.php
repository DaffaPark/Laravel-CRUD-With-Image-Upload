<?php

use App\Http\Controllers\Api\ApiProdukController;
use App\Http\Controllers\Api\UserController;
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
Route::get('/apiProduk', [ApiProdukController::class, 'index']);
Route::get('/detailProduk/{id}', [ApiProdukController::class, 'show']);
Route::post('/createProduk', [ApiProdukController::class, 'store']);
Route::put('/updateProduk/{id}', [ApiProdukController::class, 'update']);
Route::delete('/deleteProduk/{id}', [ApiProdukController::class, 'destroy']);

Route::get('/dataUser', [UserController::class, 'index']);
Route::get('/totalUser', [UserController::class, 'count']);