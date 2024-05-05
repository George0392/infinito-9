<style>
.btn.disabled {
  border:transparent !important;
}
</style>

<div class="btn-group" iegory="group">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}
@can('obd2-ver')
  <a href="{{ route('obd2.show',$i->id) }}" class="  mr-3  text-secondary" target="_blank"><i class="fa fa-eye fa-2x mt-2 "></i></a>
@endcan
  {{-- #################################################################################
  Editar
  ################################################################################# --}}
@can('obd2-editar')
  <a href="javascript:void(0)" wire:click="Editar({{$i->id}})" class="  mr-3  text-secondary" data-toggle="modal" data-target="#Modal_obd2" ><i class="fa fa-edit fa-2x mt-2 "></i></a>
@endcan
  {{-- #################################################################################
  eliminar
  ################################################################################# --}}
@can('obd2-borrar')

  <a onclick="Borrar({{ $i->id }})" class=" btn text-secondary">
    <i class="fa fa-trash fa-2x  "></i>
  </a>

@endcan

</div>