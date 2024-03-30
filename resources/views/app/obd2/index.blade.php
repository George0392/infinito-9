{{-- titulo de la vista --}}
@section('title','Listado Errores')
@show
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Listado Errores:</h5>
    </div>
    <div class="section-body">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body d-flex">
                        {{-- Buscar Obd2 --}}
                        @include('app.obd2.partials.search')
                        {{-- Botones --}}
                        @include('app.obd2.partials.botones')
                    </div>
                    
                </div>
            </div>

            <div class="row">
               <strong class="ml-auto" >Total de registros:  {{ $cuenta }}</strong>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex">
                            {{-- Tabla registros --}}
                            @include('app.obd2.partials.table-index')
                        </div>
                    </div>
                    <div class=" pagination justify-content-center ">
                        {!! $error_obd->links() !!}
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    @endsection
    @section('scripts')

    @endsection