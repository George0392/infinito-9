<style>
.btn.disabled {
  border:transparent !important;
}
</style>

<div class="btn-group" iegory="group">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}
@can('roles-ver')
  <a href="{{ route('roles.show',$i->id) }}" class="  mr-3  text-secondary" target="_blank"><i class="fa fa-eye fa-2x mt-2 "></i></a>
@endcan
  {{-- #################################################################################
  Editar
  ################################################################################# --}}
@can('roles-editar')
  <a href="javascript:void(0)" wire:click="Editar({{$i->id}})" class="  mr-3  text-secondary" data-toggle="modal" data-target="#Modal_roles" ><i class="fa fa-edit fa-2x mt-2 "></i></a>
@endcan
  {{-- #################################################################################
  eliminar
  ################################################################################# --}}
@can('roles-borrar')
  <a wire:click="$emit('borrar',{{ $i->id }} )"
  class=" btn text-secondary"><i class="fa fa-trash fa-2x  "></i></a>
@endcan

</div>