{{-- titulo de la vista --}}
@section('title','Editar Codigo')
@show
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Editar Codigo:</h5>
    </div>
   <div class="section-body">
        <div class="row">
            
            <div class="col-md-12">

                <div class="card">
                    @include('app.obd2.partials.error')
                    <div class="card-body">
                        
                        {!! Form::model($error_obd, ['class' => 'formulario-editar','route'=> ['obd2.update', $error_obd->id], 'method' => 'PUT', 'files'=> true ]) !!}
                        @include('app.obd2.partials.form-edit')
                        {!! Form::close() !!}
                        
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