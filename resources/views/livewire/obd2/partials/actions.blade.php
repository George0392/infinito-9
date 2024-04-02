<style>
.btn.disabled {
  border:transparent !important;
}
</style>

<div class="btn-group" iegory="group" aria-label="Basic example">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}

  <a href="{{ route('obd2.show',$i->id) }}" class="  mr-3  text-secondary" target="_blank"><i class="fa fa-eye fa-2x mt-2 "></i></a>

  {{-- #################################################################################
  Editar
  ################################################################################# --}}

  <a href="javascript:void(0)" wire:click="Editar({{$i->id}})" class="  mr-3  text-secondary" data-toggle="modal" data-target="#Modal_obd2" ><i class="fa fa-edit fa-2x mt-2 "></i></a>

  {{-- #################################################################################
  eliminar
  ################################################################################# --}}

  <a wire:click="$emit('borrar',{{ $i->id }} )"
  class=" btn text-secondary"><i class="fa fa-trash fa-2x  "></i></a>


</div>