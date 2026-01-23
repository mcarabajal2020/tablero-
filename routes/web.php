<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizarraController;

Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/', function () {
    return view('pizarra.index', [
        'pizarras' => \App\Models\Pizarra::all()
    ]);
});

Route::get('/', [PizarraController::class, 'index']);
