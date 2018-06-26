@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')
<div class="box box-default">
    <div class="box-header with-border">
        <h4 class="box-title">Nuevo Documento</h4>
    </div>
    <div class="box-body">
        <h4>Elija el tipo de documento:</h4>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('documentacion.nuevoDoc', ['text']) }}">
                    <em class="fa fa-file-pdf-o text-danger"></em>
                    Documento de texto (PDF/ Word)
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('documentacion.nuevoDoc', ['link']) }}">
                    <em class="fa fa-link text-black"></em>
                    Link (URL)
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('documentacion') }}">
                    <em class="fa fa-ban text-black"></em>
                    Cancelar
                </a>
            </li>
        </ul>
    </div>
</div>

@endsection
