<div class="box box-primary">

    <div class="box-header with-border">
        <a href="{{ route('protocolo.datosArea', $area->parent->id) }}" style="display: block">{!! $area->parent->nombre !!}</a>
        <h2 class="box-title" style="font-size: 1.5em">{!! $area->nombre !!} <small>({!! $area->siglas !!})</small></h2>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-2 col-md-3 col-sm-3" style="padding-top: 20px">
                    <img class="img-thumbnail" src="{!! $area->contacto->imagenThumb !!}" alt="Foto de perfil" style="width: 100px">
                </div>
                <div class="panel-body col-lg-10 col-md-9 col-sm-9">
                    <ul class="list-unstyled">
                        <li class="lead" style="margin-bottom: 0px">{!! $area->contacto->fullname !!}</li>
                        <li>{!! $area->responsable->cargo->nombre !!}</li>
                        <li>{!! $area->contacto->email !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="box-footer">

        <ul class="list-inline">

            @foreach($area->oficinas as $oficina)

                <li class="col-lg-6 col-md-6 text-muted" style="padding: 10px 5px 10px 10px; border-left: 5px solid #eee">
                    <ul class="list-unstyled">
                        <li><strong>{!! $oficina->nombre !!}</strong></li>
                        <li>{!! $oficina->responsable->nombre !!}</li>
                        <li>
                            <a href="{{ route('protocolo.showSede', $oficina->sede->id) }}" title="ver dirección">{!! $oficina->sede->nombre !!} ({!! $oficina->sede->siglas !!})</a>
                        </li>
                        <li>piso {!! $oficina->piso !!}</li>
                        <li>{!! $oficina->telefono !!}</li>
                    </ul>
                </li>

            @endforeach

        </ul>

    </div>


</div>