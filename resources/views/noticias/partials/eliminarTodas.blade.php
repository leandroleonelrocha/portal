<div class="modal fade modal-danger" id="eliminarTodas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning "></i> Eliminar noticias</h4>
            </div>
            <div class="modal-body">
                <p>Usted está a punto de ELIMINAR TODAS las noticias DEFINITIVAMENTE. Si las elimina ya no podrá recuperarlas.</p>
                <p>¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                {!! Form::open(['route'  => ['noticias.eliminarTodas'],
                                'method' => 'delete']) !!}
                <button type="submit" class="btn btn-outline">Eliminar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
