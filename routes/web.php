<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rutas para Libros (CRUD manual)
|--------------------------------------------------------------------------
*/
// Listar libros
Route::get('libros', [LibroController::class, 'index'])->name('libros.index');

// Mostrar formulario de creación
Route::get('libros/create', [LibroController::class, 'create'])->name('libros.create');

// Guardar nuevo libro
Route::post('libros', [LibroController::class, 'store'])->name('libros.store');

// Mostrar un libro concreto
Route::get('libros/{libro}', [LibroController::class, 'show'])->name('libros.show');

// Mostrar formulario de edición
Route::get('libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');

// Actualizar libro
Route::put('libros/{libro}', [LibroController::class, 'update'])->name('libros.update');

// Eliminar libro
Route::delete('libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');


/*
|--------------------------------------------------------------------------
| Rutas para Usuarios (CRUD manual)
|--------------------------------------------------------------------------
*/
// Listar usuarios
Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

// Mostrar formulario de creación
Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

// Guardar nuevo usuario
Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

// Mostrar un usuario concreto
Route::get('usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');

// Mostrar formulario de edición
Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');

// Actualizar usuario
Route::put('usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');

// Eliminar usuario
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');


/*
|--------------------------------------------------------------------------
| Rutas para Préstamos (CRUD manual)
|--------------------------------------------------------------------------
*/
// Listar préstamos
Route::get('prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');

// Mostrar formulario de creación
Route::get('prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');

// Guardar nuevo préstamo
Route::post('prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');

// Mostrar un préstamo concreto
Route::get('prestamos/{prestamo}', [PrestamoController::class, 'show'])->name('prestamos.show');

// Mostrar formulario de edición
Route::get('prestamos/{prestamo}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit');

// Actualizar préstamo
Route::put('prestamos/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update');

// Eliminar préstamo
Route::delete('prestamos/{prestamo}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');
