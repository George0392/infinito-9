<table class="table table-striped ">
	<thead>
		<tr>
			<th class="text-center  " ># </th>

			<th class="text-center" >
				Permiso
				
			</th>	

			{{-- <th class="text-center" >
				Descripcion   
				
			</th> --}}

			<th class="text-center  " >Acciones  </span></th>
		</tr>
	</thead>
	<tbody wire:loading.class="text-muted">
		@forelse($permission as $i)

		<tr>
			<td class= 'text-center'> <strong>{{ $i->id }}</strong> </td>
			<td class= 'text-center'>{{ $i->name }}</td>
			{{-- <td class= 'text-center'>{{ $i->guard_name }}</td> --}}
			<td class= 'text-center'>

				@include('livewire.permission.partials.actions')


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
