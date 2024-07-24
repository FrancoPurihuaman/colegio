<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\direccion\AreaController;
use App\Http\Controllers\direccion\ColegioController;
use App\Http\Controllers\direccion\CompetenciaController;
use App\Http\Controllers\direccion\EstudianteController;
use App\Http\Controllers\direccion\GradoController;
use App\Http\Controllers\direccion\ProfesorController;
use App\Http\Controllers\academia\LibretaController;
use App\Http\Controllers\direccion\DireccionHomeController;
use App\Http\Controllers\academia\AcademiaHomeController;


// Menu principal de modulos --------------------------------------------------------------------
Route::get('/', function () { return view('modulos'); })->middleware('auth')->name('modulos.index');



// Modulo direccion ------------------------------------------------------------------

Route::get('/direccion', [DireccionHomeController::class, 'index'])->middleware('auth')->name('direccion.home');


// Colegio *********************

// Colegio -> formulario crear
Route::get('/direccion/colegio/crear', [ColegioController::class, 'create'])->middleware('auth')->name('colegio.crear');

// Colegio -> guardar
Route::post('/direccion/colegio/guardar', [ColegioController::class, 'store'])->middleware('auth')->name('colegio.guardar');

// Colegio -> mostrar
Route::get('/direccion/colegio/mostrar', [ColegioController::class, 'show'])->middleware('auth')->name('colegio.mostrar');

// Colegio -> formulario editar
Route::get('/direccion/colegio/editar', [ColegioController::class, 'edit'])->middleware('auth')->name('colegio.editar');

// Colegio -> Actualizar
Route::put('/direccion/colegio/actualizar', [ColegioController::class, 'update'])->middleware('auth')->name('colegio.actualizar');


// Profesor *********************

// Profesor -> lista
Route::get('/direccion/profesor/lista', [ProfesorController::class, 'index'])->middleware('auth')->name('profesor.lista');

// Profesor -> formulario crear
Route::get('/direccion/profesor/crear', [ProfesorController::class, 'create'])->middleware('auth')->name('profesor.crear');

// Profesor -> guardar
Route::post('/direccion/profesor/guardar', [ProfesorController::class, 'store'])->middleware('auth')->name('profesor.guardar');

// Profesor -> mostrar
Route::get('/direccion/profesor/{id}/mostrar', [ProfesorController::class, 'show'])->middleware('auth')->name('profesor.mostrar');

// Profesor -> formulario editar
Route::get('/direccion/profesor/{id}/editar', [ProfesorController::class, 'edit'])->middleware('auth')->name('profesor.editar');

// Profesor -> Actualizar
Route::put('/direccion/profesor/{id}/actualizar', [ProfesorController::class, 'update'])->middleware('auth')->name('profesor.actualizar');

// Profesor -> eliminar
Route::delete('/direccion/profesor/{id}/eliminar', [ProfesorController::class, 'destroy'])->middleware('auth')->name('profesor.eliminar');


// Estudiante *********************

// Estudiante -> lista
Route::get('/direccion/estudiante/lista', [EstudianteController::class, 'index'])->middleware('auth')->name('estudiante.lista');

// Estudiante -> formulario crear
Route::get('/direccion/estudiante/crear', [EstudianteController::class, 'create'])->middleware('auth')->name('estudiante.crear');

// Estudiante -> guardar
Route::post('/direccion/estudiante/guardar', [EstudianteController::class, 'store'])->middleware('auth')->name('estudiante.guardar');

// Estudiante -> mostrar
Route::get('/direccion/estudiante/{id}/mostrar', [EstudianteController::class, 'show'])->middleware('auth')->name('estudiante.mostrar');

// Estudiante -> formulario editar
Route::get('/direccion/estudiante/{id}/editar', [EstudianteController::class, 'edit'])->middleware('auth')->name('estudiante.editar');

// Estudiante -> Actualizar
Route::put('/direccion/estudiante/{id}/actualizar', [EstudianteController::class, 'update'])->middleware('auth')->name('estudiante.actualizar');

// Estudiante -> eliminar
Route::delete('/direccion/estudiante/{id}/eliminar', [EstudianteController::class, 'destroy'])->middleware('auth')->name('estudiante.eliminar');


// Area *********************

// Area -> lista
Route::get('/direccion/area/lista', [AreaController::class, 'index'])->middleware('auth')->name('area.lista');

// Area -> formulario crear
Route::get('/direccion/area/crear', [AreaController::class, 'create'])->middleware('auth')->name('area.crear');

// Area -> guardar
Route::post('/direccion/area/guardar', [AreaController::class, 'store'])->middleware('auth')->name('area.guardar');

// Area -> mostrar
Route::get('/direccion/area/{id}/mostrar', [AreaController::class, 'show'])->middleware('auth')->name('area.mostrar');

// Area -> formulario editar
Route::get('/direccion/area/{id}/editar', [AreaController::class, 'edit'])->middleware('auth')->name('area.editar');

// Area -> Actualizar
Route::put('/direccion/area/{id}/actualizar', [AreaController::class, 'update'])->middleware('auth')->name('area.actualizar');

// Area -> eliminar
Route::delete('/direccion/area/{id}/eliminar', [AreaController::class, 'destroy'])->middleware('auth')->name('area.eliminar');


// Competencia *********************

// Competencia -> lista
Route::get('/direccion/competencia/lista', [CompetenciaController::class, 'index'])->middleware('auth')->name('competencia.lista');

// Competencia -> formulario crear
Route::get('/direccion/competencia/crear', [CompetenciaController::class, 'create'])->middleware('auth')->name('competencia.crear');

// Competencia -> guardar
Route::post('/direccion/competencia/guardar', [CompetenciaController::class, 'store'])->middleware('auth')->name('competencia.guardar');

// Competencia -> mostrar
Route::get('/direccion/competencia/{id}/mostrar', [CompetenciaController::class, 'show'])->middleware('auth')->name('competencia.mostrar');

// Competencia -> formulario editar
Route::get('/direccion/competencia/{id}/editar', [CompetenciaController::class, 'edit'])->middleware('auth')->name('competencia.editar');

// Competencia -> Actualizar
Route::put('/direccion/competencia/{id}/actualizar', [CompetenciaController::class, 'update'])->middleware('auth')->name('competencia.actualizar');

// Competencia -> eliminar
Route::delete('/direccion/competencia/{id}/eliminar', [CompetenciaController::class, 'destroy'])->middleware('auth')->name('competencia.eliminar');


// Grado *********************

// Grado -> lista
Route::get('/direccion/grado/lista', [GradoController::class, 'index'])->middleware('auth')->name('grado.lista');

// Grado -> formulario crear
Route::get('/direccion/grado/crear', [GradoController::class, 'create'])->middleware('auth')->name('grado.crear');

// Grado -> guardar
Route::post('/direccion/grado/guardar', [GradoController::class, 'store'])->middleware('auth')->name('grado.guardar');

// Grado -> mostrar
Route::get('/direccion/grado/{id}/mostrar', [GradoController::class, 'show'])->middleware('auth')->name('grado.mostrar');

// Grado -> formulario editar
Route::get('/direccion/grado/{id}/editar', [GradoController::class, 'edit'])->middleware('auth')->name('grado.editar');

// Grado -> Actualizar
Route::put('/direccion/grado/{id}/actualizar', [GradoController::class, 'update'])->middleware('auth')->name('grado.actualizar');

// Grado -> eliminar
Route::delete('/direccion/grado/{id}/eliminar', [GradoController::class, 'destroy'])->middleware('auth')->name('grado.eliminar');



// Modulo academia ------------------------------------------------------------------

Route::get('/academia', [AcademiaHomeController::class, 'index'])->middleware('auth')->name('academia.home');


// Modulo reportes ------------------------------------------------------------------

// Libretas
Route::get('/academia/reportes/libretas', [LibretaController::class, 'index'])->middleware('auth')->name('reporte.libreta');

Route::get('/academia/reportes/libretas/estudiante/{idClase}', [LibretaController::class, 'porEstudiante'])->middleware('auth')->name('reporte.libreta.estudiante');
