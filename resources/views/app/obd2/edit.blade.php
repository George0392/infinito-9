{{-- titulo de la vista --}}
@section('title','Editar Codigo')
@show
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h5 class="page__heading">Editar Codigo:</h5>
    </div>
   <div class="section-body">
        <div class="row">
            
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('obd2.update', $error_obd->id) }}" method="post" class="formulario-editar">
        @csrf
        @method('PUT')
        @include('app.obd2.partials.form-edit')
                        </form>

                    </div>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
    
</div>
</section>
@endsection

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
        timer: 1500
    });

})

</script>
    @endif
@stop
