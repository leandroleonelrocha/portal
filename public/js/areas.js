// Funciones
function onInitialize() {

    $('#areas').select2({
        allowClear: true,
        language: 'es',
        ajax: {
            url: 'ws/areas/search',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                    page: params.page
                };
            },
            processResults: function (data, params) {
                return {
                    results: data.results,
                    pagination: {
                        more: data.metadata.resultset.count <= 10
                    }
                };
            },
            cache: true
        },
        minimumInputLength: 3,
        templateResult: templateResultArea,
        templateSelection: templateSelectionArea
    });

    $('.selectDos').on('change', function(){
        var nombre = $('.select2-selection__rendered:first').text().substring(1);
        $('#area_nombre').val(nombre);
    });

}

function templateResultArea(item) {
    if (! item.id) return item.text;

    return $('<span><strong>' + item.nombre + '</strong><br /><small>' + item.parent.nombre + '<br />' + item.organismo.nombre + '</small></span>');
}

function templateSelectionArea(item) {
    return (! item.nombre) ? item.text : item.nombre;
}

// Interacciones
$(document).on('ready', onInitialize);
