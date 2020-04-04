@extends('layout')

@section('content')
    <section class="pages container">
        <div class="page page-contact">
            <h1 class="text-capitalize">{{ __('Página no encontrada') }}</h1>
            <p>{{ __('Regresa al inicio') }} <a href="{{ route('pages.home') }}">{{ __('Inicio') }}</a></p>
        </div>
    </section>
@endsection