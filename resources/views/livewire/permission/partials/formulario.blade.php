{{-- ****************************************************************** --}}
{{-- Codigo --}}
{{-- ****************************************************************** --}}

<x-adminlte-input name="name" label="Permiso" autofocus type="text" wire:model.defer="name" placeholder="Nombre de Permiso" label-class="text-lightblue"  minlength="4" maxlength="50" class="text-uppercase">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>
