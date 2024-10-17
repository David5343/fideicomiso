<?php

use App\Http\Controllers\Prestaciones\BeneficiaryController;
use App\Http\Controllers\Prestaciones\CategoriesController;
use App\Http\Controllers\Prestaciones\DependencyController;
use App\Http\Controllers\Prestaciones\InsuredController;
use App\Http\Controllers\Prestaciones\SubdependencyController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //Rutas de dependencias
    Route::get('prestaciones/dependencias', [DependencyController::class, 'index'])->name('prestaciones.dependencias.index');
    Route::get('prestaciones/dependencias/create', [DependencyController::class, 'create'])->name('prestaciones.dependencias.create');
    Route::post('prestaciones/dependencias', [DependencyController::class, 'store'])->name('prestaciones.dependencias.store');
    Route::get('prestaciones/dependencias/{id}', [DependencyController::class, 'show'])->name('prestaciones.dependencias.show');
    Route::get('prestaciones/dependencias/{id}/edit', [DependencyController::class, 'edit'])->name('prestaciones.dependencias.edit');
    Route::put('prestaciones/dependencias/{id}', [DependencyController::class, 'update'])->name('prestaciones.dependencias.update');
    Route::delete('prestaciones/dependencias/{id}', [DependencyController::class, 'destroy'])->name('prestaciones.dependencias.destroy');
    //Rutas de subdependencias
    Route::get('prestaciones/subdependencias', [SubdependencyController::class, 'index'])->name('prestaciones.subdependencias.index');
    Route::get('prestaciones/subdependencias/create', [SubdependencyController::class, 'create'])->name('prestaciones.subdependencias.create');
    Route::post('prestaciones/subdependencias', [SubdependencyController::class, 'store'])->name('prestaciones.subdependencias.store');
    Route::get('prestaciones/subdependencias/{id}', [SubdependencyController::class, 'show'])->name('prestaciones.subdependencias.show');
    Route::get('prestaciones/subdependencias/{id}/edit', [SubdependencyController::class, 'edit'])->name('prestaciones.subdependencias.edit');
    Route::put('prestaciones/subdependencias/{id}', [SubdependencyController::class, 'update'])->name('prestaciones.subdependencias.update');
    Route::delete('prestaciones/subdependencias/{id}', [SubdependencyController::class, 'destroy'])->name('prestaciones.subdependencias.destroy');
    //Rutas de titulares
    Route::get('prestaciones/titulares', [InsuredController::class, 'index'])->name('prestaciones.titulares.index');
    Route::get('prestaciones/titulares/create', [InsuredController::class, 'create'])->name('prestaciones.titulares.create');
    Route::post('prestaciones/titulares', [InsuredController::class, 'store'])->name('prestaciones.titulares.store');
    Route::get('prestaciones/titulares/{id}', [InsuredController::class, 'show'])->name('prestaciones.titulares.show');
    Route::get('prestaciones/titulares/{id}/edit', [InsuredController::class, 'edit'])->name('prestaciones.titulares.edit');
    Route::put('prestaciones/titulares/{id}', [InsuredController::class, 'update'])->name('prestaciones.titulares.update');
    Route::get('prestaciones/titulares/{id}/disabled', [InsuredController::class, 'disabled'])->name('prestaciones.titulares.disabled');
    Route::put('prestaciones/titulares/baja/{id}', [InsuredController::class, 'baja'])->name('prestaciones.titulares.baja');
    //Rutas de familiares
    Route::get('prestaciones/familiares', [BeneficiaryController::class, 'index'])->name('prestaciones.familiares.index');
    Route::get('prestaciones/familiares/create', [BeneficiaryController::class, 'create'])->name('prestaciones.familiares.create');
    Route::post('prestaciones/familiares', [BeneficiaryController::class, 'store'])->name('prestaciones.familiares.store');
    Route::get('prestaciones/familiares/{id}', [BeneficiaryController::class, 'show'])->name('prestaciones.familiares.show');
    Route::get('prestaciones/familiares/{id}/edit', [BeneficiaryController::class, 'edit'])->name('prestaciones.familiares.edit');
    Route::put('prestaciones/familiares/{id}', [BeneficiaryController::class, 'update'])->name('prestaciones.familiares.update');
    Route::delete('prestaciones/familiares/{id}', [BeneficiaryController::class, 'destroy'])->name('prestaciones.familiares.destroy');
    Route::get('prestaciones/familiares/{id}/disabled', [BeneficiaryController::class, 'disabled'])->name('prestaciones.familiares.disabled');
    Route::put('prestaciones/familiares/baja/{id}', [BeneficiaryController::class, 'baja'])->name('prestaciones.familiares.baja');
    //Rutas para Categoria Policial
    Route::get('prestaciones/categorias', [CategoriesController::class, 'index'])->name('prestaciones.categorias.index');
    Route::get('prestaciones/categorias/{id}/edit', [CategoriesController::class, 'edit'])->name('prestaciones.categorias.edit');
    Route::put('prestaciones/categorias/{id}', [CategoriesController::class, 'update'])->name('prestaciones.categorias.update');
});
