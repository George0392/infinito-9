{{-- ****************************************************************** --}}
{{-- Codigo --}}
{{-- ****************************************************************** --}}

<x-adminlte-input name="codigo" label="Codigo" autofocus type="text" wire:model.defer="codigo" placeholder="Nombre de Codigo" label-class="text-lightblue"  minlength="4" maxlength="8" class="text-uppercase">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>


{{-- ****************************************************************** --}}
{{-- Descripcion --}}
{{-- ****************************************************************** --}}

<x-adminlte-textarea name="descripcion" label="Descripcion" autofocus type="text" wire:model.defer="descripcion" placeholder="Descripcion de Codigo" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-pen text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>
