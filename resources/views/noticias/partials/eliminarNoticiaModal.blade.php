@if($noticia->deleted_at != null)
{{-- Crea ventana modal para eliminar noticia definitivamente --}}

<div class="modal fade modal-danger" id="noticia{!! $noticia->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning "></i> Eliminar noticia</h4>
            </div>
@else

{{-- Crea ventana modal para enviar noticia a papelera de reciclaje --}}

<div class="modal fade modal-warning" id="noticia{!! $noticia->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning "></i> Enviar noticia a papelera de reciclaje</h4>
            </div>
@endif
            <div class="modal-body">
                <p>
                    @if($noticia->deleted_at != null)
                        Usted está a punto de eliminar la noticia (Id: {!! $noticia->id !!}) definitivamente.<br>
                        Si la elimina ya no podrá recuperarla.
                    @else
                        Usted está a punto de enviar la noticia (Id: {!! $noticia->id !!}) a la papelera de reciclaje.
                    @endif
                </p>
                <p>¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                {!! Form::open(['route'  => ['noticias.editar', $noticia->id],
                                'method' => 'delete']) !!}
                <button type="submit" class="btn btn-outline">
                    @if($noticia->deleted_at != null)
                    Eliminar
                    @else
                    Enviar
                    @endif
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
