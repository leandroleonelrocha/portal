@extends('base')

@section('js')
    <script type="text/javascript" src="{{ asset('plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/clipboardjs/clipboard.min.js') }}"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $('#tags').select2({
                tags: true
            });

            var clipboard = new Clipboard('.btn-clipboard');

        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/fancybox/jquery.fancybox.min.css') }}">
@endsection

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="row">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="box-title">Multimedia</h4>
                <div class="box-tools">
                    {!! Form::open(['method'=>'GET','url'=> route('noticias.buscar'),'class'=>'form','role'=>'search'])  !!}
                    <div class="input-group input-group-sm" style="width: 300px;">
                        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar noticia...']) !!}
                        <div class="input-group-btn">
                            <button class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-lg-4">
                        <div class="panel panel-default">
                            {!! Form::open(['route' => 'multimedia.create', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            <div class="panel-heading">
                                <h4 class="panel-title">Subir nuevo archivo</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Archivo</label>
                                    {!! Form::file('archivo', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label>Descripción</label>
                                    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label>Etiquetas</label>
                                    {!! Form::select('tags[]', [], null, ['class' => 'form-control', 'id' => 'tags', 'multiple' => 'multiple']) !!}
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <button class="btn btn-primary">
                                    <em class="fa fa-upload"></em> Subir Archivo
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-8">
                        <div class="row">
                            @foreach ($medias as $item)
                                <div class="col-xs-12 col-lg-3" style="margin-bottom: 5px;">
                                    <a data-fancybox data-src="#data-{{ $item->id }}" class="btn-show-data"><img src="{{ $item->base_64_source }}" class="img-responsive img-thumbnail" style="max-height: 100px;"></a>
                                </div>
                                <div style="display: none; max-width: 600px;" id="data-{{$item->id}}">
                                    <img src="{{ $item->base_64_source }}" class="img-responsive"><br />
                                    <div class="input-group">
                                        <span class="input-group-addon">Url:</span>
                                        <input class="form-control" value="{{ route('multimedia.show', $item->id) }}" readonly>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-clipboard" data-clipboard-text="{{ route('multimedia.show', $item->id) }}">Copiar</button>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
