<ul class="list-group">
    @foreach($contactos as $contacto)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <img class="img-thumbnail" src="{!! $contacto->imagenThumb !!}" alt="Foto de perfil" style="width: 100px">
                    </div>
                    <div class="panel-body col-lg-10 col-md-9 col-sm-9">
                        <ul class="list-unstyled">
                            <li class="lead" style="margin: 0px">{!! $contacto->fullname !!}</li>
                            <li>Area:
                                @if($contacto->area != null)
                                    <a href="{{ route('protocolo.datosArea', $contacto->area->id) }}">{!! $contacto->area->nombre !!}</a>
                                @else
                                    <small class="text-muted">- aún no ingresada -</small>
                                @endif
                            </li>
                            <li>Sede:
                                @if($contacto->sede != null)
                                <a href="{{ route('protocolo.showSede', $contacto->sede->id) }}">{!! $contacto->sede->nombre !!}</a>
                                @else
                                    <small class="text-muted">- aún no ingresada -</small>
                                @endif
                            </li>
{{--                            <li>Teléfono: {!! $contacto->telefono !!}</li>--}}
                            <li>Email: {!! $contacto->email !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>