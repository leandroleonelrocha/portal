//Scope
var vmf = '';

// Funciones
function onInitialize()
{
    vmf = new Vue({
        el: 'body',
        data: {
            favorito: 0,
            ownFavorite: false
        },
        methods: {
            setFavorito: function(verb) {
                var url = 'ws/documentacion/favorito';

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        nid: documentoId
                    }
                })
                    .done(getFavoritos);
            }
        }
    });

    getFavoritos();
}

function getFavoritos()
{
    var url = 'ws/documentacion/favorito?nid=' + documentoId;

    $.getJSON(url, [], function(data) {

        vmf.favorito = data['favorito'];
        vmf.ownFavorite = data['ownFavorite'];

    });
}

// Interacciones
$(document).on('ready', onInitialize);