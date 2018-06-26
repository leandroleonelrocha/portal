
{{--<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#eliminarTodas" style="margin-bottom: 5px">Vaciar papelera</button>
@include('noticias.partials.eliminarTodas')--}}
<div class="table-responsive">
<table id="example1" class="table table-bordered table-striped">
    <thead style="background-color: lightgrey">
    <tr role="row">
        <th>Id</th>
        <th>Título</th>
        <th>Lecturas</th>
        <th>Tags</th>
        <th>Categoría</th>
        <th>Likes</th>
        <th>Fecha publicación</th>
        <th>Fecha eliminación</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if ($eliminadas->count() > 0)
        @foreach($eliminadas as $noticia)
            <tr class="text-muted">
                <td>{!! $noticia->id !!}</td>
                <td>
                    <button type="button" class="btn-link text-left" title="{!! $noticia->titulo !!}" data-toggle="modal" data-target="#verNoticia{!! $noticia->id !!}">{!! str_limit($noticia->titulo, 60) !!}</button>
                    @include('noticias.verNoticiaModal')
                </td>
                <td>{!! $noticia->lecturas !!}</td>
                <td>
                    @if($noticia->tags != '')
                        <mark>{!! str_replace(',', ' - ', $noticia->tags) !!}</mark>
                    @else
                        <small>-- no hay tags --</small>
                    @endif
                </td>
                <td>{!! $noticia->categoria->descripcion !!}</td>
                <td>{!! $noticia->likes()->count() !!}</td>
                <td>{!! $noticia->fecha_noticia !!}</td>
                <td>{!! $noticia->fecha_noticia_eliminada !!}</td>
                <td class="text-center">
                    <a href="javascript:;" type="button" title="recuperar" data-toggle="modal" data-target="#recuperarNoticia{!! $noticia->id !!}"><i class="fa fa-medkit"></i></a>
                @include('noticias.partials.recuperarNoticiaModal')
                </td>
                <td class="text-center">
                    <a href="javascript:;" type="button" title="eliminar" data-toggle="modal" data-target="#noticia{!! $noticia->id !!}">
                        <i class="fa fa-trash text-danger"></i></a>
                    @include('noticias.partials.eliminarNoticiaModal')
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="10"><em class="fa fa-times-circle text-danger"></em> No hay noticias en la papelera.</td>
        </tr>
    @endif
    </tbody>
</table>
</div>
{{--<div class="col-sm-5">--}}
    {{--<div class="dataTables_info text-center" style="padding: 5px 20px" id="example1_info" role="status" aria-live="polite">--}}
        {{--@if($noticia->total_noticias_eliminadas == 0)--}}
            {{--<p>No hay ninguna noticia eliminada para mostrar</p>--}}
        {{--@endif--}}
    {{--</div>--}}
{{--</div>--}}
