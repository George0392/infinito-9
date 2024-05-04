{{-- ****************************************************************** --}}
{{-- Rol --}}
{{-- ****************************************************************** --}}

<x-adminlte-input name="name" label="Rol" autofocus type="text" wire:model.defer="name" placeholder="Nombre de Rol o Cargo" label-class="text-lightblue"  minlength="4" maxlength="20" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>