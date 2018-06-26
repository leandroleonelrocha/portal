<table class="table table-bordered table-striped" aria-describedby="example2_info">
    <thead style="background-color: lightgrey">
    <tr>
        <th>Id</th>
        <th>Foto</th>
        <th>Título</th>
        <th>Lecturas
            <span class="pull-right">
                @if($noticias->orden == 'up')
                    <a href="{{ route('noticias.index', ['orden'=>'down', 'param' => 'lecturas']) }}" title="ordenar desde más lecturas">
                        <i class="fa fa-sort-down"></i></a>
                @else
                    <a href="{{ route('noticias.index', ['orden'=>'up', 'param' => 'lecturas']) }}" title="ordenar desde menos lecturas">
                        <i class="fa fa-sort-up"></i></a>
                @endif
            </span>
        </th>
        <th>Tags</th>
        <th>Categoría</th>
        <th>Likes</th>
        <th>Fecha publicación
            <span class="pull-right">
                @if($noticias->orden == 'up')
                    <a href="{{ route('noticias.index', ['orden'=>'down', 'param' => 'fecha']) }}" title="ordenar desde más nuevo"><i class="fa fa-sort-down"></i></a>
                @else
                    <a href="{{ route('noticias.index', ['orden'=>'up', 'param' => 'fecha']) }}" title="ordenar desde más antiguo"><i class="fa fa-sort-up"></i></a>
                @endif
            </span>
        </th>
        <th>Última edición</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if ($noticias->count() > 0)
        @foreach($noticias as $noticia)
            <tr>
                <td>{!! $noticia->id !!}</td>
                @if($noticia->multimedia)
                <td><img src="{{ $noticia->multimedia->base_64_source }}" title="foto de portada" style="width: 50px" /></td>
                @else
                <td class="text-center">--</td>
                @endif
                <td>
                    <a href="{{ route('noticias.verNoticia', [$noticia->id]) }}" title="{!! $noticia->titulo !!}">{!! str_limit($noticia->titulo, 60) !!}</a>
                </td>
                <td>{!! $noticia->lecturas !!}</td>
                <td>
                    @if($noticia->tags != '')
                        <mark>{!! str_replace(',', ' - ', $noticia->tags) !!}</mark>
                    @else
                        <small><i>-- no hay tags --</i></small>
                    @endif
                </td>
                <td>{!! $noticia->categoria->descripcion !!}</td>
                <td>{!! $noticia->likes()->count() !!}</td>
                <td>{!! $noticia->fecha_noticia !!}</td>
                <td>{!! $noticia->fecha_noticia_actualizada !!}</td>
                <td>
                    <a href="{{ route('noticias.editar', [$noticia->id]) }}" title="Editar"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a href="javascript:;" title="Enviar a papelera de reciclaje" data-toggle="modal" data-target="#noticia{!! $noticia->id !!}">
                        </i><i class="fa fa-trash text-danger"></i></a>
                </td>
                @include('noticias.partials.eliminarNoticiaModal')
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="11"><em class="fa fa-times-circle text-danger"></em> No hay noticias para mostrar</td>
        </tr>
    @endif
    </tbody>
</table>
<div class="col-sm-5">
    {!! $noticias->render() !!}
</div>
