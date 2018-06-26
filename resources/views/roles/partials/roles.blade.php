<div class="row">
    <div class="col-lg-5">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="box-title">Roles disponibles</h4>
            </div>
            <div class="box-body">
                @if(isset($roles))
                    <i class="fa fa-info-circle"></i>
                    <small class="text-muted">Haga click en un rol para asignarle permisos o editarlo</small>
                    <ul class="list-group">
                        @foreach($roles as $role)
                            <li class="list-group-item" style="padding: 0px">
                                <button type="button" title="Eliminar" class="pull-right btn-box-tool" data-toggle="modal" data-target="#eliminarRol{!! $role->id !!}" style="border: none">
                                    <i class="fa fa-trash-o"></i></button>
                                <a href="{{ route('roles.permisos', $role->id) }}" style="display: block; padding: 10px 20px; margin: 0px">
                                    <strong>{!! $role->name !!} - </strong>Nivel {!! $role->level !!}<br>
                                    <small>{!! $role->description !!}</small>
                                </a>
                            </li>
                            @include('roles.partials.roleModal')<!--VENTANA MODAL-->
                        @endforeach

                    </ul>

                @else
                    <div class="callout callout-info">
                        <p>Todavía no hay ningún rol creado</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="box-title">Agregar nuevo rol</h4>
            </div>
            <div class="box-body">
                {!! Form::open(['method'=>'POST', 'url' => route('roles.nuevo'), 'class' => 'form']) !!}
                <div class="box-body">
                    {!! Form::label('name', 'Nombre del rol') !!}
                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::text('description',null, ['class' => 'form-control']) !!}
                    {!! Form::label('level', 'Nivel (de 1 a 10)') !!}
                    {!! Form::number('level',null, ['class' => 'form-control', 'min' => '1', 'max' => '10']) !!}
                    <i class="fa fa-info-circle"></i>
                    <small class="text-muted">
                        El nivel por defecto de todos los roles es 1. Modifique el nivel si desea asignar permisos diferentes.
                    </small>
                </div>
                <div class="box-footer">
                    {!! Form::submit('+ Agregar rol',['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
