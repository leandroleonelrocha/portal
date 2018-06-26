<table class="table table-bordered table-striped" aria-describedby="example2_info">
    <thead style="background-color: lightgrey">
        <tr>
            <th>Id</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Área</th>
            <th>Categoría</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if ($documentos->count() > 0)
            @foreach($documentos as $documento)
                <tr>
                    <td>{!! $documento->id !!}</td>
                    <td>{!! $documento->codigo !!}</td>
                    <td>{!! $documento->descripcion !!}</td>
                    <td>{!! $documento->area_nombre !!}</td>
                    <td>{!! $documento->categorias_documentos->descripcion !!}</td>
                    <td>
                        <a href="{{ route('documento.editar', $documento->id) }}"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" title="Quitar de la lista" class="pull-right" data-toggle="modal" data-target="#documento{!! $documento->id !!}" style="border: none">
                            <i class="fa fa-trash text-danger"></i></a>
                        @include('documentacion.partials.eliminarDocumentoModal')
                    </td>
                </tr>
            @endforeach
        @else
            <tr><td colspan="6"><em class="fa fa-times-circle text-danger"></em> No hay documentación para mostrar</td></tr>
        @endif
    </tbody>
</table>
