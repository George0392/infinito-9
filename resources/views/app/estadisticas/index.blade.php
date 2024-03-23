<div class="card mt-3">
	<div class="card-body">
		<h5>Cantidad de Registros: </h5>
		<div class="row">

{{-- ******************************************************** --}}
{{-- Categorias --}}
{{-- ******************************************************** --}}

			<div class="col-md-3">
				<div class="card bg-success">
					<div class="card-body">
						<h5>Fallas Obd2</h5>
						<h2 class="text-right">
						<i class="fa fa-tags f-left"></i>
						<span>{{ $cont_obd2 }}</span>
						</h2>
						<p class="m-b-0 text-right">
							<a href="{{ route('obd2.index') }}" class="text-white">Ver más...</a>
						</p>
					</div>
				</div>
			</div>

{{-- ******************************************************** --}}
{{-- Productos --}}
{{-- ******************************************************** --}}


			<div class="col-md-3">
				<div class="card bg-primary">
					<div class="card-body">
						<h5>Productos</h5>
						<h2 class="text-right">
						<i class="fa fa-box f-left"></i>
						{{-- <span>{{ $cont_productos }}</span> --}}
						</h2>
						<p class="m-b-0 text-right">
							{{-- <a href="{{ route('productos.live') }}" class="text-white">Ver más...</a> --}}

						</p>
					</div>
				</div>
			</div>

{{-- ******************************************************** --}}
{{-- Proveedores --}}
{{-- ******************************************************** --}}


			<div class="col-md-3">
				<div class="card bg-secondary">
					<div class="card-body">
						<h5>Proveedores</h5>
						<h2 class="text-right">
						<i class="fa fa-truck f-left"></i>
						{{-- <span>{{ $cont_proveedores }}</span> --}}
						</h2>
						<p class="m-b-0 text-right">
							{{-- <a href="{{ route('proveedores.live') }}" class="text-white">Ver más...</a> --}}

						</p>
					</div>
				</div>
			</div>

{{-- ******************************************************** --}}
{{-- Clientes --}}
{{-- ******************************************************** --}}


			<div class="col-md-3">
				<div class="card bg-danger">
					<div class="card-body">
						<h5>Clientes</h5>
						<h2 class="text-right">
						<i class="fa fa-users f-left"></i>
						{{-- <span>{{ $cont_clientes }}</span> --}}
						</h2>
						<p class="m-b-0 text-right">
							{{-- <a href="{{ route('clientes.live') }}" class="text-white">Ver más...</a> --}}

						</p>
					</div>
				</div>
			</div>

{{-- ******************************************************** --}}


		</div>
	</div>
</div>