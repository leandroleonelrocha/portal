{{-- Errores --}}
<div class="row">
@if ($errors->count() > 0)
    <div class="alert alert-danger alert-dismissible col-lg-8  col-md-6 col-sm-6 col-xs-6 col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3" style="margin-top: 20px">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-warning"></i>
        Ha ocurrido un error:<br />
        @if ($errors->count() > 1)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
    </div>
@endif

{{-- Success --}}
@if (session()->has('msgOk') || isset($msgOk))

    <div class="alert alert-success alert-dismissible col-lg-8  col-md-6 col-sm-6 col-xs-6 col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3" style="margin-top: 20px">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-check"></i>
        @if (session()->has('msgOk'))
            {!! session('msgOk') !!}
        @else
            {!! $msgOk !!}
        @endif
    </div>

@endif
</div>