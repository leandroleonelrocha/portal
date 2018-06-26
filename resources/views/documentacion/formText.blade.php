@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('js')
    <script src="{{ elixir('js/documentacion.js') }}"></script>
@endsection

@section('panel-control')

    <div class="box box-default">
        @if(isset($var) && $var == 'edit')
            {!! Form::model($documento, ['method'=>'PUT', 'url'=> route('documentacion.editarDoc', $documento->id), 'class'=>'form', 'enctype' => 'multipart/form-data'])  !!}
        @else
            {!! Form::open(['method'=>'POST','url'=> route('documentacion.postDoc'),'class'=>'form', 'enctype' => 'multipart/form-data']) !!}
        @endif

        <div class="box-header with-border">
            @if(isset($var) && $var == 'edit')
                <h4 class="box-title">Editar documento</h4>
            @else
                <h4 class="box-title">Agregar nuevo documento</h4>
            @endif
        </div>

        <div class="box-body">
            <div class="form-group">
                <label>Área</label>
                {!! Form::select('area_id', [], null, ['class' => 'form-control', 'id' => 'sl-area']) !!}
            </div>

            <div class="form-group">
                <label>Código</label>
                {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>Descripción</label>
                {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>Categoría</label>
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'select2 form-control', 'placeholder' => '' ,'style' => 'width: 100% !important']) !!}
            </div>

            <div class="form-group">

                @if(isset($var) && $var == 'edit')

                    {{------------------------- FORMULARIO DE EDITAR -------------------------}}
                    <input type="button" value="Cambiar archivo" class="btn btn-default"
                           onclick="$('#file').css('display', 'block').removeAttr('disabled');
                                        $(this).css('display', 'none');
                                        $('#fileName').css('display', 'none')">

                    <small class="text-muted" id="fileName">( {!! $documento->file_name !!} )</small>
                    {!! Form::file('archivo', ['disabled' => 'disabled', 'id' => 'file', 'style' => 'display: none']) !!}


                @else

                    {{------------------------ FORMULARIO DE AGREGAR ------------------------}}
                    {!! Form::label('archivo','Subir archivo') !!}
                    {!! Form::file('archivo') !!}

                @endif
            </div>

            {!! Form::hidden('type','doc') !!}
            {!! Form::hidden('area_nombre',null, ['id'=>'area_nombre']) !!}
        </div>

        <div class="box-footer text-right">
            <a href="{{ URL::previous() }}" class="btn btn-default"><em class="fa fa-ban"></em> Cancelar</a>
            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Guardar</button>
        </div>

    </div>
@endsection
