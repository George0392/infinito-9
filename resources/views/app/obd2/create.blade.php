{{-- titulo de la vista --}}
@section('title','Crear Codigo OBD2')
@show

@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Crear Codigo OBD2</h5>
    </div>
    <div class="section-body">
        <div class="row">
            
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('obd2.store') }}" method="post" class="formulario-crear">
                            @csrf
                            @include('app.obd2.partials.form')
                        </form>
                        
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
    
</div>
</section>
@endsection
