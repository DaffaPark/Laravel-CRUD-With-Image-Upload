<?php

use App\Http\Controllers\Api\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/produk',[ProdukController::class, 'index']);
Route::get('/create',[ProdukController::class, 'create']);
Route::post('/store',[ProdukController::class, 'store']);
Route::get('/edit/{id}',[ProdukController::class, 'edit']);
Route::post('/update/{id}',[ProdukController::class, 'update']);
Route::get('/hapus/{id}',[ProdukController::class, 'destroy']);
