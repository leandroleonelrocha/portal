@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="row">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="box-title">Usuarios</h4>
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
            <div class="box-body table-responsive">
                @include('users.partials.tableUsers')
            </div>
        </div>
    </div>


@endsection
