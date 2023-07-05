<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistritosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ModelosController;
use App\Http\Controllers\MotosController;
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

Route::resource('distritos', DistritosController::class)->only(['index', 'show', 'update', 'store', 'destroy']);

Route::resource('marcas', MarcasController::class)->only(['index', 'show', 'update', 'store', 'destroy']);

Route::resource('modelos', ModelosController::class)->only(['index', 'show', 'update', 'store', 'destroy']);
Route::get('marcas/{id}/modelos', [ModelosController::class, 'modelosPorMarca']);

Route::resource('motos', MotosController::class)->only(['index', 'show', 'update', 'store', 'destroy']);
Route::get('motos/{placa}', [MotosController::class, 'verificarPlaca']);