<?php

namespace App\Http\Controllers;

use App\Models\Pizarra;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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

        return view('pizarra.index', compact('pizarras', 'dolar'));
    }
}