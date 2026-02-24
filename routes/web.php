<?php

use App\Http\Controllers\CentrosDeFormacionController;
use App\Http\Controllers\EnteCoformadorController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\FichasDeCaracterizacionController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\RolesAdministrativosController;
use App\Http\Controllers\TiposDocumentosController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/settings.php';




Route::get('regionales', [RegionalesController::class, 'index'])->name('regionales.index.blade');

Route::get('tipos-documentos', [TiposDocumentosController::class, 'index'])->name('tiposDocumentos.index.blade');

Route::get('roles-administrativos', [RolesAdministrativosController::class, 'index'])->name('rolesAdministrativos.index.blade');

Route::get('eps', [EpsController::class, 'index'])->name('eps.index.blade');

Route::get('ente-coformador', [EnteCoformadorController::class, 'index'])->name('enteCoformador.index.blade');

Route::get('centros-de-formacion', [CentrosDeFormacionController::class, 'index'])->name('centrosDeFormacion.index.blade');

Route::get('fichas-de-caracterizacion', [FichasDeCaracterizacionController::class, 'index'])->name('fichasDeCaracterizacion.index.blade');


route::resource('programas-de-formacion', \App\Http\Controllers\ProgramasDeFormacionController::class);
Route::resource('aprendices', \App\Http\Controllers\AprendicesController::class);
Route::resource('instructores', \App\Http\Controllers\InstructoresController::class);


//Ruta para limpiar cache
/*Route::get('/clear', function () {
    Artisan::call('cache:clear');
});*/
