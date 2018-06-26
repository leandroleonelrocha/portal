<div class="modal fade modal-info" id="recuperarNoticia{!! $noticia->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning "></i>Recuperar noticia</h4>
            </div>
            <div class="modal-body">
                <p>Usted está a punto de recuperar la noticia (Id: {!! $noticia->id !!})<br>
                   La misma volverá a publicarse.
                </p>
                <p>¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                {!! Form::open(['route'  => ['noticias.restore', $noticia->id],
                                'method' => 'put']) !!}
                <button type="submit" class="btn btn-outline">Recuperar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
