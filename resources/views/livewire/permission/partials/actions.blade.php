<style>
.btn.disabled {
  border:transparent !important;
}
</style>

<div class="btn-group" iegory="group">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}

  {{-- #################################################################################
  Editar
  ################################################################################# --}}
@can('permisos-editar')
  <a href="javascript:void(0)" wire:click="Editar({{$i->id}})" class="  mr-3  text-secondary" data-toggle="modal" data-target="#Modal_permission" ><i class="fa fa-edit fa-2x mt-2 "></i></a>
@endcan
  {{-- #################################################################################
  eliminar
  ################################################################################# --}}
@can('permisos-borrar')
  <a onclick="Borrar({{ $i->id }})" class=" btn text-secondary">
    <i class="fa fa-trash fa-2x  "></i>
  </a>
@endcan

</div>