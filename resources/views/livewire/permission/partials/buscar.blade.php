<div class="row">

	{{-- ************************************************************************ --}}
	{{-- Buscador en Vivo --}}
	{{-- ************************************************************************ --}}

	<div class="col">
		<x-adminlte-input wire:model="buscar"  name="buscar" autofocus label="Buscar Permiso" placeholder="Buscar" label-class="text-lightblue">
		<x-slot name="appendSlot">
		<div class="input-group-text">
			<i class="fas fa-search text-lightblue"></i>
		</div>
		</x-slot>
		</x-adminlte-input>
	</div>

	@include('livewire.permission.partials.botones')

</div>