@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="box box-default">
        @if(isset($var) && $var == 'edit')
            {!! Form::model($documento, ['method'=>'PUT','url'=> route('documentacion.editarDoc', $documento->id),'class'=>'form','role'=>'search'])  !!}
        @else
            {!! Form::open(['method'=>'POST','url'=> route('documentacion.postDoc'),'class'=>'form','role'=>'search'])  !!}
        @endif

        <div class="box-header with-border">
            @if(isset($var) && $var == 'edit')
                <h4 class="box-title">Editar documento</h4>
            @else
                <h4 class="box-title">Agregar nuevo documento Link(URL)</h4>
            @endif
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>Área</label>
                {!! Form::select('area', [], null, ['class' => 'form-control select2', 'id' => 'areas', 'placeholder' => 'Todas las áreas']) !!}
            </div>

            <div class="form-group">
                <label>Código</label>
                {!! Form::text('codigo',null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>Descripción</label>
                {!! Form::text('descripcion',null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>Categoría</label>
                {!! Form::select('categoria_id', $categorias,null,['class' => 'select2 form-control', 'placeholder' => '', 'style' => 'width: 100% !important']) !!}
            </div>

            <div class="form-group">
                <label>URL</label>
                {!! Form::text('url', null,['class' => 'form-control', 'placeholder' => 'Pegue aquí su URL - ( Ej: http:\&#92;www.url.com )']) !!}
            </div>

            {!! Form::hidden('type','link') !!}
            {!! Form::hidden('area_nombre',null, ['id'=>'area_nombre']) !!}
        </div>

        <div class="box-footer text-right">
            <a href="{{ URL::previous() }}" class="btn btn-default"><em class="fa fa-ban"></em> Cancelar</a>
            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Guardar</button>
        </div>

        {!! Form::close() !!}
    </div>

@endsection


@section('js')

    <script src="{{ asset('js/areas.js') }}"></script>

@endsection
