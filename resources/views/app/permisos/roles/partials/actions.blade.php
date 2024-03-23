<div class="btn-group" role="group" aria-label="Basic example">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}
  @can('ver-rol')
  <a href="{{ route('roles.show',$user->id) }}" class="  bg-success text-white" target="_blank"><i class="fa fa-eye fa-2x "></i></a>
@endcan
  {{-- #################################################################################
  Editar
  ################################################################################# --}}
  @can('editar-rol')
  <a href="{{ route('roles.edit', $user->id) }}"
  class=" bg-warning text-white "><i class="fa fa-edit fa-2x "></i></a>
@endcan
  {{-- #################################################################################
  eliminar
  ################################################################################# --}}
  @can('borrar-rol')
  {!! Form::open(['class' => 'formulario-eliminar bg-danger ','route'=>['roles.destroy',$user->id],'method'=>'DELETE']) !!}
  <button class=" bg-danger text-white "><i class="fa fa-trash fa-3x"></i></button>
  {!! Form::close() !!}
  @endcan
</div>
