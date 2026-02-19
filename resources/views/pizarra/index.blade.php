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
{{-- DATOS --}}
<div class="right" id="datos-container">
        @include('partials.datos')
</div>

@endsection