@extends('base')


@section('favoritos')

    @include('dashboard.partials.favoritos')

@endsection


@section('contenido')

    <div class="box box-primary">
        {{--<a href="{!! URL::previous() !!}" class="btn btn-primary btn-xs btn-flat"><i class="fa  fa-angle-double-left "></i> </a>--}}
        <div class="box-header with-border">
            <h2 class="box-title" style="font-size: 1.6em">{!! $sede->nombre !!} <small>{!! $sede->organismo->nombre !!}</small></h2>
            <address style="margin-bottom: 0px">
                {!! $sede->geolocalizacion->calle !!}
                {!! $sede->geolocalizacion->numero !!},
                {!! $sede->geolocalizacion->ciudad !!},
                {!! $sede->geolocalizacion->provincia !!}
                @if($sede->geolocalizacion->codigoPostal != '')
                    ({!! $sede->geolocalizacion->codigoPostal !!})
                @endif.
            </address>
        </div>

        <div class="box-body">

            <div id="googleMap" style="width:100%;height:400px;" data-gmapping-lat='{!! $sede->geolocalizacion->latitud !!}' data-gmapping-lng='{!! $sede->geolocalizacion->longitud !!}'></div>

        </div>

    </div>


@endsection


@section('sidebar')

    @include('sidebar.sidebar')

@endsection


@section('js')

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY', '') }}"></script>

    <script>

        function myMap() {
            var dataLat = $('#googleMap').data('gmapping-lat');
            var dataLng = $('#googleMap').data('gmapping-lng');

            var mapProp= {
                center:new google.maps.LatLng(dataLat, dataLng),
                zoom: 15,
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            var marker = new google.maps.Marker({
                position:mapProp.center
            });
            marker.setMap(map);
        }
        $(document).on('ready', myMap);

    </script>

@endsection