@if($documento->deleted_at != null)
{{-- Crea ventana modal para eliminar el documento definitivamente --}}

<div class="modal fade modal-danger" id="documento{!! $documento->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning "></i> Eliminar documento</h4>
            </div>
@else

{{-- Crea ventana modal para quitar el documento de la lista de documentos --}}

<div class="modal fade modal-warning" id="documento{!! $documento->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning "></i> Quitar documento de la lista</h4>
            </div>
@endif
            <div class="modal-body">
                <p>
                    @if($documento->deleted_at != null)
                        Usted está a punto de eliminar devinitivamente el documento: <br>
                        "{!! $documento->descripcion !!}" / Código: {!! $documento->codigo !!}<br>
                        Si lo elimina ya no podrá recuperarlo.
                    @else
                        Usted está a punto de quitar de la lista el documento: <br>
                        "{!! $documento->descripcion !!}" / Código: {!! $documento->codigo !!}.<br>
                        Si desea, más tarde podrá recuperarlo.
                    @endif
                </p>
                <p>¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                {!! Form::open(['route'  => ['documento.eliminar', $documento->id],
                                'method' => 'delete']) !!}
                <button type="submit" class="btn btn-outline">
                    @if($documento->deleted_at != null)
                        Eliminar
                    @else
                        Quitar
                    @endif
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
