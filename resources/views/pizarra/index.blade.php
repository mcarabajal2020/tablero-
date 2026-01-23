@extends('welcome')

@section('content')

{{-- COLUMNA IZQUIERDA --}}
<div class="left">
    <iframe 
        src="https://www.youtube.com/embed/Aq2zWchTUc0?autoplay=1&mute=1&loop=1&playlist=Aq2zWchTUc0"
        title="YouTube video"
        frameborder="0"
        allow="autoplay; encrypted-media"
        allowfullscreen>
    </iframe>
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
    <div class="card">
        <h2>Mercado Futuro</h2>
        <div class="card-content">
            Próximamente<br>
            Datos de contratos, vencimientos, etc.
        </div>
    </div>

    {{-- TARJETA 3 – CRUD FUTURO --}}
    <div class="card">
    <h2>Tipo de Cambio</h2>

    <div class="card-content">
        @if ($dolar && isset($dolar['venta']))
            <strong>{{ $dolar['nombre'] ?? 'Dólar Oficial' }}</strong><br><br>

            <div>
                Compra
                <div class="precio">
                    $ {{ number_format($dolar['compra'], 2, ',', '.') }}
                </div>
            </div>

            <div>
                Venta
                <div class="precio">
                    $ {{ number_format($dolar['venta'], 2, ',', '.') }}
                </div>
            </div>

            @if (isset($dolar['fechaActualizacion']))
                <small>
                    Actualizado:
                    {{ \Carbon\Carbon::parse($dolar['fechaActualizacion'])->format('d/m/Y H:i') }}
                </small>
            @endif
        @else
            <p>No hay datos de cotización disponibles.</p>
        @endif
    </div>
</div>

    {{-- TARJETA 4 – CRUD FUTURO --}}
    <div class="card">
        <h2>Noticias Agro</h2>
        <div class="card-content">
            Próximamente<br>
            Noticias destacadas
        </div>
    </div>

</div>

@endsection