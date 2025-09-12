<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapaController;


Route::get('/', function () {
    return view('welcome');
});




Route::get('/coordenadas', [MapaController::class, 'index'])->name('coordenadas.index');
Route::get('/coordenadas/create', [MapaController::class, 'create'])->name('coordenadas.create');
Route::post('/coordenadas', [MapaController::class, 'store'])->name('coordenadas.store');
Route::get('/coordenadas/{id}', [MapaController::class, 'show'])->name('coordenadas.show');


Route::get('/mapa', [MapaController::class, 'mapa'])->name('mapa.interativo');


Route::get('/mp1', [MapaController::class, 'mp1']);

Route::get('/mp2', [MapaController::class, 'mp2']);
Route::get('/mp3', [MapaController::class, 'mp3']);
