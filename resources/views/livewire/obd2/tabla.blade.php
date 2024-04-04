<table class="table table-striped ">
	<thead>
		<tr>
			<th class="text-center  " ># </th>

			<th class="text-center" >
				Codigo
				
			</th>	

			<th class="text-center" >
				Descripcion   
				
			</th>

			<th class="text-center  " >Acciones  </span></th>
		</tr>
	</thead>
	<tbody wire:loading.class="text-muted">
		@forelse($obd2 as $i)

		<tr>
			<td class= 'text-center'> <strong>{{ $loop->iteration }}</strong> </td>
			<td class= 'text-center'>{{ $i->codigo }}</td>
			<td>{{ $i->descripcion }}</td>
			<td class= 'text-center'>

				@include('livewire.obd2.partials.actions')


			</td>
		</tr>
		@empty
		<td class="text-center">-</td>
		<td class="text-center">-</td>
		<td class="text-center">Sin Registros</td>
		<td class="text-center">-</td>
		@endforelse
	</tbody>
</table>
