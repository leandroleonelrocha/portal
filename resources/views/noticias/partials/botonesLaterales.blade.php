
<a href="{{ route('noticias.editar', $noticia->id) }}" class="btn btn-default fa fa-edit" style="margin-bottom: 5px; width: 38px"></a>

<button
    type="button"
    id="like"
    class="btn fa fa-thumbs-o-up"
    v-bind:class="{'btn-info': ownLike, 'btn-default': !ownLike}"
    v-on:click="setLike()"
    title="Me gusta">
</button>

