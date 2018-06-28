<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Portal-<b>MDS</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">

                    @foreach($navbar as $item)

                        @if($item->habilitado == '1' && $item->rutaIncorrecta == false)

                            @if(starts_with($item->ruta, 'http'))
                                <li><a href="{!! $item->ruta !!}" target="_blank">{!! $item->nombre !!}</a></li>
                            @else
                                <li {{ (Request::is($item->direccion.'*') ? 'class=active' : '') }}>
                                    <a href="{{ route($item->ruta) }}">{!! $item->nombre !!}<span class="sr-only">(current)</span></a>
                                </li>
                            @endif

                        @endif

                    @endforeach

                    @role('admin')

                        <li>
                            <a href="{{ route('noticias.index') }}" title="Panel administrador"><i class="fa fa-cogs"></i></a>
                        </li>

                    @endrole

                </ul>
            </div>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{!! auth()->user()->imagen_thumb !!}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{!! auth()->user()->fullname !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{!! auth()->user()->imagen !!}" class="img-circle" alt="User Image">
                                <p>{!! auth()->user()->fullname !!}</p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{!! env('SSO_MDS_URL') !!}" class="btn btn-default btn-flat">Mi cuenta</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('auth.logout')}}" class="btn btn-default btn-flat">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>