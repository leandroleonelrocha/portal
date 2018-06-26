@extends('base')

@section('favoritos')

    @include('dashboard.partials.favoritos')

@endsection

@section('contenido')

    <div class="box box-default">

        <div class="box-body">

            <h2>{!! ucfirst($tag) !!}</h2>
            <hr>
            <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs" style="padding: 4px">
                <ul class="list-group">

                    @each('noticias.noticia-li', $noticiasLeft, 'noticia', 'noticias.vacia')

                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs" style="padding: 4px">
                <ul class="list-group">

                    @each('noticias.noticia-li', $noticiasRight, 'noticia')

                </ul>
            </div>

            {{-- Div que se oculta en dispositivos grandes y lista las noticias en dispositivos
                 chicos para mantener el correcto orden por fecha --}}
            <div class="hidden-lg hidden-md hidden-sm">
                <ul class="list-group">

                    @each('noticias.noticia-li', $noticias, 'noticia', 'noticias.vacia')

                </ul>
            </div>

        </div>

    </div>

@endsection

@section('sidebar')

    @include('sidebar.sidebar')

@endsection
