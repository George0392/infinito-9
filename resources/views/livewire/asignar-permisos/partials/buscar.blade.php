<div class="row">
    {{-- ************************************************************************ --}}
    {{-- Buscador en Vivo --}}
    {{-- ************************************************************************ --}}
    <div class="col" wire:ignore >
        <label>Cargo o Rol:</label>
        <select class="form-control selectpicker" data-live-search="true"  wire:model="role" >
            <option value="Elegir" selected>Seleccionar el Cargo o Rol</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    @include('livewire.asignar-permisos.partials.botones')
</div>
