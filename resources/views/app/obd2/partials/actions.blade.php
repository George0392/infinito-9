<div class = "col text-center">
<div class="btn-group " category="group" aria-label="Basic example">
  {{-- #################################################################################
  Ver
  ################################################################################# --}}
  {{-- @can('ver-categorias') --}}
  <a href="{{ route('obd2.show',$obd->id) }}" class="  mr-3  text-secondary"><i class="fa fa-eye fa-2x "></i></a>
{{-- @endcan --}}
  {{-- #################################################################################
  Editar
  ################################################################################# --}}
  {{-- @can('editar-categorias') --}}
  <a href="{{ route('obd2.edit',$obd->id) }}" class=" mr-3  text-secondary" ><i class="fa fa-edit fa-2x "></i></a>
{{-- @endcan --}}
  {{-- #################################################################################
  eliminar
  ################################################################################# --}}

  {{-- @can('borrar-categorias') --}}
  <form  action=" {{ route('obd2.destroy',$obd->id) }} " method="post" class="formulario-eliminar" >
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-link text-secondary "><i class="fa fa-trash fa-2x "></i></button>
  
</form>

  {{-- @endcan --}}
</div>
</div>

@section('js')
    @if (session("message"))
<script>
$(document).ready(function() {
    let mensaje = " {{ session('message') }} ";
    Swal.fire({
        position: "center",
        icon: "success",
        title: mensaje,
        showConfirmButton: false,
        timer: 2000
    });

})

</script>
    @endif
@stop
