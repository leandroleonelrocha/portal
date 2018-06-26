{!! Form::open(['method'=>'GET','url'=> route('noticias.buscar'),'class'=>'form','role'=>'search'])  !!}
<div class="form-group">
    <div class="input-group">
        @if(isset($noticias->busqueda))
            <a href="{{ route('noticias.index') }}" class="label label-primary" style="margin: 5px">ver todas</a>
        @endif
    </div>
    <div class="input-group">

    </div>
</div>
{!! Form::close() !!}
