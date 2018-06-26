@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="row">
        <div class="box box-body" id="navbar">
            <div class="col-lg-12">
                <h2>Barra de navegación</h2>
                <p class="lead">Configuración de los items de la barra de navegación.</p>
            </div>
            <div class="col-lg-12">

                <div class="box box-primary panel-body">

                    <h3>Orden <small>(Siempre podrá volver a modificarlo en esta misma sección)</small></h3>
                    <div class="panel-body bg-info small" style="margin-bottom: 10px">
                        <p><i class="fa fa-arrows"></i> Arrastre y suelte los botones para darles un nuevo orden en la barra de navegación.</p>
                        <p><i class="fa fa-check-square-o"></i> Seleccione si desea habilitar o deshabilitar items de la barra de navegación.</p>
                    </div>

                    <ul class="list-group">{{--  LISTADO DE RUTAS CON ERRORES  --}}
                        @foreach($navbar as $item)
                            @if($item->rutaIncorrecta == true)
                                <li class="list-group-item alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-warning"></i> El item <code>{!! $item->nombre !!}</code> no se está mostrando porque hay un problema con su ruta.
                                </li>
                            @endif
                        @endforeach
                    </ul>

                    {!! Form::open(['method' => 'post', 'url' => route('navbar.change'), 'class' => 'form']) !!}
                    <ul class="nav navbar-nav col-lg-12 col-md-12 col-sm-12 col-xs-8" id="sortable" style="height: 100%">
                        @foreach($navbar as $item)
                            @if($item->rutaIncorrecta == true)
                                <li class="list-group-item" id="{!! $item->orden !!}" style="background-color: #8bbdda; border-color: red; color: white;cursor: move">
                                {!! Form::checkbox('habilitado[]', $item->id,true) !!}

                            @elseif($item->habilitado == '1')

                                <li class="list-group-item" id="{!! $item->orden !!}" style="background-color: #3c8dbc; color: white; cursor: move">
                                {!! Form::checkbox('habilitado[]',$item->id,true) !!}

                            @else

                                <li class="list-group-item" id="{!! $item->orden !!}" style="background-color: #8bbdda; color: #d8e9f3; cursor: move">
                                {!! Form::checkbox('habilitado[]',$item->id,false) !!}

                            @endif
                                {!! $item->nombre !!}
                            </li>
                        @endforeach
                    </ul>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-4" style="margin-top: 5px; padding: 0px">
                    {!! Form::submit('Aplicar', ['class' => 'btn bg-navy']) !!}
                    <button type="button" disabled="disabled" id="restaurar" class="btn btn-default" >Deshacer</button>
                    </div>
                </div>

                <div class="box box-primary panel-body">

                    <h3>Descripción y ruta/enlace</h3>
                    {{--<div class="panel-body bg-info small" style="margin-bottom: 10px">--}}
                        {{--<p><i class="fa fa-pencil"></i> Escriba un nuevo texto si desea modificarlo.</p>--}}
                    {{--</div>--}}

                    <div class="table-responsive" id="rutasEnlaces">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Ruta / Enlace</th>
                                <th>Barra de dirección</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ruta in rutas" is="rutas-row" :ruta.sync="ruta"></tr>
                                <tr>
                                    <td><input type="text" class="form-control" v-model="nueva_ruta.nombre" v-on:keyup="checkKey" id="txt-nueva-ruta-nombre"></td>
                                    <td><input type="text" class="form-control" v-model="nueva_ruta.ruta" v-on:keyup="checkKey"></td>
                                    <td><input type="text" class="form-control" v-model="nueva_ruta.direccion" v-on:keyup="checkKey"></td>
                                    <td class="text-right">
                                        <a href="#" v-on:click.prevent="createRuta()" v-bind:disabled="emptyInputs" class="btn btn-success btn-block">
                                            <em class="fa fa-plus"></em>
                                            Agregar
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <template id="rutas-row-tmpl">
                        <tr>
                            <template v-if="! editing">
                                <td>@{{ ruta.nombre }}</td>
                                <td>@{{ ruta.ruta }}</td>
                                <td>@{{ ruta.direccion }}</td>
                                <td>
                                    <a href="javascript:;" role="button" v-on:click.prevent="edit()" title="editar">
                                        <i class="fa fa-edit"></i></a>
                                    <a v-if="ruta.id != null" href="javascript:;" class="pull-right" role="button" title="eliminar" data-toggle="modal" data-target="#myModal@{{ ruta.id }}">
                                        <i class="fa fa-trash-o text-danger"></i></a>
                                    <a v-else href="javascript:;" class="pull-right" role="button" v-on:click.prevent="removeRuta()">
                                        <i class="fa fa-times-circle"></i></a>

                                <!-- MODAL -->
                                    <div class="modal fade modal-danger" id="myModal@{{ ruta.id }}"tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Eliminar ruta</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Usted está a punto de eliminar la ruta: <br><code>"@{{ ruta.nombre }}"</code></p>
                                                    <p>Si la elimina ya no podrá recuperarla.</p>
                                                    <p>¿Desea continuar?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                                                    {!! Form::open(['route'  => ['navbar.destroy', ],'method' => 'DELETE']) !!}
                                                        <input v-bind:value="ruta.id" name="idRuta" type="hidden">
                                                        <button type="submit" class="btn btn-outline">Eliminar</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- FIN MODAL --}}
                                </td>

                            </template>

                            <template v-else>
                                <td><input type="text" class="form-control" v-model="ruta.nombre"></td>
                                <td><input type="text" class="form-control" v-model="ruta.ruta"></td>
                                <td><input type="text" class="form-control" v-model="ruta.direccion"></td>
                                <td>
                                    <a href="javascript:;" role="button" v-on:click.prevent="update()">
                                        Guardar
                                    </a>
                                </td>
                            </template>

                        </tr>
                    </template>
                    <div class="panel-body bg-info">
                        <i class="fa fa-exclamation-triangle"></i>
                        <small>Las rutas nuevas deben comenzar con 'http' o 'https'. De lo contrario serán almacenadas como rutas incorrectas.</small><br>
                    </div>
                    <input type="hidden" name="rutas" id="rutas_nombres" data-old="{{ $rutas }}">

                </div>


            </div>
            <div class="footer">
                <div class="panel-body">
                {!! Form::hidden('order',null,['id' => 'order']) !!}
                {!! Form::submit('Guardar cambios', ['class' => 'btn bg-navy']) !!}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

    {{--<pre>@{{ $data | json }}</pre>--}}


@endsection


@section('js')

    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="{{ asset('plugins/vuejs/vue.js') }}"></script>
    <script type="text/javascript">
        var unOrderedList = $("#sortable").html();
        var listRutas = '{!! $navbar !!}';
        var rutas_nombres = $("#rutas_nombres").val();
        console.log(rutas_nombres);
        var vm = '';


        function onInitialize() {

            Vue.component('rutas-row', {
                template: '#rutas-row-tmpl',
                props: ['ruta'],
                data: function() {
                    return {
                        editing: false
                    }
                },
                methods: {
                    edit: function() {
                        this.editing = true;
                        $('#rutas_nombres').val(JSON.stringify(vm.rutas));
                    },
                    update: function() {
                        this.editing = false;
                        $('#rutas_nombres').val(JSON.stringify(vm.rutas));
                    },
                    removeRuta: function(){
                        vm.rutas.pop();
                    },
                }
            });

            arrRutas = $('#rutas_nombres').data('old');

            vm = new Vue({
                el: 'body',
                data: {
                    nueva_ruta: {
                        nombre: '',
                        ruta: '',
                        direccion: ''
                    },
                    rutas: arrRutas
                },
                methods: {
                    createRuta: function() {
                        if(this.nueva_ruta.nombre == '' || this.nueva_ruta.ruta == ''){
                            return;
                        }
                        this.rutas.push(this.nueva_ruta);
                        this.nueva_ruta = {nombre: '', ruta: '', direccion: ''};
                        $('#txt-nueva-ruta-nombre').focus();
                        $('#rutas_nombres').val(JSON.stringify(vm.rutas));
                    },
                    checkKey: function (e) {
                        var keyCode = e.which;
                        if (keyCode == 13)
                            this.createRuta();
                    }
                },
                watch: {
                    rutas: function (val) {
                        $('#rutas_nombres').val(JSON.stringify(val));
                    }
                }
            });
            $('#rutas_nombres').val(JSON.stringify(vm.rutas));//ACTUALIZA RUTAS


            //SORTABLE

            $("#sortable").sortable({
                update: function(event, ui) {
                    $('#restaurar').removeAttr('disabled');
                    var itemOrder = $(this).sortable('toArray');
                    $('#order').val(itemOrder);
                }
            });

            $("#sortable").disableSelection();
        }

        function restaurarDragDrop() {
            $("#sortable").html(unOrderedList);
            $("#sortable").sortable("refreshPositions");
            var itemOrder = $("#sortable").sortable('toArray');
            $('#order').val(itemOrder);
        }


        $(document).on('ready', onInitialize);

        $("#restaurar").click(restaurarDragDrop);

    </script>

@endsection