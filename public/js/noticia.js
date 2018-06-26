//Scope
var vm = '';

// Funciones
function onInitialize()
{
    vm = new Vue({
        el: 'body',
        data: {
            likes: 0,
            ownLike: false,
            buttonTitle: 'Me gusta'
        },
        methods: {
            setLike: function(verb) {
                var url = 'ws/noticias/like';
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        nid: noticiaId
                    }
                })
                    .done(getLikes);
            }
        }
    });

    getLikes();
}

function getLikes()
{
    var url = 'ws/noticias/likes?nid=' + noticiaId;

    $.getJSON(url, [], function(data) {

        vm.likes = data['likes'];
        vm.ownLike = data['ownLike'];
        vm.buttonTitle = (vm.ownLike) ? 'Ya no me gusta' : 'Me gusta';

    });
}

// Interacciones
$(document).on('ready', onInitialize);