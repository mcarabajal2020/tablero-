<?php

namespace App\Http\Controllers;

use App\Models\Pizarra;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Noticia;
use App\Models\Matba;
use App\Models\Dolar;
use App\Models\Configuracion;

class PizarraController extends Controller
{
    public function index()
    {
        // Datos del CRUD Pizarra
        $pizarras = Pizarra::orderBy('cereal')
        ->take(4)
        ->get();

        // Dólar oficial (cacheado 5 minutos)

        $dolar = Dolar::where('tipo', 'mayorista')->first();
      //  $dolar = Cache::remember('dolar_oficial', 300, function () {
        //    $response = Http::timeout(5)
        //        ->get('https://dolarapi.com/v1/dolares/mayorista');

 //           return $response->successful()
 //               ? $response->json()
 //               : null;
 //       });

        //Noticias Manuales
        $noticias = Noticia::where('publicada', true)
            ->orderBy('fecha', 'desc')
            ->take(3)
            ->get();

        $matbas = Matba::latest()->take(6)->get();

        $youtubeUrl = Configuracion::where('clave', 'youtube_url')
    ->value('valor');

$embedUrl = null;

if ($youtubeUrl) {

    preg_match('/(?:v=|youtu\.be\/)([^&]+)/', $youtubeUrl, $matches);

    $videoId = $matches[1] ?? null;

    if ($videoId) {
        $embedUrl = "https://www.youtube.com/embed/{$videoId}"
            . "?autoplay=1"
            . "&mute=1"
            . "&loop=1"
            . "&playlist={$videoId}"
            . "&controls=0"
            . "&rel=0"
            . "&modestbranding=1"
            . "&playsinline=1";
    }
}

        return view('pizarra.index', compact('pizarras', 'dolar', 'noticias', 'matbas','embedUrl'));

        
    }
}