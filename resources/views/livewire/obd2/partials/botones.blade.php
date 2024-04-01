<div class="col mt-4">    
    <span wire:loading wire:target="excel" class="alert alert-success"> Cargando datos para exportar...</span>

<x-adminlte-button wire:click="excel" label="Exportar" wire:loading.attr="disabled" wire:target="excel" theme="success" icon="fas fa-plus" class="float-right" />

<x-adminlte-button class="float-right mr-2" type="reset" label="" theme="outline-primary" icon="fas fa-lg fa-plus" data-toggle="modal" data-target="#Modal_obd2" />

</div>

@include('livewire.obd2.partials.modal')