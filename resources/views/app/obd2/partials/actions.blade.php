<div class = "col text-center">
<div class="btn-group " category="group" aria-label="Basic example">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}
  {{-- @can('ver-categorias') --}}
  <a href="{{ route('obd2.show',$obd->id) }}" class="  mr-3  text-secondary"><i class="fa fa-eye fa-2x "></i></a>
{{-- @endcan --}}
  {{-- #################################################################################
  Editar
  ################################################################################# --}}
  {{-- @can('editar-categorias') --}}
  <a href="{{ route('obd2.edit',$obd->id) }}" class=" mr-3  text-secondary" ><i class="fa fa-edit fa-2x "></i></a>
{{-- @endcan --}}
  {{-- #################################################################################
  eliminar
  ################################################################################# --}}

  {{-- @can('borrar-categorias') --}}
  {!! Form::open(['class' => 'formulario-eliminar ','route'=>['obd2.destroy',$obd->id],'method'=>'DELETE']) !!}

    <button type="submit" class="btn btn-link  text-secondary"><i class="fa fa-trash fa-2x "></i></button>
  
  {!! Form::close() !!}
  {{-- @endcan --}}
</div>
</div>