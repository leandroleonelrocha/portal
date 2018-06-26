@extends('base')

@section('favoritos')
    @include('dashboard.partials.favoritos')
@endsection

@section('contenido')

<div class="box box-primary">
    <div class="box-body">
        @role('admin')
        <a href="{{ route('documentacion.eliminados') }}" class="btn btn-info hidden-xs pull-right" style="margin-left: 5px">Recuperar</a>
        <a href="{{ route('documentacion.eliminados') }}" class="btn btn-info btn-xs hidden-lg hidden-md hidden-sm pull-right" style="margin-left: 5px">Recuperar</a>
        <a href="{{ route('documentacion.nuevo') }}" class="btn btn-primary hidden-xs pull-right">+ Agregar</a>
        <a href="{{ route('documentacion.nuevo') }}" class="btn btn-primary btn-xs hidden-lg hidden-md hidden-sm pull-right">+ Agregar</a>
        @endrole
    <h2>Documentación</h2>
    <p class="lead">En esta sección podés encontrar toda la documentación perteneciente al Organismo.</p>

    {!! Form::open(['method'=>'GET','url'=> route('documentacion.buscar'),'class'=>'form','role'=>'search'])  !!}

        <div class="row">
            <div class="form-group col-lg-6">
                {!! Form::hidden('area_nombre',null, ['id'=>'area_nombre']) !!}
                {!! Form::select('area', [], null, ['class' => 'form-control select2 selectDos', 'id' => 'areas', 'placeholder' => 'Todas las áreas']) !!}
            </div>
            {{--<div class="form-group col-lg-6">--}}
                {{--{!! Form::hidden('area_nombre',null, ['id'=>'area_nombre']) !!}--}}
                {{--{!! Form::select('area_id', $areas,null,['class' => 'select2-area selectDos select2', 'style' => 'width: 100% !important', 'placeholder' => 'Todas las áreas']) !!}--}}
            {{--</div>--}}
            <div class="form-group col-lg-6">
                {!! Form::select('categoria_id', $categorias,null, ['class' => 'select2 form-control', 'style' => 'width: 100% !important','placeholder' => 'Todas las categorías']) !!}
            </div>
        </div>

        <div class="input-group">
            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}
            <span class="input-group-btn">
                <button class="btn btn-flat" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div>

    {!! Form::close() !!}
        <br>

        <ul class="list-group">

            @each('documentacion.partials.eachDocument', $documentos, 'documento', 'documentacion.partials.emptyDocuments')
            {!! $documentos->render() !!}

        </ul>

    </div>
</div>

@endsection


@section('sidebar')
    @include('sidebar.sidebar')
@endsection

@section('js')
    <script src="{{ asset('js/areas.js') }}"></script>
    <script src="{{ asset('plugins/vuejs/vue.min.js') }}"></script>
    <script src="{{ asset('js/favorito.js') }}"></script>
@endsection
