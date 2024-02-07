<?php

use App\Http\Controllers\Tecnologias\PermissionController;
use App\Http\Controllers\Tecnologias\RoleController;
use App\Http\Controllers\Tecnologias\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //Rutas de usuarios
    Route::get('tecnologias/usuarios',[UserController::class, 'index'])->name('tecnologias.usuarios.index');
    Route::get('tecnologias/usuarios/create',[UserController::class, 'create'])->name('tecnologias.usuarios.create');
    Route::post('tecnologias/usuarios',[UserController::class, 'store'])->name('tecnologias.usuarios.store');
    Route::get('tecnologias/usuarios/{id}',[UserController::class, 'show'])->name('tecnologias.usuarios.show');
    Route::get('tecnologias/usuarios/{id}/edit', [UserController::class,'edit'])->name('tecnologias.usuarios.edit');
    Route::put('tecnologias/usuarios/{id}', [UserController::class,'update'])->name('tecnologias.usuarios.update');
    Route::delete('tecnologias/usuarios/{id}', [UserController::class,'destroy'])->name('tecnologias.usuarios.destroy');
    //Rutas de permisos
    Route::get('tecnologias/permisos',[PermissionController::class, 'index'])->name('tecnologias.permisos.index');
    Route::get('tecnologias/permisos/create',[PermissionController::class, 'create'])->name('tecnologias.permisos.create');
    Route::post('tecnologias/permisos',[PermissionController::class, 'store'])->name('tecnologias.permisos.store');
    Route::get('tecnologias/permisos/{id}',[PermissionController::class, 'show'])->name('tecnologias.permisos.show');
    Route::get('tecnologias/permisos/{id}/edit', [PermissionController::class,'edit'])->name('tecnologias.permisos.edit');
    Route::put('tecnologias/permisos/{id}', [PermissionController::class,'update'])->name('tecnologias.permisos.update');
    Route::delete('tecnologias/permisos/{id}', [PermissionController::class,'destroy'])->name('tecnologias.permisos.destroy');
    //Rutas de roles
    Route::get('tecnologias/roles',[RoleController::class, 'index'])->name('tecnologias.roles.index');
    Route::get('tecnologias/roles/create',[RoleController::class, 'create'])->name('tecnologias.roles.create');
    Route::post('tecnologias/roles',[RoleController::class, 'store'])->name('tecnologias.roles.store');
    Route::get('tecnologias/roles/{id}',[RoleController::class, 'show'])->name('tecnologias.roles.show');
    Route::get('tecnologias/roles/{id}/edit', [RoleController::class,'edit'])->name('tecnologias.roles.edit');
    Route::put('tecnologias/roles/{id}', [RoleController::class,'update'])->name('tecnologias.roles.update');
    Route::delete('tecnologias/roles/{id}', [RoleController::class,'destroy'])->name('tecnologias.roles.destroy');
});