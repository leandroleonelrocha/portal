@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')
<div class="row">
    <div class="box box-default">
        <div class="box-header">
            <h4 class="box-title">Noticias</h4>
            <div class="box-tools">
                {!! Form::open(['method'=>'GET','url'=> route('noticias.buscar'),'class'=>'form','role'=>'search'])  !!}
                <div class="input-group input-group-sm" style="width: 300px;">
                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar noticia...']) !!}
                    <div class="input-group-btn">
                        <button class="btn btn-flat" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                {!! Form::close() !!}
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
                                    Publicadas
                                </a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab">
                                    <i class="fa fa-recycle text-maroon"></i> Papelera
                                </a>
                            </li>
                            <li class="pull-right">
                                <a href="{!! route('noticias.create') !!}" title="Publicar nueva noticia">
                                    <em class="fa fa-plus-circle text-primary"></em>
                                    Nueva Noticia
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div id="tab1" class="tab-pane active table-responsive">
                                @include('noticias.partials.tablaNoticias')
                            </div>

                            <div id="tab2" class="tab-pane table-responsive">
                                @include('noticias.partials.tablaEliminadas')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection