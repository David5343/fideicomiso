<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Prestaciones\InsuredController;

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
Route::get('api/prestaciones/titulares', [InsuredController::class,'index']);
Route::middleware('auth:sanctum')->group(function () {
    //Rutas de titulares
    Route::get('api/prestaciones/titulares', [InsuredController::class,'index']);
    Route::get('api/prestaciones/titulares/create',[InsuredController::class, 'create']);
    Route::post('api/prestaciones/titulares',[InsuredController::class, 'store']);
    Route::get('api/prestaciones/titulares/{id}',[InsuredController::class, 'show']);
    Route::get('api/prestaciones/titulares/{id}/edit', [InsuredController::class,'edit']);
    Route::put('api/prestaciones/titulares/{id}', [InsuredController::class,'update']);
    Route::get('api/prestaciones/titulares/{id}/disabled', [InsuredController::class,'disabled']);
    Route::put('api/prestaciones/titulares/baja/{id}', [InsuredController::class,'baja']);
});
