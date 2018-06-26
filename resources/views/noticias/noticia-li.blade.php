@foreach ($noticias as $key => $noticia)
	<div class="@if ($key <= 1) col-xs-12 col-lg-6 @else col-lg-4 @endif">
		<article style="margin-bottom: 30px;">
			<header>
				@if($noticia->multimedia)
					<div class="row">
						<div class="col-xs-12 text-center">
							<img src="{{ $noticia->multimedia->base_64_source }}" style="@if ($key <= 1) height: 350px; @endif" title="foto de portada" class="img-responsive">
						</div>
					</div>
				@endif

				<div class="row">
					<div class="col-xs-6">
						<span class="text-orange text-bold">{!! ucfirst($noticia->categoria->descripcion) !!}</span>
					</div>
					@if ($key <= 1)
					<div class="col-xs-6 text-right">
						{!! $noticia->fecha_noticia !!}
					</div>
					@endif
				</div>

				<div class="row" style="margin-top: 8px;">
					<div class="col-xs-12">
						@if ($key <= 1)
							<a href="{{ route('noticias.verNoticia', [$noticia->id]) }}" style="color: #2c3b41">
								<h1 style="margin: 0px">{!! ucfirst($noticia->titulo) !!}</h1>
							</a>
							<p class="lead" style="margin: 0px">{!! ucfirst($noticia->epigrafe) !!}</p>
						@else
							<a href="{{ route('noticias.verNoticia', [$noticia->id]) }}" style="color: #2c3b41">
								<h3 style="margin: 0px">{!! ucfirst($noticia->titulo) !!}</h3>
							</a>
						@endif
					</div>
				</div>
			</header>
		</article>
	</div>
@endforeach