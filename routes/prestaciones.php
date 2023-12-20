<?php

use App\Http\Controllers\Prestaciones\DependencyController;
use App\Http\Controllers\Prestaciones\SubdependencyController;
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
});