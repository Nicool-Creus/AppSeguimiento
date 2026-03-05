<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->Route('login');
});

//Rutas para el login
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

//Rutas para el usuario
Route::get('usuarios/create', [\App\Http\Controllers\UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('usuarios', [\App\Http\Controllers\UsuariosController::class, 'store'])->name('usuarios.store');


Route::middleware('auth')->group(function () {
    Route::resource('usuarios', \App\Http\Controllers\UsuariosController::class)->except(['create', 'store']);

    Route::get('app', function () {
        return view('app');
    })->name('home');

    Route::resource('programas', \App\Http\Controllers\ProgramasDeFormacionController::class);
    Route::resource('eps',\App\Http\Controllers\EpsController::class);
    Route::resource('regionales',\App\Http\Controllers\RegionalesController::class);
    Route::resource('tiposDocumentos',\App\Http\Controllers\TiposDocumentosController::class);
    Route::resource('rolesAdministrativos',\App\Http\Controllers\RolesAdministrativosController::class);
    Route::resource('enteCoformador',\App\Http\Controllers\EnteCoformadorController::class);
    Route::resource('centroFormacion', \App\Http\Controllers\CentrosDeFormacionController::class);
    Route::resource('fichasCaracterizacion',\App\Http\Controllers\FichasDeCaracterizacionController::class);
    Route::resource('instructores', \App\Http\Controllers\InstructoresController::class);
    Route::resource('aprendices', \App\Http\Controllers\AprendicesController::class);
    Route::resource('bitacoras', \App\Http\Controllers\BitacorasController::class);
});


//Ruta para limpiar cache
/*Route::get('/clear', function () {
    Artisan::call('cache:clear');
});*/
