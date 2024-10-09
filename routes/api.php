<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\Humanos\BankApiController;
use App\Http\Controllers\Api\Humanos\CountyApiController;
use App\Http\Controllers\Api\Humanos\StateApiController;
use App\Http\Controllers\Api\Prestaciones\CategoryApiController;
use App\Http\Controllers\Api\Prestaciones\InsuredApiController;
use App\Http\Controllers\Api\Prestaciones\SubdependencyApiController;
use App\Http\Controllers\Api\Prestaciones\BeneficiaryApiController;
use App\Http\Controllers\Api\Prestaciones\CredentialBeneficiaryApiController;
use App\Http\Controllers\Api\Prestaciones\CredentialInsuredApiController;
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
Route::get('/prestaciones/titulares/porfolio/{dato}',[InsuredApiController::class, 'porfolio']);
Route::get('/prestaciones/titulares/porrfc/{dato}',[InsuredApiController::class, 'porrfc']);
Route::get('/prestaciones/titulares/porcurp/{dato}',[InsuredApiController::class, 'porcurp']);
Route::put('/prestaciones/titulares/update/{id}', [InsuredApiController::class,'update']);
Route::put('/prestaciones/titulares/baja/{id}', [InsuredApiController::class,'baja']);
Route::put('/prestaciones/titulares/guardarfoto/{id}', [InsuredApiController::class,'guardarfoto']);
Route::put('/prestaciones/titulares/guardarfirma/{id}', [InsuredApiController::class,'guardarfirma']);
//Rutas de familiares
Route::get('/prestaciones/familiares/idgenerator',[BeneficiaryApiController::class, 'idgenerator']);
Route::get('/prestaciones/familiares',[BeneficiaryApiController::class, 'index']);
Route::post('/prestaciones/familiares/guardar',[BeneficiaryApiController::class, 'store']);
Route::get('/prestaciones/familiares/{id}',[BeneficiaryApiController::class,'show']);
Route::get('/prestaciones/familiares/busqueda/{dato}',[BeneficiaryApiController::class, 'busqueda']);
Route::get('/prestaciones/familiares/porfolio/{dato}',[BeneficiaryApiController::class, 'porfolio']);
Route::get('/prestaciones/familiares/porrfc/{dato}',[BeneficiaryApiController::class, 'porrfc']);
Route::get('/prestaciones/familiares/porcurp/{dato}',[BeneficiaryApiController::class, 'porcurp']);
Route::put('/prestaciones/familiares/guardarfoto/{id}', [BeneficiaryApiController::class,'guardarfoto']);
Route::put('/prestaciones/familiares/baja/{id}', [BeneficiaryApiController::class,'baja']);
Route::put('/prestaciones/familiares/update/{id}', [BeneficiaryApiController::class,'update']);
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
Route::get('/prestaciones/credencialtitular',[CredentialInsuredApiController::class, 'index']);
Route::post('/prestaciones/credencialtitular/guardar',[CredentialInsuredApiController::class, 'store']);
Route::get('/prestaciones/credencialtitular/{id}',[CredentialInsuredApiController::class,'show']);
Route::post('/prestaciones/credencialfamiliar/guardar',[CredentialBeneficiaryApiController::class, 'store']);
Route::get('/prestaciones/credencialfamiliar/{id}',[CredentialBeneficiaryApiController::class,'show']);
});
