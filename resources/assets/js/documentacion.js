// Global Scope
var slArea = $('#sl-area');
var areaNombre = $('#area_nombre');

// Funciones
function onInitialize() {

    slArea.select2({
        language: 'es',
        ajax: {
            url: 'ws/areas/search',
            dataType: 'json',
            language: 'es',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page
                };
            },
            processResults: function (data, params) {
                return {
                    results: data.results,
                    pagination: {
                        more: data.metadata.resultset.count >= 10
                    }
                }
            },
            cache: true
        },
        minimumInputLength: 1,
        templateResult: templateResultArea,
        templateSelection: templateSelectionArea
    });

}

function templateResultArea(item) {
    if (! item.id) return item.text;

    return $('<span><strong>' + item.nombre + '</strong><br /><small>' + item.parent.nombre + '</small></span>');
}

function templateSelectionArea(item) {
    if (! item.nombre) {
        areaNombre.val('');
        return item.text;
    } else {
        areaNombre.val(item.nombre);
        return item.nombre
    }
}

// Interacciones
$(document).on('ready', onInitialize);
