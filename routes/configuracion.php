<?php

use App\Http\Controllers\Configuracion\AssignPermissionController;
use App\Http\Controllers\Configuracion\PermissionController;
use App\Http\Controllers\Configuracion\RoleController;
use App\Http\Controllers\Configuracion\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //Rutas de usuarios
    Route::get('configuracion/usuarios',[UserController::class, 'index'])->name('configuracion.usuarios.index');
    Route::get('configuracion/usuarios/create',[UserController::class, 'create'])->name('configuracion.usuarios.create');
    Route::post('configuracion/usuarios',[UserController::class, 'store'])->name('configuracion.usuarios.store');
    Route::get('configuracion/usuarios/{id}',[UserController::class, 'show'])->name('configuracion.usuarios.show');
    Route::get('configuracion/usuarios/{id}/edit', [UserController::class,'edit'])->name('configuracion.usuarios.edit');
    Route::put('configuracion/usuarios/{id}', [UserController::class,'update'])->name('configuracion.usuarios.update');
    Route::delete('configuracion/usuarios/{id}', [UserController::class,'destroy'])->name('configuracion.usuarios.destroy');
    //Rutas de permisos
    Route::get('configuracion/permisos',[PermissionController::class, 'index'])->name('configuracion.permisos.index');
    Route::get('configuracion/permisos/create',[PermissionController::class, 'create'])->name('configuracion.permisos.create');
    Route::post('configuracion/permisos',[PermissionController::class, 'store'])->name('configuracion.permisos.store');
    Route::get('configuracion/permisos/{id}',[PermissionController::class, 'show'])->name('configuracion.permisos.show');
    Route::get('configuracion/permisos/{id}/edit', [PermissionController::class,'edit'])->name('configuracion.permisos.edit');
    Route::put('configuracion/permisos/{id}', [PermissionController::class,'update'])->name('configuracion.permisos.update');
    Route::delete('configuracion/permisos/{id}', [PermissionController::class,'destroy'])->name('configuracion.permisos.destroy');
    //Rutas de roles
    Route::get('configuracion/roles',[RoleController::class, 'index'])->name('configuracion.roles.index');
    Route::get('configuracion/roles/create',[RoleController::class, 'create'])->name('configuracion.roles.create');
    Route::post('configuracion/roles',[RoleController::class, 'store'])->name('configuracion.roles.store');
    Route::get('configuracion/roles/{id}',[RoleController::class, 'show'])->name('configuracion.roles.show');
    Route::get('configuracion/roles/{id}/edit', [RoleController::class,'edit'])->name('configuracion.roles.edit');
    Route::put('configuracion/roles/{id}', [RoleController::class,'update'])->name('configuracion.roles.update');
    Route::delete('configuracion/roles/{id}', [RoleController::class,'destroy'])->name('configuracion.roles.destroy');
});