<?php

namespace App\Http\Controllers;

use App\Models\Pizarra;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Noticia;

class PizarraController extends Controller
{
    public function index()
    {
        // Datos del CRUD Pizarra
        $pizarras = Pizarra::orderBy('cereal')->get();

        // Dólar oficial (cacheado 5 minutos)
        $dolar = Cache::remember('dolar_oficial', 300, function () {
            $response = Http::timeout(5)
                ->get('https://dolarapi.com/v1/dolares/oficial');

            return $response->successful()
                ? $response->json()
                : null;
        });

        //Noticias Manuales
        $noticias = Noticia::where('publicada', true)
            ->orderBy('fecha', 'desc')
            ->take(3)
            ->get();

        return view('pizarra.index', compact('pizarras', 'dolar', 'noticias'));

        
    }
}