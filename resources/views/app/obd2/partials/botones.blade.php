<div class="btn-group mr-2 ml-auto" role="group" aria-label="Basic example">

{{-- Boton Exportar --}}
<div class="btn-group">
{{-- @can('reportes-categorias') --}}

	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-export"></i></i><span>
		Exportar <span class="caret"></span>
	</button>

		<ul class="dropdown-menu" role="menu">
			<li>
				<a href=" {{ route('listado_obd2.xlsx') }} " ><i class="fa fa-file" target="_blank"></i><span> Excel (Exportacion rapida)</span> </a>
			</li>
			<li class="divider"></li>
			<li>
				<a href=" {{ route('listado_obd2.csv') }} " ><i class="fa fa-file" target="_blank"></i><span> CSV  (Exportacion rapida)</span> </a>
			</li>
			<li class="divider"></li>
			<li>
				<a href=" {{ route('listado_obd2.pdf') }} "  target="_blank" ><i class="fa fa-file-pdf"></i></i><span> PDF  (Exportacion lenta)</span> </a>
			</li>
			<li class="divider"></li>
		</ul>
	</div>
	
</div>

{{-- @endcan --}}

{{-- @can('crear-categorias') --}}

{{-- Boton Nuevo --}}
<a href="{{ route('obd2.create') }}" class="btn btn-primary" ><i class="fa fa-plus " ></i><span></span> Nuevo </a>

{{-- @endcan --}}

</div>