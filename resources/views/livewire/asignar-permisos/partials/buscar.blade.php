<div class="row">
    {{-- ************************************************************************ --}}
    {{-- Buscador en Vivo --}}
    {{-- ************************************************************************ --}}
    <div class="col">
        <label>Cargo o Rol:</label>
        <select class="form-control" data-live-search="true"  wire:model="role" >
            <span>asdf </span>
            <option value="Elegir" selected>Seleccionar el Cargo o Rol</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    @include('livewire.asignar-permisos.partials.botones')
</div>
