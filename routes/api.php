<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\Prestaciones\InsuredApiController;
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
    Route::get('/prestaciones/titulares', [InsuredApiController::class,'index']);
    // Route::get('api/prestaciones/titulares/create',[InsuredController::class, 'create']);
    // Route::post('api/prestaciones/titulares',[InsuredController::class, 'store']);
    // Route::get('api/prestaciones/titulares/{id}',[InsuredController::class, 'show']);
    // Route::get('api/prestaciones/titulares/{id}/edit', [InsuredController::class,'edit']);
    // Route::put('api/prestaciones/titulares/{id}', [InsuredController::class,'update']);
    // Route::get('api/prestaciones/titulares/{id}/disabled', [InsuredController::class,'disabled']);
    // Route::put('api/prestaciones/titulares/baja/{id}', [InsuredController::class,'baja']);
});
