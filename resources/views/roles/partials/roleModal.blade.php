<div class="modal fade modal-danger" id="eliminarRol{!! $role->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning "></i> Eliminar rol</h4>
            </div>
            <div class="modal-body">
                <p>
                    Usted está a punto de eliminar el rol de '{!! $role->name !!}' devinitivamente<br>
                    Al hacerlo puede ocasionar problemas al sistema.
                </p>
                <p>¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                {!! Form::open(['route'  => ['roles.eliminar', $role->id], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-outline">Eliminar de todos modos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
