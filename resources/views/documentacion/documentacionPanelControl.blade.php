@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')
    <div class="row">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="box-title">Documentación</h4>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        {!! Form::text('search', null, ['class' => 'form-control']) !!}
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default btn-flat">
                                <em class="fa fa-search"></em>
                                Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">
                                        <em class="fa fa-list"></em>
                                        Publicados
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">
                                        <i class="fa fa-recycle text-maroon"></i> Papelera
                                    </a>
                                </li>
                                <li class="pull-right">
                                    <a href="{!! route('documentacion.nuevo') !!}" title="Publicar nueva noticia">
                                        <em class="fa fa-plus-circle text-primary"></em>
                                        Nuevo Documento
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div id="tab1" class="tab-pane active table-responsive">
                                    @include('documentacion.partials.tablaDocumentacion')
                                </div>

                                <div id="tab2" class="tab-pane table-responsive">
                                    @include('documentacion.partials.tablaEliminados')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection