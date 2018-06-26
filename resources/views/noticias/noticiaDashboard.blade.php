@if (! is_null($primeraNoticia))
    <article>
        <header>
            @if($primeraNoticia->multimedia)
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <img src="{{ $primeraNoticia->multimedia->base_64_source }}" title="foto de portada" class="img-responsive">
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-xs-6">
                    <span class="text-orange text-bold">{!! ucfirst($primeraNoticia->categoria->descripcion) !!}</span>
                </div>
                <div class="col-xs-6 text-right">
                    {!! $primeraNoticia->fecha_noticia !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <h1 style="margin: 0px"><a href="{{ route('noticias.verNoticia', [$primeraNoticia->id]) }}" style="color: #2c3b41">{!! ucfirst($primeraNoticia->titulo) !!}</a></h1>
                    <p class="lead" style="margin: 0px">{!! ucfirst($primeraNoticia->epigrafe) !!}</p>
                </div>
            </div>
        </header>
    </article>
@endif
