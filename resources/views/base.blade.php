@extends('layout')

@section('body-class', 'hold-transition skin-blue layout-top-nav')

@section('body')
    <div class="wrapper">

        @include('partials.header')
        @yield('navbar-panel-control')

        <div class="content-wrapper">

            @include('partials.messages')

            <section class="content">

                <div class="row">
                    <div class="col-xs-12 col-lg-9">
                        @yield('contenido')
                    </div>
                    <div class="hidden-xs hidden-sm col-lg-3">
                        @yield('sidebar')

                        @yield('favoritos')
                    </div>
                    <div class="col-xs-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                        @yield('panel-control')
                    </div>

                </div>

            </section>

        </div>

        @include('partials.footer')
    </div>
@endsection