{{-- titulo de la vista --}}
@section('title','Roles')
@show
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Roles</h5>
    </div>
    <div class="section-body">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body d-flex">

                        
                        @include('app.permisos.roles.partials.search')
                        @can('crear-rol')
                        <a href="{{ route('roles.create') }}" class="btn btn-primary ml-auto" ><i class="fa fa-plus " ></i></a>
                        @endcan
                    </div>
                    <table  class="table table-hover table-striped">
                        <thead class="bg-secondary text-white">
                            
                            <tr>
                            <th  class  ="text-center text-white" >#</th>
                            <th  class  ="text-center text-white" >Nombre</th>
                            <th  class="text-center text-white"  >Acciones</th>
                        </tr>
  
                    </thead>
                    <tbody>

                        @forelse( $roles as $user )
        <tr >
            <td class="text-center" style="vertical-align: middle;" >
                <strong>{{ $loop->iteration }}</strong>

                            <td  class="text-center" >
                                <strong>{{ $user->name }}</strong>
                            </td>
                            
                            <td class="text-center" >
                                @include('app.permisos.roles.partials.actions')
                            </td>
        </tr>
        @empty
        <td class="text-center">-</td>
        <td class="text-center">Sin Registros</td>
        <td class="text-center">-</td>

                        @endforelse
                        <tfoot class="bg-secondary">
                        <tr>
                            <th  class  ="text-center text-white" >#</th>
                            <th  class  ="text-center text-white" >Nombre</th>
                            <th  class="text-center text-white"  >Acciones</th>
                        </tr>
                        </tfoot>
                    </tbody>
                    
                </table>
                <div class=" pagination justify-content-center ">
                    {!! $roles->links() !!}
                </div>
            </div>
        </div>
    </div>
    
</div>
</section>
@endsection
