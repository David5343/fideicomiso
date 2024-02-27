<?php

use App\Http\Controllers\Api\Prestaciones\InsuredController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    //Rutas de titulares
    Route::get('api/prestaciones/titulares', [InsuredController::class,'index'])->name('prestaciones.titulares.index');
    Route::get('api/prestaciones/titulares/create',[InsuredController::class, 'create'])->name('prestaciones.titulares.create');
    Route::post('api/prestaciones/titulares',[InsuredController::class, 'store'])->name('prestaciones.titulares.store');
    Route::get('api/prestaciones/titulares/{id}',[InsuredController::class, 'show'])->name('prestaciones.titulares.show');
    Route::get('api/prestaciones/titulares/{id}/edit', [InsuredController::class,'edit'])->name('prestaciones.titulares.edit');
    Route::put('api/prestaciones/titulares/{id}', [InsuredController::class,'update'])->name('prestaciones.titulares.update');
    Route::get('api/prestaciones/titulares/{id}/disabled', [InsuredController::class,'disabled'])->name('prestaciones.titulares.disabled');
    Route::put('api/prestaciones/titulares/baja/{id}', [InsuredController::class,'baja'])->name('prestaciones.titulares.baja');