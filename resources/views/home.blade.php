@extends('layouts.app')


@section('subtitle', 'Inicio')
@section('content_header_title', 'Inicio')
@section('content_header_subtitle', 'Estadisticas')


@section('content_body')
    @include('app.estadisticas.index')
@stop

{{-- Push extra CSS --}}

@push('css')

@endpush


@push('js')

@endpush