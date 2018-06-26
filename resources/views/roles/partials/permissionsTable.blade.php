<table class="table table-condensed">
    <tr>
        <th>Permisos de noticias</th>
        <th>Permisos de documentos</th>
    </tr>
    @foreach($permisosNoticias as $permiso)
        <tr>
            <td>
                <span style="margin-right: 5px">
                    {!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked) !!}
                </span>
                <strong>{!! $permiso->name !!}</strong><br>
                <small>{!! $permiso->description !!}</small>
            </td>
        </tr>
    @endforeach
    @foreach($permisosDocumentos as $permiso)
        <tr>
            <td>
                <span style="margin-right: 5px">{!! Form::checkbox('permisos[]', $permiso->id, $permiso->checked) !!}</span>
                <strong>{!! $permiso->name !!}</strong><br>
                <small>{!! $permiso->description !!}</small>
            </td>
        </tr>
    @endforeach
</table>
