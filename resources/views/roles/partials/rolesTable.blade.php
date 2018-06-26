<div>
    <div class="box-header">
        <h3 class="box-title">Roles</h3>
    </div>
    <div class="box-body no-padding">
        <table class="table table-condensed">
            <tr>
                <th style="width: 10px">#</th>
                <th>Rol</th>
                <th>Descripción</th>
                <th>Nivel</th>
                <th>Permisos asignados</th>
                <th></th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>{!! $role->id !!}</td>
                    <td>{!! $role->name !!}</td>
                    <td>{!! $role->description !!}</td>
                    <td style="text-align: center">{!! $role->level !!}</td>
                    <td>
                        <ul>
                            <li>Primer permiso</li>
                            <li>Segundo permiso</li>
                            <li>Tercer permiso</li>
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('roles.editar', [$role->id]) }}" title="Editar"><span class="fa fa-edit btn btn-info btn-xs"></span></a>
                        <button type="button" title="Eliminar" class="glyphicon glyphicon-trash btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarRol{!! $role->id !!}" style="border: none"></button>
                    @include('roles.partials.roleModal')<!--VENTANA MODAL-->
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

