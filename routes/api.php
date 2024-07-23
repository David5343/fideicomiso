<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\Humanos\BankApiController;
use App\Http\Controllers\Api\Humanos\CountyApiController;
use App\Http\Controllers\Api\Humanos\StateApiController;
use App\Http\Controllers\Api\Prestaciones\CategoryApiController;
use App\Http\Controllers\Api\Prestaciones\InsuredApiController;
use App\Http\Controllers\Api\Prestaciones\SubdependencyApiController;
use Illuminate\Http\Request;
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
//ruta para el login
Route::post('/login',[ApiController::class,'login']);
Route::get('/users', [ApiController::class,'index']);

Route::middleware('auth:sanctum')->group(function () {
    
Route::get('/users', [ApiController::class,'index']);
//Rutas de titulares
Route::get('/prestaciones/titulares/idgenerator',[InsuredApiController::class, 'idgenerator']);
Route::get('/prestaciones/titulares',[InsuredApiController::class, 'index']);
Route::post('/prestaciones/titulares/guardar',[InsuredApiController::class, 'store']);
Route::get('/prestaciones/titulares/{id}',[InsuredApiController::class,'show']);
//Route::delete('/prestaciones/titulares/{id}', [InsuredApiController::class,'destroy']);
Route::get('/prestaciones/titulares/busqueda/{dato}',[InsuredApiController::class, 'busqueda']);
Route::get('/prestaciones/titulares/editar/{dato}',[InsuredApiController::class, 'editar']);
Route::post('/prestaciones/titulares/update', [InsuredApiController::class,'update']);
//Rutas de subdependencias
Route::get('/prestaciones/subdependencias/listar',[SubdependencyApiController::class, 'listar']);
//Rutas de categorias
Route::get('/prestaciones/categorias/listar',[CategoryApiController::class, 'listar']);
//Rutas de municipios
Route::get('/humanos/municipios/listar',[CountyApiController::class, 'listar']);
//Rutas de estados
Route::get('/humanos/estados/listar',[StateApiController::class, 'listar']);
//Rutas de bancos
Route::get('/humanos/bancos/listar',[BankApiController::class, 'listar']);
});
