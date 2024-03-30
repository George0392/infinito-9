<form action=" {{ route('obd2.index') }} " method="GET"  class="form-inline" autocomplete="off" >
	{{-- @csrf --}}

<x-adminlte-input name="searchtext" placeholder="Buscar">

     <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-primary" label="Buscar" type="submit" />
    </x-slot>

    <x-slot name="prependSlot">
        <div class="input-group-text text-primary">
            <i class="fas fa-search"></i>
        </div>
    </x-slot>

</x-adminlte-input>

</form>
