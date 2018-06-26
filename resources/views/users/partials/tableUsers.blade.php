<table class="table table-hover">
    <thead style="background-color: lightgrey">
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->id !!}</td>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->fullname !!}</td>
            <td>{!! $user->email !!}</td>
            <td>
                <a href="{{ route('users.changeRol', $user->id) }}" title="Cambiar rol">{!! $user->role_name !!}</a>
            </td>
            <td>
                <a href="{{ route('users.permisos', $user->id) }}" title="permisos de usuarios" class="btn btn-default btn-xs btn-flat">Permisos</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
