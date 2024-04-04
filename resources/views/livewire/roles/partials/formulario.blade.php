{{-- ****************************************************************** --}}
{{-- Rol --}}
{{-- ****************************************************************** --}}

<x-adminlte-input name="name" label="Rol" autofocus type="text" wire:model.defer="name" placeholder="Nombre de Rol o Cargo" label-class="text-lightblue"  minlength="4" maxlength="8" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

<div class="form-group col-md-12 ">
    {{ Form::label ('roles','Permisos para este Rol:') }}
    <br>
    @foreach($permission as $value)

    <label >

    {{-- {{ Form::checkbox('permission[]', $value->id, false,array('class'=> 'name'))}} --}}
    <input class="name" name="permission[]" type="checkbox" value= {{$value->id}} wire:model.defer="permission" >
    {{ $value->name }}

    </label>

    <br>

    @endforeach


</div>