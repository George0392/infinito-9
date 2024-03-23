{{-- titulo de la vista --}}
@section('title','Editar Usuarios')
@show
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Nuevo Usuario</h5>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card  d-flex">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-success btn-lg ml-auto" ><i class="fa fa-arrow-left  " ></i><span> Volver</span> </a>
                    
                    <div class="card-body">

                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                        <h3>
                        Editar Usuario:
                        
                        </h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($usuario, ['class' => 'formulario-editar','route'=> ['usuarios.update', $usuario->id], 'method' => 'PUT', 'files'=> true ]) !!}
                        @include('app.permisos.usuarios.partials.form')
                        {{ Form::close() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
<script src="{{ asset('personales/js/formulario-sweetalert.js') }}"></script>
@endsection