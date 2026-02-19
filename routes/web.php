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

Route::get('/datos-refresh', function () {

    $pizarras = \App\Models\Pizarra::latest()->get();
    $noticias = \App\Models\Noticia::where('publicada', true)
        ->latest()
        ->take(3)
        ->get();
    $dolar = \App\Models\Dolar::where('tipo', 'mayorista')->first();
    $matbas = \App\Models\Matba::all();

    return view('partials.datos', compact(
        'pizarras',
        'noticias',
        'dolar',
        'matbas'
    ));
});