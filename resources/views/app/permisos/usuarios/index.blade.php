{{-- titulo de la vista --}}
@section('title','Usuarios')
@show
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Usuarios</h5>
    </div>
    <div class="section-body">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body d-flex">
                        @include('app.permisos.usuarios.partials.search')
                        <a href="{{ route('usuarios.create') }}" class="btn btn-primary ml-auto" ><i class="fa fa-plus " ></i><span></span> Nuevo </a>
                    </div>
                    <table  class="table table-hover table-striped">
                        <thead class="bg-primary text-white">
                            
                            <th  class  ="text-center text-white" >#</th>
                            <th  class  ="text-center text-white" >Nombre</th>
                            <th  class  ="text-center text-white" >Email</th>
                            <th  class  ="text-center text-white" >Rol</th>
                            <th  class="text-center text-white"  >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $user )
                        <tr >
                            <td  class="text-center" >
                                {{ $user->id }}
                            </td>
                            <td  class="text-center" >
                                <strong>{{ $user->name }}</strong>
                            </td>
                            <td  class="text-center" >
                                {{ $user->email }}
                            </td>
                            <td class="text-center" >
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $rolName)
                                <h5><span class="badge badge-dark" > {{ $rolName }} </span></h5>
                                @endforeach
                                @endif
                            </td>
                            <td class="text-center" >
                                @include('app.permisos.usuarios.partials.actions')
                            </td>
                        </tr>
                        @endforeach
                        <tfoot class="bg-primary">
                        <tr>
                            <th  class  ="text-center text-white" >#</th>
                            <th  class  ="text-center text-white" >Nombre</th>
                            <th  class  ="text-center text-white" >Email</th>
                            <th  class  ="text-center text-white" >Rol</th>
                            <th  class="text-center text-white"  >Acciones</th>
                        </tr>
                        </tfoot>
                    </tbody>
                    
                </table>
                <div class=" pagination justify-content-center ">
                    {!! $usuarios->links() !!}
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