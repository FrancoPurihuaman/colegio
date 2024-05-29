<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColegioController;
use App\Http\Controllers\CompetenciaController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\LibretaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AreaController;

// Menu principal de modulos --------------------------------------------------------------------
Route::get('/', function () { return view('modulos'); })->middleware('auth')->name('modulos.index');



// Modulo configuración ------------------------------------------------------------------

// Colegio *********************

// Colegio -> formulario crear
Route::get('/setting/colegio/crear', [ColegioController::class, 'create'])->middleware('auth')->name('colegio.crear');

// Colegio -> guardar
Route::post('/setting/colegio/guardar', [ColegioController::class, 'store'])->middleware('auth')->name('colegio.guardar');

// Colegio -> mostrar
Route::get('/setting/colegio/mostrar', [ColegioController::class, 'show'])->middleware('auth')->name('colegio.mostrar');

// Colegio -> formulario editar
Route::get('/setting/colegio/editar', [ColegioController::class, 'edit'])->middleware('auth')->name('colegio.editar');

// Colegio -> Actualizar
Route::put('/setting/colegio/actualizar', [ColegioController::class, 'update'])->middleware('auth')->name('colegio.actualizar');


// Profesor *********************

// Profesor -> lista
Route::get('/setting/profesor/lista', [ProfesorController::class, 'index'])->middleware('auth')->name('profesor.lista');

// Profesor -> formulario crear
Route::get('/setting/profesor/crear', [ProfesorController::class, 'create'])->middleware('auth')->name('profesor.crear');

// Profesor -> guardar
Route::post('/setting/profesor/guardar', [ProfesorController::class, 'store'])->middleware('auth')->name('profesor.guardar');

// Profesor -> mostrar
Route::get('/setting/profesor/{id}/mostrar', [ProfesorController::class, 'show'])->middleware('auth')->name('profesor.mostrar');

// Profesor -> formulario editar
Route::get('/setting/profesor/{id}/editar', [ProfesorController::class, 'edit'])->middleware('auth')->name('profesor.editar');

// Profesor -> Actualizar
Route::put('/setting/profesor/{id}/actualizar', [ProfesorController::class, 'update'])->middleware('auth')->name('profesor.actualizar');

// Profesor -> eliminar
Route::delete('/setting/profesor/{id}/eliminar', [ProfesorController::class, 'destroy'])->middleware('auth')->name('profesor.eliminar');


// Estudiante *********************

// Estudiante -> lista
Route::get('/setting/estudiante/lista', [EstudianteController::class, 'index'])->middleware('auth')->name('estudiante.lista');

// Estudiante -> formulario crear
Route::get('/setting/estudiante/crear', [EstudianteController::class, 'create'])->middleware('auth')->name('estudiante.crear');

// Estudiante -> guardar
Route::post('/setting/estudiante/guardar', [EstudianteController::class, 'store'])->middleware('auth')->name('estudiante.guardar');

// Estudiante -> mostrar
Route::get('/setting/estudiante/{id}/mostrar', [EstudianteController::class, 'show'])->middleware('auth')->name('estudiante.mostrar');

// Estudiante -> formulario editar
Route::get('/setting/estudiante/{id}/editar', [EstudianteController::class, 'edit'])->middleware('auth')->name('estudiante.editar');

// Estudiante -> Actualizar
Route::put('/setting/estudiante/{id}/actualizar', [EstudianteController::class, 'update'])->middleware('auth')->name('estudiante.actualizar');

// Estudiante -> eliminar
Route::delete('/setting/estudiante/{id}/eliminar', [EstudianteController::class, 'destroy'])->middleware('auth')->name('estudiante.eliminar');


// Area *********************

// Area -> lista
Route::get('/setting/area/lista', [AreaController::class, 'index'])->middleware('auth')->name('area.lista');

// Area -> formulario crear
Route::get('/setting/area/crear', [AreaController::class, 'create'])->middleware('auth')->name('area.crear');

// Area -> guardar
Route::post('/setting/area/guardar', [AreaController::class, 'store'])->middleware('auth')->name('area.guardar');

// Area -> mostrar
Route::get('/setting/area/{id}/mostrar', [AreaController::class, 'show'])->middleware('auth')->name('area.mostrar');

// Area -> formulario editar
Route::get('/setting/area/{id}/editar', [AreaController::class, 'edit'])->middleware('auth')->name('area.editar');

// Area -> Actualizar
Route::put('/setting/area/{id}/actualizar', [AreaController::class, 'update'])->middleware('auth')->name('area.actualizar');

// Area -> eliminar
Route::delete('/setting/area/{id}/eliminar', [AreaController::class, 'destroy'])->middleware('auth')->name('area.eliminar');


// Competencia *********************

// Competencia -> lista
Route::get('/setting/competencia/lista', [CompetenciaController::class, 'index'])->middleware('auth')->name('competencia.lista');

// Competencia -> formulario crear
Route::get('/setting/competencia/crear', [CompetenciaController::class, 'create'])->middleware('auth')->name('competencia.crear');

// Competencia -> guardar
Route::post('/setting/competencia/guardar', [CompetenciaController::class, 'store'])->middleware('auth')->name('competencia.guardar');

// Competencia -> mostrar
Route::get('/setting/competencia/{id}/mostrar', [CompetenciaController::class, 'show'])->middleware('auth')->name('competencia.mostrar');

// Competencia -> formulario editar
Route::get('/setting/competencia/{id}/editar', [CompetenciaController::class, 'edit'])->middleware('auth')->name('competencia.editar');

// Competencia -> Actualizar
Route::put('/setting/competencia/{id}/actualizar', [CompetenciaController::class, 'update'])->middleware('auth')->name('competencia.actualizar');

// Competencia -> eliminar
Route::delete('/setting/competencia/{id}/eliminar', [CompetenciaController::class, 'destroy'])->middleware('auth')->name('competencia.eliminar');


// Grado *********************

// Grado -> lista
Route::get('/setting/grado/lista', [GradoController::class, 'index'])->middleware('auth')->name('grado.lista');

// Grado -> formulario crear
Route::get('/setting/grado/crear', [GradoController::class, 'create'])->middleware('auth')->name('grado.crear');

// Grado -> guardar
Route::post('/setting/grado/guardar', [GradoController::class, 'store'])->middleware('auth')->name('grado.guardar');

// Grado -> mostrar
Route::get('/setting/grado/{id}/mostrar', [GradoController::class, 'show'])->middleware('auth')->name('grado.mostrar');

// Grado -> formulario editar
Route::get('/setting/grado/{id}/editar', [GradoController::class, 'edit'])->middleware('auth')->name('grado.editar');

// Grado -> Actualizar
Route::put('/setting/grado/{id}/actualizar', [GradoController::class, 'update'])->middleware('auth')->name('grado.actualizar');

// Grado -> eliminar
Route::delete('/setting/grado/{id}/eliminar', [GradoController::class, 'destroy'])->middleware('auth')->name('grado.eliminar');



// Modulo reportes ------------------------------------------------------------------

// Libretas
Route::get('/setting/reportes/libretas', [LibretaController::class, 'index'])->middleware('auth')->name('reporte.libreta');

Route::get('/setting/reportes/libretas/estudiante/{idClase}', [LibretaController::class, 'porEstudiante'])->middleware('auth')->name('reporte.libreta.estudiante');
