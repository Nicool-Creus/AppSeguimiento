<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    route::resource('programas', \App\Http\Controllers\ProgramasDeFormacionController::class);
    route::resource('eps',\App\Http\Controllers\EpsController::class);
    route::resource('regionales',\App\Http\Controllers\RegionalesController::class);
    route::resource('tiposDocumentos',\App\Http\Controllers\TiposDocumentosController::class);
    route::resource('rolesAdministrativos',\App\Http\Controllers\RolesAdministrativosController::class);
    route::resource('enteCoformador',\App\Http\Controllers\EnteCoformadorController::class);
    route::resource('centroFormacion', \App\Http\Controllers\CentrosDeFormacionController::class);
    route::resource('fichasCaracterizacion',\App\Http\Controllers\FichasDeCaracterizacionController::class);
    Route::resource('instructores', \App\Http\Controllers\InstructoresController::class);
    Route::resource('aprendices', \App\Http\Controllers\AprendicesController::class);
    Route::resource('usuarios', \App\Http\Controllers\UsuariosController::class);
});


//Ruta para limpiar cache
/*Route::get('/clear', function () {
    Artisan::call('cache:clear');
});*/
