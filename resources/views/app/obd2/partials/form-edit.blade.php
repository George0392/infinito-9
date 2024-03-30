<div class="form-group col-md-12 ">

    <x-adminlte-input name="codigo" label="Codigo" placeholder="Numero Codigo" class="form-control" value="{{ $error_obd->codigo }}" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-tag"></i>
        </div>
    </x-slot>
    </x-adminlte-input>

</div>

<div class="form-group col-md-12 ">
        <x-adminlte-input name="descripcion" label="Descripcion" placeholder="Descripcion" class="form-control" value="{{ $error_obd->descripcion }}" >
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-pen"></i>
        </div>
    </x-slot>
    </x-adminlte-input>
</div>


<div class="form-group col-md-12 ">
<x-adminlte-button class="btn btn-lg formulario-crear" type="submit" label="Actualizar" theme="outline-primary" icon="fas fa-lg fa-save"/>

</div>

