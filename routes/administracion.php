<?php

use App\Http\Controllers\Administracion\Tecnologias\PermissionController;
use App\Http\Controllers\Administracion\Tecnologias\RoleController;
use App\Http\Controllers\Administracion\Tecnologias\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //Rutas de usuarios
    Route::get('administracion/tecnologias/usuarios',[UserController::class, 'index'])->name('administracion.tecnologias.usuarios.index');
    Route::get('administracion/tecnologias/usuarios/create',[UserController::class, 'create'])->name('administracion.tecnologias.usuarios.create');
    Route::post('administracion/tecnologias/usuarios',[UserController::class, 'store'])->name('administracion.tecnologias.usuarios.store');
    Route::get('administracion/tecnologias/usuarios/{id}',[UserController::class, 'show'])->name('administracion.tecnologias.usuarios.show');
    Route::get('administracion/tecnologias/usuarios/{id}/edit', [UserController::class,'edit'])->name('administracion.tecnologias.usuarios.edit');
    Route::put('administracion/tecnologias/usuarios/{id}', [UserController::class,'update'])->name('administracion.tecnologias.usuarios.update');
    Route::delete('tecnologias/usuarios/{id}', [UserController::class,'destroy'])->name('administracion.tecnologias.usuarios.destroy');
    //Rutas de permisos
    Route::get('administracion/tecnologias/permisos',[PermissionController::class, 'index'])->name('administracion.tecnologias.permisos.index');
    Route::get('administracion/tecnologias/permisos/create',[PermissionController::class, 'create'])->name('administracion.tecnologias.permisos.create');
    Route::post('administracion/tecnologias/permisos',[PermissionController::class, 'store'])->name('administracion.tecnologias.permisos.store');
    Route::get('administracion/tecnologias/permisos/{id}',[PermissionController::class, 'show'])->name('administracion.tecnologias.permisos.show');
    Route::get('administracion/tecnologias/permisos/{id}/edit', [PermissionController::class,'edit'])->name('administracion.tecnologias.permisos.edit');
    Route::put('administracion/tecnologias/permisos/{id}', [PermissionController::class,'update'])->name('administracion.tecnologias.permisos.update');
    Route::delete('administracion/tecnologias/permisos/{id}', [PermissionController::class,'destroy'])->name('administracion.tecnologias.permisos.destroy');
    //Rutas de roles
    Route::get('administracion/tecnologias/roles',[RoleController::class, 'index'])->name('administracion.tecnologias.roles.index');
    Route::get('administracion/tecnologias/roles/create',[RoleController::class, 'create'])->name('administracion.tecnologias.roles.create');
    Route::post('administracion/tecnologias/roles',[RoleController::class, 'store'])->name('administracion.tecnologias.roles.store');
    Route::get('administracion/tecnologias/roles/{id}',[RoleController::class, 'show'])->name('administracion.tecnologias.roles.show');
    Route::get('administracion/tecnologias/roles/{id}/edit', [RoleController::class,'edit'])->name('administracion.tecnologias.roles.edit');
    Route::put('administracion/tecnologias/roles/{id}', [RoleController::class,'update'])->name('administracion.tecnologias.roles.update');
    Route::delete('administracion/tecnologias/roles/{id}', [RoleController::class,'destroy'])->name('administracion.tecnologias.roles.destroy');
});