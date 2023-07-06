<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\SubcategoriasController;
use App\Http\Controllers\TipoDeApartadosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route:: get('/Categorias', [CategoriasController::class,'obtener_todos']);

Route:: get('Subcategorias', [SubcategoriasController::class,'obtener_todos']);
//Route:: get('Subcategorias/{idGuid}', [SubcategoriasController::class,'obtener']);
Route:: post('Subcategorias',[SubcategoriasController::class,'agregar']);

Route:: get('/TipoDeApartados',[TipoDeApartadosController::class, 'obtener_todos']);
Route:: post('/TipoDeApartados', [TipoDeApartadosController::class, 'agregar']);

Route::post('/Periodos',[PeriodosController::class,'agregar']);

Route::post('Gastos',[GastosController::class,'agregar']);