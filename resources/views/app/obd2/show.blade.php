{{-- titulo de la vista --}}
@section('title','Mostrar Error OBD2')
@show

@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Detalles Error : {{ $error_obd->codigo }}</h5>
    </div>
    <div class="section-body">
        <div class="row">
            
            <div class="col-md-12">

                <div class="card ">
                    <div class="col-md-9 mt-1">
                    <a href="{{ route('obd2.pdf', $error_obd->id) }}" class="btn btn-info pull-right  btn-lg " target="_blank"><i class="fa fa-print  " ></i><span> Imprimir</span> </a>
                    </div>
                    <div class="card-body">
                        
                        @include('app.obd2.tablas')
                        
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
    
</div>
</section>
@endsection
@section('scripts')

@endsection