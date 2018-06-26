@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="box box-default">

        @include('roles.partials.permissions')

    </div>

@endsection
