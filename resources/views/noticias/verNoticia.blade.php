@extends('base')



@section('favoritos')

    @include('dashboard.partials.favoritos')

@endsection

@section('contenido')

    <div class="box box-default">
        <div class="box-body">
            @include('noticias.noticia')
        </div>
    </div>

@endsection

@section('sidebar')

    @include('sidebar.sidebar')

@endsection

@section('js')
    <script src="{{ asset('plugins/vuejs/vue.min.js') }}"></script>
    <script type="text/javascript">
        var noticiaId = '{{ $noticia->id }}';
    </script>
    <script src="{{ asset('js/noticia.js') }}"></script>
@endsection