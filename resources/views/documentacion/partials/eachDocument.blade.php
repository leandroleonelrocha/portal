<li class="list-group-item col-lg-12">
    <div class="post">
        <div class="user-block">
            <i class="fa {!! $documento->iClass !!} fa-3x pull-left"></i>
            <span class="description">
                {!! $documento->categorias_documentos->descripcion !!}
                <button type="button" title="Quitar de la lista" class="pull-right btn-box-tool" data-toggle="modal" data-target="#documento{!! $documento->id !!}" style="border: none">
                <i class="fa fa-times"></i></button>
                @include('documentacion.partials.eliminarDocumentoModal')<!--VENTANA MODAL-->
            </span>
            <span class="username">
                <a href="{{ route('documento.visualizar', $documento->id) }}" target="_blank">{!! $documento->descripcion !!}</a>
            </span>
        </div>
        <p>
            <strong>Área: </strong>{!! $documento->area_nombre !!}<br>
            <strong>Código: </strong>{!! $documento->codigo !!}
        </p>
        <ul class="list-inline">
            <li>
                <a href="{{ route('documento.visualizar', $documento->id) }}" class="text-light-blue text-sm" target="_blank">
                <i class="fa fa-download margin-r-5"></i>Visualizar</a>
            </li>
            @role('admin')
            <li>
                <a href="{{ route('documento.editar', $documento->id) }}" class="text-light-blue text-sm">
                <i class="fa fa-edit margin-r-5"></i>Editar</a>
            </li>
            @endrole
            <li>
                <a href="{{ route('documento.favorito', $documento->id) }}" class="text-light-blue text-sm">
                <i class="{!! $documento->favorito_class !!} margin-r-5"></i>Favorito</a>
            </li>
        </ul>
    </div>
</li>
<script type="text/javascript">
    var documentoId = '{{ $documento->id }}';
</script>