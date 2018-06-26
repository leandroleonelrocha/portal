@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="box box-default">
        {!! Form::open(['route'=>'noticias.create', 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}

        <div class="box-header with-border">
            <h4 class="box-title">Nueva Noticia</h4>
        </div>
        <div class="box-body">
            <div class="form-group">

                <div class="form-group">
                    {!! Form::label('categoria_id', 'Categoría:') !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('titulo', 'Título:') !!}
                    {!! Form::text('titulo', null ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('epigrafe', 'Epígrafe:') !!}
                    {!! Form::text('epigrafe', null ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('foto_portada', 'Foto de portada:') !!}
                    {!! Form::file('foto_portada') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cuerpo', 'Cuerpo:') !!}
                    {!! Form::textarea('cuerpo', null, ['id'=>'editor1', 'class'=>'form-control', 'rows'=>'10', 'cols'=>'80']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tags', 'Etiquetas:') !!}
                    <select class="inputTags form-control select2-hidden-accessible" name="tags[]" multiple="" tabindex="-1" aria-hidden="true" style="width: 100%"></select>
                </div>

            </div>

        </div>

        <div class="box-footer text-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Publicar</button>
            <a href="{{ URL::previous() }}" class="btn btn-default">Cancelar</a>
        </div>

        {!! Form::close() !!}
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
