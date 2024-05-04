<strong class="" >Total de registros:  {{ $cuenta }}</strong>
<div class="btn-group mr-2 ml-auto" role="group" aria-label="Basic example">

@can('obd2-crear')

{{-- Boton Nuevo --}}
<a href="{{ route('obd2.create') }}" class="btn btn-primary" ><i class="fa fa-plus " ></i><span></span>  </a>

@endcan

</div>