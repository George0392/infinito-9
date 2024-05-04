@php
$heads = [
    'ID',
    'Codigo',
    'Descripcion',

    // ['label' => 'Descripcion', 'width' => 40],
    // ['label' => 'Acciones', 'no-export' => true, 'width' => 10],
];

$config = [

'language' => [
	'url' => '//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
]
];
@endphp
<x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped hoverable with-footer footer-theme="light" beautify with-buttons head-theme="light" >
    @foreach($error_obd as $obd)
			<td>
				<strong>{{ $obd->id }}</strong>
			</td>
			<td>
				{{ $obd->codigo }}
			</td>
			<td >
				{{ $obd->descripcion }}
			</td>
			{{-- <td >

				@include('app.obd2.partials.actions')

			</td> --}}
		</tr>
    @endforeach
</x-adminlte-datatable>