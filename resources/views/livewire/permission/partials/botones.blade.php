<div class="col mt-4">
    <span wire:loading wire:target="excel" class="alert text-primary"> Cargando datos para exportar Excel...</span>
    <span wire:loading wire:target="csv" class="alert text-danger"> Cargando datos para exportar CSV...</span>
    <span wire:loading wire:target="lista_pdf" class="alert text-success"> Cargando datos para exportar PDF...</span>
    @can('obd2-crear')
    <x-adminlte-button class="float-right mr-2" type="reset" label="" theme="outline-primary" icon="fas fa-lg fa-plus" data-toggle="modal" data-target="#Modal" />
    @endcan
    <div class="btn-group  mr-2 float-right" role="group" aria-label="Basic example">
        {{-- Boton Exportar --}}
        <div class="btn-group">
            @can('reportes-categorias')
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-export"></i></i><span>
                    Exportar <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li class="ml-2 mr-1">
                    <a href="javascript:void(0)" wire:click="excel"><i class="fa fa-file"></i><span> Excel (Rapida)</span> </a>
                </li>
                <li class="ml-2 mr-1">
                    <a href="javascript:void(0)" wire:click="csv"><i class="fa fa-file"></i><span> CSV (Rapida)</span> </a>
                </li>
                <li class="ml-2 mr-1">
                    <a href=" {{ route('listado_obd2.pdf') }} " target="_blank"><i class="fa fa-file-pdf"></i></i><span> PDF (Lenta)</span> </a>
                </li>
                <li class="divider"></li>
            </ul>
        </div>
        @endcan
    </div>
</div>
</div>
@include('livewire.permission.partials.modal')
