<div class="col mt-4">

   {{-- <x-adminlte-button class="float-right mr-2" type="button" label="Seleccionar ninguno" theme="outline-danger" icon="fas fa-lg fa-minus" wire:click="$emit('quitar')" /> --}}

    {{-- <x-adminlte-button class="float-right mr-2" type="button" label="Seleccionar todos" theme="outline-primary" icon="fas fa-lg fa-plus" wire:click="$emit('permisos')" /> --}}

    <x-adminlte-button class="float-right mr-2" type="button" label="Seleccionar ninguno" theme="outline-danger" icon="fas fa-lg fa-minus" onclick="Eliminar_Permisos()" />

    <x-adminlte-button class="float-right mr-2" type="button" label="Seleccionar todos" theme="outline-primary" icon="fas fa-lg fa-plus" onclick="Todos_Permisos()"  />

</div>

