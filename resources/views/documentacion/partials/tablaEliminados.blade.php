<table class="table table-bordered table-striped ">
    <thead style="background-color: lightgrey">
    <tr>
        <th>Id</th>
        <th>Descripción</th>
        <th>Código</th>
        <th>Área</th>
        <th>Categoría</th>
        <th>Fecha publicación</th>
        <th>Fecha eliminación</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if ($eliminados->count() > 0)
        @foreach($eliminados as $documento)
            <tr class="text-muted">
                <td>{!! $documento->id !!}</td>
                <td>{!! $documento->descripcion !!}</td>
                <td>{!! $documento->codigo !!}</td>
                <td>{!! $documento->area_nombre !!}</td>
                <td>{!! $documento->categorias_documentos->descripcion !!}</td>
                <td>{!! $documento->fecha_documento !!}</td>
                <td>{!! $documento->fecha_documento_eliminado !!}</td>
                <td>
                    <a href="javascript:;" title="recuperar" data-toggle="modal" data-target="#recuperarDocumento{!! $documento->id !!}">
                        <i class="fa fa-medkit"></i></a>
                    @include('documentacion.partials.recuperarDocumentoModal')

                    <a href="javascript:;" title="eliminar" class="pull-right" data-toggle="modal" data-target="#documento{!! $documento->id !!}">
                        <i class="fa fa-trash text-danger"></i> </a>
                    @include('documentacion.partials.eliminarDocumentoModal')
                </td>
            </tr>
        @endforeach
    @else
        <tr><td colspan="8"><em class="fa fa-times-circle text-danger"></em> No hay documentación en la papelera.</td></tr>
    @endif
    </tbody>
</table>
