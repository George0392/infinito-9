<table class="table table-hover table-striped " >
	<thead  class="bg-secondary text-white">
		<tr>
			<th  class  ="text-center  text-white " >#</th>
			<th  class  ="text-center  text-white " >Codigo</th>
			<th  class  ="text-center  text-white " >Descripcion</th>
			<th  class="text-center  text-white "  >Acciones</th>
		</tr>
	</thead>
	<tbody>
		@forelse($error_obd as $obd )
		<tr >
			<td class="text-center" style="vertical-align: middle;" >
				<strong>{{ $loop->iteration }}</strong>
			</td>
			<td class="text-center" style="vertical-align: middle;" >
				{{ $obd->codigo }}
			</td>
			<td class=" text-justify" style="vertical-align: middle;" >
				{{ $obd->descripcion }}
			</td>
			<td >
				@include('app.obd2..partials.actions')
			</td>
		</tr>
		@empty
		<td class="text-center">-</td>
		<td class="text-center">-</td>
		<td class="text-center">Sin Registros</td>
		<td class="text-center">-</td>
		@endforelse

		<tfoot class="bg-secondary text-white">
		<tr>
			<th  class  ="text-center" >#</th>
			<th  class  ="text-center" >Codigo</th>
			<th  class  ="text-center" >Descripcion</th>
			<th  class  ="text-center"  >Acciones</th>
		</tr>
		</tfoot>
	</tbody>
	
</table>