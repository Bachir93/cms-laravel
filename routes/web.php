<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CasaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Si la vista es barra o "nada", devolveme welcome.
// Si es una barra, llamo al controlador AppController y ejecuta el metodo index y con el atajo nos referimos a la vista home
Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('casas', [AppController::class, 'casas'])->name('casas');
Route::get('casa/{slug}', [AppController::class, 'casa'])->name('casa');
Route::get('acerca-de', [AppController::class, 'acercade'])->name('acerca-de');

//Back-end
Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('admin/usuarios', [UsuarioController::class, 'index'])->middleware('role:usuarios');
Route::get('admin/usuarios/crear', [UsuarioController::class, 'crear'])->middleware('role:usuarios');
Route::post('admin/usuarios/guardar', [UsuarioController::class, 'guardar'])->middleware('role:usuarios');
Route::get('admin/usuarios/editar/{id}', [UsuarioController::class, 'editar'])->middleware('role:usuarios');
Route::post('admin/usuarios/actualizar/{id}', [UsuarioController::class, 'actualizar'])->middleware('role:usuarios');
Route::get('admin/usuarios/activar/{id}', [UsuarioController::class, 'activar'])->middleware('role:usuarios');
Route::get('admin/usuarios/borrar/{id}', [UsuarioController::class, 'borrar'])->middleware('role:usuarios');

Route::get('admin/casas', [CasaController::class, 'index'])->middleware('role:casas');
Route::get('admin/casas/crear', [CasaController::class, 'crear'])->middleware('role:casas');
Route::post('admin/casas/guardar', [CasaController::class, 'guardar'])->middleware('role:casas');
Route::get('admin/casas/editar/{id}', [CasaController::class, 'editar'])->middleware('role:casas');
Route::post('admin/casas/actualizar/{id}', [CasaController::class, 'actualizar'])->middleware('role:casas');
Route::get('admin/casas/activar/{id}', [CasaController::class, 'activar'])->middleware('role:casas');
Route::get('admin/casas/home/{id}', [CasaController::class, 'home'])->middleware('role:casas');
Route::get('admin/casas/borrar/{id}', [CasaController::class, 'borrar'])->middleware('role:casas');

//Auth
Route::get('acceder', [AuthController::class, 'acceder'])->name('acceder');
Route::post('autenticar', [AuthController::class, 'autenticar'])->name('autenticar');
Route::get('registro', [AuthController::class, 'registro'])->name('registro');
Route::post('registrarse', [AuthController::class, 'registrarse'])->name('registrarse');
Route::post('salir', [AuthController::class, 'salir'])->name('salir');
Route::get('email', [AuthController::class, 'email'])->name('email');

//API Casas
Route::get('mostrar', [AppController::class, 'mostrar'])->name('mostrar');
Route::get('leer', [AppController::class, 'leer'])->name('leer');

//Ruta por defecto (si no encuentra otra antes)
Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');
