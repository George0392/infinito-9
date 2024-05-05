@section('title', $componente)

<div class="card mt-2">
  <div class="card-body">

<div class="row">

    <div class="col">
    <h5 class="card-title"> {{$componente}} | {{$titulo}} </h5>
    </div>

    <div class="col">
    <p class="text-secondary float-right">Total de Registros: {{$total}} </p>
    </div>

</div>


    @include('livewire.permission.partials.buscar')

    @include('livewire.permission.tabla')

    {{ $permission->links() }}

  </div>
</div>

@push('js')
@livewireScripts

<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<x-livewire-alert::flash />

<script src=" {{ asset('js/alertas/alertas_CRUD.js') }} "> </script>

@endpush
