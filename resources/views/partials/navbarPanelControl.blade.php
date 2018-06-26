<div class="box box-solid" style="padding: 0px; margin: 0px">
<nav class="navbar navbar-static-top navbar-inverse bg-navy" style="margin: 0px">
    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
        <i class="fa fa-angle-double-up"></i></button>
    </div>
    <div class="container">

        <div class="collapse navbar-collapse pull-left " id="navbar-collapse">

            <ul class="nav navbar-nav">
                <li {{ (Request::is('noticias/*') ? 'class=active' : '') }} class="small"><a href="{{ route('noticias.index') }}">NOTICIAS</a></li>
                <li {{ (Request::is('documentacion/panel-control') ? 'class=active' : '') }} {{ (Request::is('eliminados') ? 'class=active' : '') }} class="small"><a href="{{ route('documentacion') }}">DOCUMENTACION</a></li>
                <li {{ (Request::is('users*') ? 'class=active' : '') }} class="small"><a href="{{ route('users.index') }}">USUARIOS</a></li>
                <li {{ (Request::is('roles*') ? 'class=active' : '') }} class="small"><a href="{{ route('roles.index') }}">ROLES Y PERMISOS</a></li>
                <li {{ (Request::is('navbar') ? 'class=active' : '') }} class="small"><a href="{{ route('navbar.index') }}">BARRA DE NAVEGACION</a></li>
                <li class="small {{ (Request::is('multimedia') ? 'active' : '') }}"><a href="{{ route('multimedia.index') }}">MULTIMEDIA</a></li>
            </ul>

        </div>

    </div>

</nav>
</div>