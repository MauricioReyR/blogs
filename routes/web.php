<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view('/','welcome')->name('welcome');

//creaciosn de  ruta chirps
Route::get('/chirps', function () {
    return 'welcome a la pagina  de chirps';
})->name('chirps.index');

//Ruta opoer defefcto de breeze

//verified  es para verificar los correos  app/models/user 

Route::middleware('auth')->group(function () {
    Route::view ('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', function () {
        return 'welcome a la pagina  de chirps';
    })->name('chirps.index');
});

require __DIR__.'/auth.php';

//se pueden pasar parametros en las rutas
/*Route::get('/chirps/{chirp?}', function ($chirp=null) {
    return 'welcome a la pagina  de chirps' . $chirp;
});*/

//se pueden hacer redirecciones parametros en las rutas
/*Route::get('/chirps/{chirp}', function ($chirp) {
    if ($chirp=== '2') {
        return to_route('chirps.index');        
    }
    return 'Chirps Detail' . $chirp;
});*/
