@extends('base')

@section('favoritos')

    @include('dashboard.partials.favoritos')

@endsection


@section('contenido')

<div class="box box-primary">
    <div class="box-body">

        <h2>Protocolo telefónico</h2>
        <p>Si su oficina no se encuentra en este listado o percibe algún error en los datos, puede ponerse en contacto con nosotros enviando un email a la casilla <code>cid@desarrollosocial.gob.ar</code></p>
        <div class="panel-body">

            <div class="row">

                <p>
                    <i class="fa fa-info-circle"></i>
                    <small class="text-muted">
                        Realice una búsqueda de un área o contacto. No es necesario ingresar el texto completo de lo que está buscando
                    </small>
                </p>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    {!! Form::open(['method'=>'POST','url'=> route('protocolo.buscarArea'),'class'=>'form']) !!}
                    {!! Form::label('area', 'Buscar área') !!}
                    <div class="input-group">
                        {!! Form::text('area', null, ['class' => 'form-control', 'placeholder' => 'Escriba el área...']) !!}
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    {!! Form::open(['method'=>'POST','url'=> route('protocolo.buscarResponsable'),'class'=>'form']) !!}
                    {!! Form::label('responsable', 'Buscar contacto') !!}
                    <div class="input-group">
                        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Nombre o apellido...']) !!}
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>
</div>

<div>

    @if(isset($search))


        @if(isset($contactos))

            @if(count($contactos) == 1)
                <div class="alert alert-success alert-dismissible">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                    {!! count($contactos) !!} resultado de la búsqueda {!! "''".$search."''" !!}
                </div>
            @elseif(count($contactos) == 0)
                <div class="alert alert-danger alert-dismissible">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                     No hay resultados con la búsqueda {!! "''".$search."''" !!}
                </div>
            @else
                <div class="alert alert-success alert-dismissible">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                    {!! count($contactos) !!} resultados de la búsqueda {!! "''".$search."''" !!}
                </div>
            @endif

            @include('protocolo.partials.contactos')

        @endif


        @if(isset($areas))

            @if(count($areas) == 1)
                <div class="alert alert-success alert-dismissible">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                    {!! count($areas) !!} resultado de la búsqueda {!! "''".$search."''" !!}
                </div>
            @elseif(count($areas) == 0)
                <div class="alert alert-danger alert-dismissible">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                    No hay resultados de la búsqueda {!! "''".$search."''" !!}
                </div>
            @else
                <div class="alert alert-success alert-dismissible">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                    {!! count($areas) !!} resultados de la búsqueda {!! "''".$search."''" !!}
                </div>
            @endif

            @include('protocolo.partials.areas')

        @endif


    @endif


    @if(isset($area))

        @include('protocolo.partials.area')

    @endif



</div>

@endsection

@section('sidebar')

    @include('sidebar.sidebar')

@endsection




{{--@section('js')--}}

    {{--<script src="{{ asset('js/areas.js') }}"></script>--}}
    {{--<script type="text/javascript">--}}

        {{--$('.select2').select2({--}}
            {{--minimumResultsForSearch: Infinity--}}
        {{--});--}}
    {{--</script>--}}

{{--@endsection--}}