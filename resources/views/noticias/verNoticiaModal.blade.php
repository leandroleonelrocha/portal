<div class="modal fade modal-default" id="verNoticia{!! $noticia->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Visualización noticia</h4>
            </div>
            <div class="modal-body">

                @include('noticias.noticia')

            </div>
        </div>
    </div>
</div>
