@extends('base')

@section('favoritos')
    @include('dashboard.partials.favoritos')
@endsection


@section('contenido')

    <div class="box box-default">
            <div class="panel-body">
                <h2>Multimedia</h2>
                <div class="box box-default">
                @foreach($images as $image)
                    @if(file_exists($image->path))
                        <img src="{{route('getentry', $image->id)}}" alt="foto de portada" class="img-responsive" style="height: 100px; display: inline-block" />
                    @endif
                @endforeach
                </div>
            {!! Form::open(['route' => 'addentry', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}

                <div class="form-group">
                    {!! Form::label('foto_portada', 'Foto de portada:') !!}
                    {!! Form::file('foto_portada') !!}
                </div>

                {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>

    </div>

@endsection


@section('sidebar')
    @include('sidebar.sidebar')
@endsection