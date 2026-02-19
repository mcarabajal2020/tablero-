@extends('welcome')

@section('content')

{{-- COLUMNA IZQUIERDA --}}
<div class="left">
    @if($embedUrl)
        <iframe
            width="100%"
            height="100%"
            src="{{ $embedUrl }}"
            frameborder="0"
            allow="autoplay; fullscreen"
            allowfullscreen>
        </iframe>
    @endif
</div>

{{-- COLUMNA DERECHA --}}
<div class="right">

    {{-- TARJETA 1 – PIZARRA --}}
    <div class="card">
        <h2>Pizarra de Precios</h2>

        <div class="card-content">
            @foreach ($pizarras as $pizarra)
                <div>
                    <strong>{{ $pizarra->cereal }}</strong><br>
                    Puerto: {{ $pizarra->puerto }}<br>
                    <span class="precio">
                        $ {{ number_format($pizarra->precio, 2, ',', '.') }}
                    </span>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

    {{-- TARJETA 2 – CRUD FUTURO --}}
    <div class="card ">
    <h2 class="">MATBA</h2>

    <div class="card-contente">
        @foreach ($matbas as $m)
            <div class="">
                <span class="noticia-titulo ">
                    {{ $m->producto_contrato }}
                </span>

                <div class="noticia-resumen">
                    <span>Compra: usd{{ number_format($m->precio_compra, 2) }}</span>
                    <span>Venta: usd{{ number_format($m->precio_venta, 2) }}</span>
                </div>

                <div class="noticia-titulo">
                    usd{{ number_format($m->precio, 2) }}
                </div>
            </div>
        @endforeach
    </div>
</div>

    {{-- TARJETA 3 – CRUD FUTURO --}}
    <div class="card">
    <h2>Tipo de Cambio</h2>

    @php
    $dolar = \App\Models\Dolar::where('tipo', 'mayorista')->first();
    @endphp

<div class="card">
    <h3>Dólar Mayorista</h3>
        <div class="card-content">
            @if ($dolar)
                <strong>Compra:</strong>
                <div class="precio"> 
                ${{ number_format($dolar->compra, 2) }}
                </div>
                <strong>Venta: </strong>
                <div class="precio">
                    ${{ number_format($dolar->venta, 2) }}
                </div>
                <small>
                    Actualizado: {{ $dolar->actualizado_api->format('d/m/Y H:i') }}
                </small>
            
            @else
                <p class="text-muted">Sin datos disponibles</p>
            @endif
         </div>
</div>
</div>

    {{-- TARJETA 4 – CRUD FUTURO --}}
    <div class="card">
    <h2>Noticias Cereales</h2>

    <div class="card-content">
        @forelse ($noticias as $noticia)
            <div class="noticia-item">
                <div class="noticia-titulo">
                    {{ $noticia->titulo }}
                </div>
                <div class="noticia-resumen">
                    {{ $noticia->resumen }}
                </div>
                <div class="noticia-resumen">
                    {{ $noticia->fecha }}
                </div>
            </div>
        @empty
            <p>No hay noticias cargadas.</p>
        @endforelse
    </div>
</div>


</div>

@endsection