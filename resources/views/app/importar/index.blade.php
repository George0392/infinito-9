@extends('adminlte::page')



@section('content')

@include('app.importar.botones')

@stop

@section('css')

@livewireStyles

<link href=" {{ asset('css/app.css') }} " rel="stylesheet">

<link href=" {{ asset('css/toastr.min.css') }} " rel="stylesheet">


<link href=" {{ asset('vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet">


@stop

@section('js')


<script src=" {{ asset('js/sweetalert2@11.js') }} "> </script>

@livewireScripts

<script src=" {{ asset('js/toastr.min.js') }} "> </script>

<script src=" {{ asset('js/alpine.min.js') }} "> </script>

<script src=" {{ asset('js/alertas_categorias.js') }} "> </script>

 
@stop