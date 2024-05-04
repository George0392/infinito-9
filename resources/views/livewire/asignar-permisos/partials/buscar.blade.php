<div class="row">
    {{-- ************************************************************************ --}}
    {{-- Buscador en Vivo --}}
    {{-- ************************************************************************ --}}
    <div class="col">
        <select  wire:model="role"  class="custom-select">
            <option value="Elegir" selected>Seleccionar el Cargo o Rol</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    @include('livewire.asignar-permisos.partials.botones')
</div>
