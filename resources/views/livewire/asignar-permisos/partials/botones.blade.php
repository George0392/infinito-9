<div class="col mt-4">

   <x-adminlte-button class="float-right mr-2" type="button" label="Seleccionar ninguno" theme="outline-danger" icon="fas fa-lg fa-minus" onclick="Revocar()" />

    <x-adminlte-button class="float-right mr-2" type="button" label="Seleccionar todos" theme="outline-primary" icon="fas fa-lg fa-plus" wire:click.prevent="Sincronizar_Todos()" />

</div>
