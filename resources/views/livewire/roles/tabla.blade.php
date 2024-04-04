<table class="table table-striped ">
	<thead>
		<tr>
			<th class="text-center  " ># </th>

			<th class="text-center" >
				Codigo
				
			</th>

			<th class="text-center  " >Acciones  </span></th>
		</tr>
	</thead>
	<tbody wire:loading.class="text-muted">
		@forelse($roles as $i)

		<tr>
			<td class= 'text-center'> <strong>{{ $loop->iteration }}</strong> </td>
			<td class= 'text-center'>{{ $i->name }}</td>
			<td class= 'text-center'>

				@include('livewire.roles.partials.actions')


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
