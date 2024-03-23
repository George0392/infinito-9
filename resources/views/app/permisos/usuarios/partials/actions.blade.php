<div class="btn-group" role="group" aria-label="Basic example">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}
  <a href="{{ route('usuarios.show',$user->id) }}" class=" dropdown-item bg-success text-white" target="_blank"><i class="fa fa-eye fa-2x "></i></a>
  {{-- #################################################################################
  Editar
  ################################################################################# --}}
  <a href="{{ route('usuarios.edit', $user->id) }}"
  class="dropdown-item bg-warning text-white "><i class="fa fa-edit fa-2x "></i></a>
  {{-- #################################################################################
  eliminar
  ################################################################################# --}}
  {!! Form::open(['class' => 'formulario-eliminar bg-danger ','route'=>['usuarios.destroy',$user->id],'method'=>'DELETE']) !!}
  <button class=" bg-danger text-white "><i class="fa fa-trash fa-3x"></i></button>
  {!! Form::close() !!}
</div>
