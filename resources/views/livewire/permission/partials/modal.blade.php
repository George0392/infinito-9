<div wire:ignore.self  class="modal fade " size="lg" id="Modal_permission" tabindex="-1" role="dialog" >

  <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">

        <h5 class="modal-title " >

        {{$componente}} | {{ $selected_id > 0 ? 'Editar' : 'Crear' }}

      </h5>

<h6 class="alert alert-danger" wire:loading>
Por favor espere mientras se guardan los datos...
</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       @include('livewire.permission.partials.formulario')
      </div>

    <div class="modal-footer">

            @if($selected_id <1)

         <x-adminlte-button type="button" onclick="Crear()" label="Guardar" theme="outline-primary" icon="fas fa-lg fa-save"/>

         @else

         <x-adminlte-button type="button" onclick="Modificar()" label="Actualizar" theme="outline-success" icon="fas fa-lg fa-save"/>

        @endif

        <x-adminlte-button type="button" wire:click.prevent="resetUI()" label="Cancelar" theme="outline-danger" icon="fas fa-lg fa-trash" data-dismiss="modal"/>

      </div>
    </div>

  </div>
</div>

