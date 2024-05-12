<div class="form-row align-items-center">
    {{-- ****************************************************************** --}}
    {{-- nombre --}}
    {{-- ****************************************************************** --}}
    <div class="col-md-6 ">
        <x-adminlte-input name="name" label="Nombre" type="text" wire:model.defer="name" placeholder="Nombre de Usuario" label-class="text-lightblue" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    {{-- ****************************************************************** --}}
    {{-- telefono --}}
    {{-- ****************************************************************** --}}
    <div class="col-md-6 ">
        <x-adminlte-input name="phone" label="Telefono" type="number" wire:model.defer="phone" placeholder="Telefono de Usuario" label-class="text-lightblue" minlength="4" maxlength="12" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-phone text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    {{-- ****************************************************************** --}}
    {{-- correo --}}
    {{-- ****************************************************************** --}}
    <div class="col-md-12 ">
        <x-adminlte-input name="email" label="Correo" type="mail" wire:model.defer="email" placeholder="Correo de Usuario" label-class="text-lightblue" minlength="10" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    {{-- ****************************************************************** --}}
    {{-- clave 1 --}}
    {{-- ****************************************************************** --}}
    <div class="col-md-12 ">
        <x-adminlte-input name="password" label="Contrasena" type="password" wire:model.defer="password" placeholder="Clave de Usuario" label-class="text-lightblue" minlength="4" maxlength="80" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-lock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
    {{-- ****************************************************************** --}}
    {{-- clave 2 --}}
    {{-- ****************************************************************** --}}
    {{-- <div class="col-md-6 ">
        <x-adminlte-input name="password2" label="Repetir Contrasena" type="password" wire:model.defer="phone" placeholder="Clave de Usuario" label-class="text-lightblue" minlength="4" maxlength="80">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-lock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div> --}}
    {{-- ****************************************************************** --}}
    {{-- status --}}
    {{-- ****************************************************************** --}}
    <div class="col-md-6 ">
        <label>Status</label>
        <select class="form-control " wire:model.defer="status" enable-old-support>
            <option value="Elegir" selected>Elegir</option>
            <option value="Activo">Activo</option>
            <option value="Bloqueado">Bloqueado</option>
        </select>
        @error('status') <span class="text-danger"> <h6><strong>{{ $message }}</strong></h6> </span> @enderror
    </div>
    {{-- ****************************************************************** --}}
    {{-- rol --}}
    {{-- ****************************************************************** --}}
    <div class="col-md-6 ">
        <label>Cargo o Rol:</label>
        <select class="form-control " wire:model.defer="role" enable-old-support>
            <option value="Elegir" selected>Elegir</option>
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role') <span class="text-danger"> <h6><strong>{{ $message }}</strong></h6> </span> @enderror
    </div>
    {{-- ****************************************************************** --}}
    {{-- clave 2 --}}
    {{-- ****************************************************************** --}}
    <div class="col-md-12 ">

        <label >Imagen:</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" ><i class="fas fa-image"></i></span>
      </div>
      <input type="file" wire:model.defer="image" accept="image/*" class="form-control" placeholder="Foto del Usuario" >
      <div wire:loading wire:target="image" class="text-danger" >Cargando...</div>
    </div>

    </div>
</div>
