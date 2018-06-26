@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')


        <div class="row">
            <div class="box panel-body">
            <h2><small>Editar permisos de:</small><br> {!! $user->fullname !!} <small>/ rol '{!! $user->role_name !!}' /</small></h2>
            <p >Puede asignar o quitar permisos marcando o desmarcando el casillero.</p>
            <p class="text-yellow"><i class="fa fa-info-circle"></i>Los permisos predeterminados del rol no se pueden quitar. Si desea quitarlos, debería crear un nuevo rol.</p>
            <div class="col-lg-6 center-block">
                <h4>Permisos de Noticias</h4>

                {!! Form::open(['method' => 'POST', 'url' => route('users.asignarPermisos', $user->id), 'class' => 'form']) !!}
                <ul class="list-group">
                    @foreach($permisosNoticias as $permiso)
                        @if($permiso->disabled == 'disabled')
                            <li class="list-group-item text-muted">
                        @else
                            <li class="list-group-item">
                        @endif
                            <span style="margin-right: 5px">
                                {!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked, [$permiso->disabled]) !!}
                            </span>
                            <strong>{!! $permiso->name !!}</strong><br>
                            <small>{!! $permiso->description !!}</small>
                        @if($permiso->disabled == 'disabled')
                            <i class="fa fa-lock pull-right"></i>
                        @endif
                            </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-lg-6">
                <h4>Permisos de Documentos</h4>

                <ul class="list-group">
                    @foreach($permisosDocumentos as $permiso)
                        @if($permiso->disabled == 'disabled')
                            <li class="list-group-item text-muted">
                        @else
                            <li class="list-group-item">
                        @endif
                            <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked, [$permiso->disabled]) !!}</span>
                            <strong>{!! $permiso->name !!}</strong><br>
                            <small>{!! $permiso->description !!}</small>
                        @if($permiso->disabled == 'disabled')
                            <i class="fa fa-lock pull-right"></i>
                        @endif
                            </li>
                    @endforeach
                </ul>

            </div>

            <div class="col-lg-6">
                <h4>Permisos de Rol</h4>

                <ul class="list-group">
                    @foreach($permisosRoles as $permiso)
                        @if($permiso->disabled == 'disabled')
                            <li class="list-group-item text-muted">
                        @else
                            <li class="list-group-item">
                        @endif
                            <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked, [$permiso->disabled]) !!}</span>
                            <strong>{!! $permiso->name !!}</strong><br>
                            <small>{!! $permiso->description !!}</small>
                        @if($permiso->disabled == 'disabled')
                            <i class="fa fa-lock pull-right"></i>
                        @endif
                            </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-6">
                <h4>Permisos de Usuario</h4>

                <ul class="list-group">
                    @foreach($permisosUsuarios as $permiso)
                        @if($permiso->disabled == 'disabled')
                            <li class="list-group-item text-muted">
                        @else
                            <li class="list-group-item">
                        @endif
                            <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked, [$permiso->disabled]) !!}</span>
                            <strong>{!! $permiso->name !!}</strong><br>
                            <small>{!! $permiso->description !!}</small>
                        @if($permiso->disabled == 'disabled')
                            <i class="fa fa-lock pull-right"></i>
                        @endif
                            </li>
                    @endforeach
                </ul>
                {!! Form::hidden('user', 'true') !!}
                {!! Form::submit('Asignar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
            </div>


        </div>
        </div>


@endsection

