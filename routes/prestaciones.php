<?php

use App\Http\Controllers\Prestaciones\AffiliateController;
use App\Http\Controllers\Prestaciones\AffiliateFamilyController;
use App\Http\Controllers\Prestaciones\DependencyController;
use App\Http\Controllers\Prestaciones\ServiceUserController;
use App\Http\Controllers\Prestaciones\SubdependencyController;
use App\Http\Controllers\Prestaciones\UserFamilyController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //Rutas de dependencias
    Route::get('prestaciones/dependencias',[DependencyController::class, 'index'])->name('prestaciones.dependencias.index');
    Route::get('prestaciones/dependencias/create',[DependencyController::class, 'create'])->name('prestaciones.dependencias.create');
    Route::post('prestaciones/dependencias',[DependencyController::class, 'store'])->name('prestaciones.dependencias.store');
    Route::get('prestaciones/dependencias/{id}',[DependencyController::class, 'show'])->name('prestaciones.dependencias.show');
    Route::get('prestaciones/dependencias/{id}/edit', [DependencyController::class,'edit'])->name('prestaciones.dependencias.edit');
    Route::put('prestaciones/dependencias/{id}', [DependencyController::class,'update'])->name('prestaciones.dependencias.update');
    Route::delete('prestaciones/dependencias/{id}', [DependencyController::class,'destroy'])->name('prestaciones.dependencias.destroy');
    //Rutas de subdependencias
    Route::get('prestaciones/subdependencias',[SubdependencyController::class, 'index'])->name('prestaciones.subdependencias.index');
    Route::get('prestaciones/subdependencias/create',[SubdependencyController::class, 'create'])->name('prestaciones.subdependencias.create');
    Route::post('prestaciones/subdependencias',[SubdependencyController::class, 'store'])->name('prestaciones.subdependencias.store');
    Route::get('prestaciones/subdependencias/{id}',[SubdependencyController::class, 'show'])->name('prestaciones.subdependencias.show');
    Route::get('prestaciones/subdependencias/{id}/edit', [SubdependencyController::class,'edit'])->name('prestaciones.subdependencias.edit');
    Route::put('prestaciones/subdependencias/{id}', [SubdependencyController::class,'update'])->name('prestaciones.subdependencias.update');
    Route::delete('prestaciones/subdependencias/{id}', [SubdependencyController::class,'destroy'])->name('prestaciones.subdependencias.destroy');
    //Rutas de titulares
    Route::get('prestaciones/titulares', [ServiceUserController::class,'index'])->name('prestaciones.titulares.index');
    Route::get('prestaciones/titulares/create',[ServiceUserController::class, 'create'])->name('prestaciones.titulares.create');
    Route::post('prestaciones/titulares',[ServiceUserController::class, 'store'])->name('prestaciones.titulares.store');
    Route::get('prestaciones/titulares/{id}',[ServiceUserController::class, 'show'])->name('prestaciones.titulares.show');
    Route::get('prestaciones/titulares/{id}/edit', [ServiceUserController::class,'edit'])->name('prestaciones.titulares.edit');
    Route::put('prestaciones/titulares/{id}', [ServiceUserController::class,'update'])->name('prestaciones.titulares.update');
    //Rutas de familiares
    Route::get('prestaciones/familiares',[UserFamilyController::class, 'index'])->name('prestaciones.familiares.index');
    Route::get('prestaciones/familiares/create',[UserFamilyController::class, 'create'])->name('prestaciones.familiares.create');
    Route::post('prestaciones/familiares',[UserFamilyController::class, 'store'])->name('prestaciones.familiares.store');
    Route::get('prestaciones/familiares/{id}',[UserFamilyController::class, 'show'])->name('prestaciones.familiares.show');
    Route::get('prestaciones/familiares/{id}/edit', [UserFamilyController::class,'edit'])->name('prestaciones.familiares.edit');
    Route::put('prestaciones/familiares/{id}', [UserFamilyController::class,'update'])->name('prestaciones.familiares.update');
    Route::delete('prestaciones/familiares/{id}', [UserFamilyController::class,'destroy'])->name('prestaciones.familiares.destroy');
});