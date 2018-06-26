<aside class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Noticias más leídas</h3>
    </div>
    <div class="box-body">
        <ol class="list-group">
            @if (App\Entities\Noticia::count() > 0)

                @foreach(\App\Entities\Noticia::orderBy('lecturas', 'DESC')->limit(6)->get() as $masLeida)
                    <li class="list-group-item">
                        <a href="{{ route('noticias.verNoticia', [$masLeida->id]) }}" title="{!! $masLeida->titulo !!}">
                            {!! ucfirst( str_limit( $masLeida->titulo, 100 ) ) !!}
                        </a>
                        <small class="text-muted">{!! $masLeida->fecha_noticia !!}</small>
                    </li>
                @endforeach

            @else
                <em class="fa fa-times-circle text-danger"></em> No hay nada para mostrar aún.
            @endif

        </ol>
    </div>
</aside>