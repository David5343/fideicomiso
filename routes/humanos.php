<?php

use App\Http\Controllers\Humanos\AreaController;
use App\Http\Controllers\Humanos\BankController;
use App\Http\Controllers\Humanos\CategoryController;
use App\Http\Controllers\Humanos\CountyController;
use App\Http\Controllers\Humanos\EmployeeController;
use App\Http\Controllers\Humanos\EmployeeFamilyController;
use App\Http\Controllers\Humanos\NavbarController;
use App\Http\Controllers\Humanos\PlaceController;
use App\Http\Controllers\Humanos\ReportsController;
use App\Http\Controllers\Humanos\SliderController;
use App\Http\Controllers\Humanos\StateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //Rutas de areas de adscripcion
    Route::get('humanos/areas', [AreaController::class, 'index'])->name('humanos.areas.index');
    Route::get('humanos/areas/{id}/edit', [AreaController::class, 'edit'])->name('humanos.areas.edit');
    Route::put('humanos/areas/{id}', [AreaController::class, 'update'])->name('humanos.areas.update');
    Route::delete('humanos/areas/{id}', [AreaController::class, 'destroy'])->name('humanos.areas.destroy');
    //Rutas de bancos
    Route::get('humanos/bancos', [BankController::class, 'index'])->name('humanos.bancos.index');
    Route::get('humanos/bancos/{id}/edit', [BankController::class, 'edit'])->name('humanos.bancos.edit');
    Route::put('humanos/bancos/{id}', [BankController::class, 'update'])->name('humanos.bancos.update');
    Route::delete('humanos/bancos/{id}', [BankController::class, 'destroy'])->name('humanos.bancos.destroy');
    //Rutas de estados
    Route::get('humanos/estados', [StateController::class, 'index'])->name('humanos.estados.index');
    Route::get('humanos/estados/{id}/edit', [StateController::class, 'edit'])->name('humanos.estados.edit');
    Route::put('humanos/estados/{id}', [StateController::class, 'update'])->name('humanos.estados.update');
    Route::delete('humanos/estados/{id}', [StateController::class, 'destroy'])->name('humanos.estados.destroy');
    //Rutas de municipios
    Route::get('humanos/municipios', [CountyController::class, 'index'])->name('humanos.municipios.index');
    Route::get('humanos/municipios/{id}/edit', [CountyController::class, 'edit'])->name('humanos.municipios.edit');
    Route::put('humanos/municipios/{id}', [CountyController::class, 'update'])->name('humanos.municipios.update');
    Route::delete('humanos/municipios/{id}', [CountyController::class, 'destroy'])->name('humanos.municipios.destroy');
    //Rutas de categorias
    Route::get('humanos/categorias', [CategoryController::class, 'index'])->name('humanos.categorias.index');
    Route::get('humanos/categorias/{id}/edit', [CategoryController::class, 'edit'])->name('humanos.categorias.edit');
    Route::put('humanos/categorias/{id}', [CategoryController::class, 'update'])->name('humanos.categorias.update');
    Route::delete('humanos/categorias/{id}', [CategoryController::class, 'destroy'])->name('humanos.categorias.destroy');
    //Rutas de plazas
    Route::get('humanos/plazas', [PlaceController::class, 'index'])->name('humanos.plazas.index');
    Route::get('humanos/plazas/{id}/edit', [PlaceController::class, 'edit'])->name('humanos.plazas.edit');
    Route::put('humanos/plazas/{id}', [PlaceController::class, 'update'])->name('humanos.plazas.update');
    Route::delete('humanos/plazas/{id}', [PlaceController::class, 'destroy'])->name('humanos.plazas.destroy');

    //Rutas de empleados
    Route::get('humanos/empleados', [EmployeeController::class, 'index'])->name('humanos.empleados.index');
    Route::get('humanos/empleados/create', [EmployeeController::class, 'create'])->name('humanos.empleados.create');
    Route::post('humanos/empleados', [EmployeeController::class, 'store'])->name('humanos.empleados.store');
    Route::get('humanos/empleados/{id}', [EmployeeController::class, 'show'])->name('humanos.empleados.show');
    Route::get('humanos/empleados/{id}/edit', [EmployeeController::class, 'edit'])->name('humanos.empleados.edit');
    Route::put('humanos/empleados/{id}', [EmployeeController::class, 'update'])->name('humanos.empleados.update');
    Route::delete('humanos/empleados/{id}', [EmployeeController::class, 'destroy'])->name('humanos.empleados.destroy');
    //Rutas de familiares
    Route::get('humanos/familiares', [EmployeeFamilyController::class, 'index'])->name('humanos.familiares.index');
    Route::get('humanos/familiares/{id}', [EmployeeFamilyController::class, 'show'])->name('humanos.familiares.show');
    Route::get('humanos/familiares/{id}/edit', [EmployeeFamilyController::class, 'edit'])->name('humanos.familiares.edit');
    Route::put('humanos/familiares/{id}', [EmployeeFamilyController::class, 'update'])->name('humanos.familiares.update');
    Route::delete('humanos/familiares/{id}', [EmployeeFamilyController::class, 'destroy'])->name('humanos.familiares.destroy');
    //Rutas de Generador de PDF
    Route::get('humanos/reportes', [ReportsController::class, 'index'])->name('humanos.reportes.index');
    Route::get('humanos/reportes/tabulador', [ReportsController::class, 'tabulador'])->name('humanos.reportes.tabulador');
    Route::get('humanos/reportes/activos', [ReportsController::class, 'activos'])->name('humanos.reportes.activos');
    Route::get('humanos/reportes/inactivos', [ReportsController::class, 'inactivos'])->name('humanos.reportes.inactivos');
    // //Rutas de permisos por hora
    // Route::get('humanos/permisos',[PermissionController::class, 'index'])->name('humanos.permisos.index');
    // Route::get('humanos/permisos/create',[PermissionController::class, 'create'])->name('humanos.permisos.create');
    // Route::post('humanos/permisos',[PermissionController::class, 'store'])->name('humanos.permisos.store');
    // Route::get('humanos/permisos/{id}',[PermissionController::class, 'show'])->name('humanos.permisos.show');
    // Route::get('humanos/permisos/{id}/edit', [PermissionController::class,'edit'])->name('humanos.permisos.edit');
    // Route::put('humanos/permisos/{id}', [PermissionController::class,'update'])->name('humanos.permisos.update');
    // Route::delete('humanos/permisos/{id}', [PermissionController::class,'destroy'])->name('humanos.permisos.destroy');
    // //Rutas de vacaciones
    // Route::get('humanos/vacaciones',[VacationController::class, 'index'])->name('humanos.vacaciones.index');
    // Route::get('humanos/vacaciones/create',[VacationController::class, 'create'])->name('humanos.vacaciones.create');
    // Route::post('humanos/vacaciones',[VacationController::class, 'store'])->name('humanos.vacaciones.store');
    // Route::get('humanos/vacaciones/{id}',[VacationController::class, 'show'])->name('humanos.vacaciones.show');
    // Route::get('humanos/vacaciones/{id}/edit', [VacationController::class,'edit'])->name('humanos.vacaciones.edit');
    // Route::put('humanos/vacaciones/{id}', [VacationController::class,'update'])->name('humanos.vacaciones.update');
    // Route::delete('humanos/vacaciones/{id}', [VacationController::class,'destroy'])->name('humanos.vacaciones.destroy');
    //Rutas de carrusel
    Route::get('humanos/slider', [SliderController::class, 'index'])->name('humanos.slider.index');
    Route::get('humanos/slider/create', [SliderController::class, 'create'])->name('humanos.slider.create');
    Route::get('humanos/slider/{id}/edit', [SliderController::class, 'edit'])->name('humanos.slider.edit');
    Route::put('humanos/slider/{id}', [SliderController::class, 'update'])->name('humanos.slider.update');
    //Rutas de Navbar
    Route::get('humanos/navbar', [NavbarController::class, 'index'])->name('humanos.navbar.index');
    Route::get('humanos/navbar/create', [NavbarController::class, 'create'])->name('humanos.navbar.create');
    Route::post('humanos/navbar', [NavbarController::class, 'store'])->name('humanos.navbar.store');
    Route::get('humanos/navbar/{id}', [NavbarController::class, 'show'])->name('humanos.navbar.show');
    Route::get('humanos/navbar/{id}/edit', [NavbarController::class, 'edit'])->name('humanos.navbar.edit');
    Route::put('humanos/navbar/{id}', [NavbarController::class, 'update'])->name('humanos.navbar.update');
    Route::delete('humanos/navbar/{id}', [NavbarController::class, 'destroy'])->name('humanos.navbar.destroy');
});
