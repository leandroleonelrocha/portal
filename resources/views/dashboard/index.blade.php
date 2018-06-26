@extends('base')

@section('favoritos')

    @include('dashboard.partials.favoritos')

@endsection


@section('contenido')


    {{-- Sección Noticias --}}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="margin-top: 30px;">
                @include('noticias.noticia-li')
            </div>
        </div>
    </div>


@endsection

@section('sidebar')

    @include('sidebar.sidebar')

@endsection