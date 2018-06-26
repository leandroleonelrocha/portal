<div class=" panel-body">
    <div class="box-header with-border">
        <a href="{{ route('roles.index') }}" class="btn btn-primary btn-xs "><< atrás</a>
        <h3 style="margin: 10px 0px 0px 0px">Rol: '{!! $role->name !!}'</h3>
        <small class="text-muted">( {!! $role->description !!} ) de nivel {!! $role->level !!}</small>
    </div>
    <div class="nav-tabs-custom" style="margin-top: 20px">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#permisos" data-toggle="tab">Permisos</a>
            </li>
            <li>
                <a href="#editar" data-toggle="tab">Editar</a>
            </li>
            <li>
                <a href="#eliminarRol{!! $role->id !!}" class="text-red" data-toggle="modal" data-target="#eliminarRol{!! $role->id !!}" >Eliminar este rol</a>
                @include('roles.partials.roleModal')<!--VENTANA MODAL-->
            </li>
        </ul>
        <div class="tab-content">
            <div id="permisos" class="tab-pane active">
                <div class="row">
                    <div class="col-lg-12">
                        @if($hasPermissions == true)
                            <p>El rol <span class="resaltado">{!! $role->name !!}</span> tiene asignados los permisos marcados con un tilde.</p>
                        @else
                            <div class="callout callout-warning">
                                <p>Este rol todavía no tiene ningún permiso asignado.</p>
                            </div>
                        @endif
                        <p class="text-light-blue"><i class="fa fa-check-square-o"></i> selecciones los permisos que desea agregarle o quitarle a este rol:</p>
                    </div>

                    <div class="col-lg-6 center-block">
                        <h4>Permisos de Noticias</h4>
                        {!! Form::open(['method' => 'POST', 'url' => route('permisos.asignar', $role->id), 'class' => 'form']) !!}
                            <ul class="list-group">
                                @foreach($permisosNoticias as $permiso)
                                    <li class="list-group-item">
                                        <span style="margin-right: 5px">
                                            {!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked) !!}
                                        </span>
                                        <strong>{!! $permiso->name !!}</strong><br>
                                        <small>{!! $permiso->description !!}</small>
                                    </li>
                                @endforeach
                            </ul>
                    </div>

                    <div class="col-lg-6">
                        <h4>Permisos de Documentos</h4>

                        <ul class="list-group">
                            @foreach($permisosDocumentos as $permiso)
                                <li class="list-group-item">
                                    <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked) !!}</span>
                                    <strong>{!! $permiso->name !!}</strong><br>
                                    <small>{!! $permiso->description !!}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <h4>Permisos de Rol</h4>

                        <ul class="list-group">
                            @foreach($permisosRoles as $permiso)
                                <li class="list-group-item">
                                    <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked) !!}</span>
                                    <strong>{!! $permiso->name !!}</strong><br>
                                    <small>{!! $permiso->description !!}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <h4>Permisos de Navbar</h4>

                        <ul class="list-group">
                            @foreach($permisosNavbar as $permiso)
                                <li class="list-group-item">
                                    <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked) !!}</span>
                                    <strong>{!! $permiso->name !!}</strong><br>
                                    <small>{!! $permiso->description !!}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <h4>Permisos de Usuario</h4>

                        <ul class="list-group">
                            @foreach($permisosUsuarios as $permiso)
                                <li class="list-group-item">
                                    <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked) !!}</span>
                                    <strong>{!! $permiso->name !!}</strong><br>
                                    <small>{!! $permiso->description !!}</small>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::submit('Asignar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
            <div id="editar" class="tab-pane">
                <div class="row">
                    <div class="col-lg-8 center-block">

                            {!! Form::model($role,['method'=>'POST', 'url' => route('roles.editar', $role->id), 'class' => 'form']) !!}
                            <div class="box-body">
                                {!! Form::label('name', 'Nombre del rol') !!}
                                {!! Form::text('name',null,['class' => 'form-control']) !!}
                                {!! Form::label('description', 'Descripción') !!}
                                {!! Form::text('description',null, ['class' => 'form-control']) !!}
                                {!! Form::label('level', 'Nivel (de 1 a 10)') !!}
                                {!! Form::number('level',null, ['class' => 'form-control', 'min' => '1', 'max' => '10']) !!}
                            </div>
                            <div class="box-footer">
                                {!! Form::submit('Aceptar',['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
