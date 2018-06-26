<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Favoritos</h3>
    </div>
    <div class="box-body">
        <ul class="list-group">
            @foreach(\App\Entities\Documento::all() as $docFavorito)

                @foreach($docFavorito->favoritos as $favorito)
                    @if($favorito->user_id == Auth::user()->id)

                        <li class="list-group-item">
                            <small><a href="{{ route('documento.favorito', $docFavorito->id) }}" title="Quitar de favoritos" class="text-muted pull-right">
                                <i class="fa fa-times"></i></a></small>
                            <div class="post">
                                <div>
                                    <i class="fa {!! $docFavorito->iClass !!} fa pull-left"></i>
                                    <span class="text-muted"><small>{!! $docFavorito->categorias_documentos->descripcion !!}</small></span><br>
                                    <span>
                                        <a href="{!! $docFavorito->url !!}" target="_blank">{!! $docFavorito->descripcion !!}</a>
                                    </span>
                                </div>
                            </div>
                        </li>

                    @endif
                @endforeach

            @endforeach

            @if(\App\Entities\Favorito::all()->where('user_id', Auth::user()->id)->count() == 0)
                <em class="fa fa-times-circle text-danger"></em> Todavía no has marcado nada como favorito.
            @endif

        </ul>
    </div>
</div>
