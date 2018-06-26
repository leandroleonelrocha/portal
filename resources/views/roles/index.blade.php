@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="row">
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">
                    Roles y permisos <small>Administración de roles y permisos del sistema.</small>
                </h4>
            </div>
            <div class="box-body">

                @include('roles.partials.roles')

            </div>
        </div>
    </div>

@endsection

