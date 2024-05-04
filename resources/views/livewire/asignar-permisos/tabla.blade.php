<table class="table table-striped ">
	<thead>
		<tr>
			<th class="text-center  " ># </th>

			<th class="text-center" >
				Permiso
				
			</th>

			<th class="text-center" >
				Roles con Permisos

			</th>


		</tr>
	</thead>
	<tbody>
		@forelse($permisos as $permiso)

		<tr>
			<td class= 'text-center'> <h6><strong>{{ $loop->iteration }}</strong></h6> </td>
			<td class= ''>
				<h6>
					<input type="checkbox"
					wire:change="Sincronizar_Permiso($('#p' + {{ $permiso->id }}).is(':checked'), '{{ $permiso->name }}')"
					id="p{{ $permiso->id }}"
					value="{{ $permiso->id }}"
					class="form-check-input"
					{{ $permiso->checked == 1 ? 'checked': ''  }}
					>

					{{ $permiso->name }}
				</h6>
			</td>
			<td class= 'text-center'>
				<h6>
					<strong>
						{{ \App\Models\User::permission($permiso->name)->count() }}
					</strong>
				</h6>
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

@push('js')
<script>
	document.addEventListener('DOMContentLoaded', function(){
		window.livewire.on('sync-error' , Msg => {
			noty(Msg)
		})

		window.livewire.on('permi' , Msg => {
			noty(Msg)
		})

		window.livewire.on('syncall' , Msg => {
			noty(Msg)
		})

		window.livewire.on('removeall' , Msg => {
			noty(Msg)
		})

	});


function Revocar()
{
	Swal.fire({
            title: 'Esta seguro de quitar todos los Permisos? ',
            text: "Esta accion no se puede corregir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Quitar!',
            cancelButtonText: 'Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo(componente, 'guardar', client_Id);

                Swal.close();
            }
        })
}

</script>

@endpush

