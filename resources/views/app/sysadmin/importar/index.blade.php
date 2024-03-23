@section('title','Importar Registros a la BD')
@show
@extends('layouts.app')
@section('content')
<section class="section">
 <div class="section-header">
        <h3 class="page__heading">Importar a Base de Datos</h3>
    </div>
<div class="card col-12">
  <div class="card-body">
    <h5 class="card-title">Codigos Obd2</h5>
    <br>
    @include('app.sysadmin.importar.modal-obd2')
  </div>
</div>

{{-- <div class="card col-12">
  <div class="card-body">
    <h5 class="card-title">Proveedores</h5>
    @include('app.sysadmin.importar.modal-proveedores')
  </div>
</div>

<div class="card col-12">

  

  <div class="card-body">
    <h5 class="card-title">Clientes - Registrados {{ $cont_clientes = App\Models\Client::count() }} </h5>

    @include('app.sysadmin.importar.modal-clientes')
  </div>
</div>

<div class="card col-12">
  <div class="card-body">
    <h5 class="card-title">Productos</h5>
    @include('app.sysadmin.importar.modal-productos')
  </div>
</div>
 --}}

    <div class="row">
                
    </div>
</div>
</section>
@endsection


@section('css')

<link href="{{ asset('personales/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection


@section('scripts')

<script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
<script src="{{ asset('personales/js/formulario-sweetalert.js') }}"></script>
<script src="{{ asset('personales/js/dropify.min.js') }}"></script>

@endsection
