<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');



route::resource('programas', \App\Http\Controllers\ProgramasDeFormacionController::class);
route::resource('eps',\App\Http\Controllers\EpsController::class);
route::resource('regionales',\App\Http\Controllers\RegionalesController::class);
route::resource('tiposDocumentos',\App\Http\Controllers\TiposDocumentosController::class);
route::resource('rolesAdministrativos',\App\Http\Controllers\RolesAdministrativosController::class);
route::resource('enteCoformador',\App\Http\Controllers\EnteCoformadorController::class);
route::resource('centroFormacion', \App\Http\Controllers\CentrosDeFormacionController::class);
route::resource('fichasCaracterizacion',\App\Http\Controllers\FichasDeCaracterizacionController::class);
Route::resource('aprendices', \App\Http\Controllers\AprendicesController::class);
Route::resource('instructores', \App\Http\Controllers\InstructoresController::class);


//Ruta para limpiar cache
/*Route::get('/clear', function () {
    Artisan::call('cache:clear');
});*/
