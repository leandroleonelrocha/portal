<article>
    <header>
        <div class="row">
            <div class="col-xs-6">
                <span class="text-orange text-bold">{!! ucfirst($noticia->categoria->descripcion) !!}</span>
            </div>
            <div class="col-xs-6 text-right">
                {!! $noticia->fecha_noticia !!}
            </div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="col-xs-12">
                <h1 style="margin: 0px">{!! ucfirst($noticia->titulo) !!}</h1>
            </div>
        </div>
    </header>

    <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12 col-lg-8">
            @if($noticia->multimedia)
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <img src="{{ $noticia->multimedia->base_64_source }}" title="foto de portada" class="img-responsive">
                    </div>
                </div>
            @endif
            <p class="lead" style="margin: 0px">{!! $noticia->epigrafe !!}</p>

            <p style="margin-top: 30px;">{!! $noticia->cuerpo !!}</p>
        </div>
        <div class="hidden-xs col-lg-4">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <span class="text-primary text-bold" style="font-size: 1.2em; margin-right: 20px;">{{ $noticia->lecturas }}</span>
                    <span>Leyeron esta noticia</span>
                </li>
                <li class="list-group-item">
                    <span class="text-primary text-bold" style="font-size: 1.2em; margin-right: 20px;">@{{ likes }}</span>
                    <span>Les ha gustado esta noticia</span>
                </li>
            </ul>
            <a href="javascript:;" role="button" class="has-tooltip" v-on:click="setLike()" v-bind:class="{'has-tooltip text-bold' : ownLike, 'has-tooltip' : !ownLike}">
                <i class="fa fa-thumbs-o-up"></i> @{{ buttonTitle }}
            </a>
        </div>
    </div>
</article>

{{--}}<article class="box box-default " style="margin-bottom: 2px">

    <header class="box-header with-border">



            <div class="row" style="margin-top: 10px;">
                <div class="col-xs-12">
                    <h1 style="margin: 0px">{!! ucfirst($noticia->titulo) !!}</h1>
                    <p class="lead" style="margin: 0px">{!! ucfirst($noticia->epigrafe) !!}</p>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-xs-6">

                </div>
                <div class="col-xs-6 text-right">
                    <a href="javascript:;" role="button" class="has-tooltip" data-toggle="tooltip" title="@{{ buttonTitle }}" v-on:click="setLike()" v-bind:class="{'has-tooltip text-bold' : ownLike, 'has-tooltip' : !ownLike}">
                        <i class="fa fa-thumbs-up"></i> @{{ likes }}
                    </a>
                </div>
            </div>

    </header>

    <div class="cuerpo box-body" style="font-size: medium; font-family: Georgia, Times, serif">

    </div>

    @if($noticia->deleted_at == null)
    <footer class="main-footer">

        @if ($noticia->tags != "")
            En esta noticia:
            @foreach(explode(',', $noticia->tags) as $tag)
                <a href="{{ route('noticias.relacionadas', $tag) }}"><span class="label label-default" style="margin: 2px"> {!! $tag !!} </span></a>
            @endforeach
        @endif

    </footer>
    @endif

</article>--}}
