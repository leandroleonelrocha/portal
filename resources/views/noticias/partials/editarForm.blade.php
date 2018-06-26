@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')
    <div class="box box-body">
        <div class="panel-body">
        <h2>Editar noticia <span class="label label-primary">{!! $noticia->id !!}</span></h2>
{{--        {!! Form::model($noticia,['route' => ['editar.noticia', $noticia->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}--}}
        {!! Form::model($noticia,['url' => ['noticias/'.$noticia->id.'/editar'], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">

            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoría:') !!}
                {!! Form::select('categoria_id', $categorias,null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('titulo', 'Título:') !!}
                {!! Form::text('titulo',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('epigrafe', 'Epígrafe:') !!}
                {!! Form::text('epigrafe',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group box box-default with-border" style="background-color: ghostwhite">
                <div class="box-body">
                @if($noticia->multimedia)
                    {!! Form::label('foto_portada', 'Foto de portada: ') !!}
                    <div class="pull-left col-lg-2 col-md-3 col-sm-2 hidden-xs text-center">
                        <img src="{{ $noticia->multimedia->base_64_source }}" title="foto de portada" class="img-responsive" />
                    </div>
                    <small class="text-muted" id="fileName">( {!! $noticia->multimedia->nombre !!}.{!! $noticia->multimedia->extension !!})</small><br>
                    <span>Cambiar foto:</span>
                    {!! Form::file('foto_portada') !!}
                    Suprimir foto:
                    {!! Form::checkbox('suprimir_foto') !!}
                    <small>(Seleccione si desea eliminar la foto de portada)</small>

                @else

                    {!! Form::label('foto_portada', 'Foto de portada: ') !!}
                    {!! Form::file('foto_portada') !!}

                @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('cuerpo', 'Cuerpo:') !!}
                {!! Form::textarea('cuerpo',null,['id'=>'editor1', 'class'=>'form-control', 'rows'=>'10', 'cols'=>'80']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tags', 'Etiquetas:') !!}
                {!! Form::select('tags[]',$etiquetas, $etiquetas, ['class'=>'inputTags form-control select2-hidden-accessible', 'multiple'=>'', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'style'=>'width: 100%']) !!}
            </div>

                {!! Form::hidden('id', $noticia->id) !!}

        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Actualizar</button>
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancelar</a>

        {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">

        CKEDITOR.replace( 'editor1' );

        var frecuentes = new Array();
        <?php foreach($tags as $key => $val){ ?>

            frecuentes.push('<?php echo $val; ?>');

        <?php } ?>

            $('.inputTags').select2({
            data: frecuentes,
            tags: true,
            tokenSeparators: [','],
            maximumSelectionLength: 6,
            placeholder: "Agregue sus etiquetas aquí",
            language: {
                    maximumSelected: function (args) {
                        return "Sólo puede asignar un máximo de 6 etiquetas";
                    }
                }
            });

    </script>

@endsection
