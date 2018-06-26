@extends('base')

@section('navbar-panel-control')

    @include('partials.navbarPanelControl')

@endsection

@section('panel-control')

    <div class="box panel-body">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="box box-primary panel-body">
                    <div class="box-header">
                        <h4>Cambiar rol de <strong>{!! $user->fullname !!}</strong> a:</h4>
                    </div>
                    {!! Form::open(['method' => 'POST', 'url' => route('users.updateRole', $user->id), 'class' => 'form']) !!}
                    <ul class="list-group">
                        @foreach($roles as $role)
                            @if($role->checked == true)
                                <li class="list-group-item text-aqua">
                                    {!! Form::label('role'.$role->id, $role->name) !!} (rol actual)
                            @else
                                <li class="list-group-item">
                                    {!! Form::label('role'.$role->id, $role->name) !!}
                            @endif
                                    {!! Form::radio('role', $role->id, $role->checked, ['class' => 'pull-right', 'id' => 'role'.$role->id]) !!}
                                </li>
                        @endforeach
                    </ul>
                    <button type="submit" class="btn btn-primary">Cambiar</button>
                    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
