<div class="form-group col-md-12 ">
    {{ Form::label ('codigo','Codigo:') }}
    {{ Form::text ('codigo',null, ['placeholder'=>'Numero de Codigo','class'=>'form-control']) }}
</div>

<div class="form-group col-md-12 ">
    {{ Form::label ('descripcion','Descripcion:') }}
    {{ Form::textarea ('descripcion',null, ['placeholder'=>'Descripcion del Codigo','class'=>'form-control']) }}
</div>


<div class="form-group col-md-12 ">
    {{-- {{ Form::submit('Guardar', ['class'=>'btn btn-primary']) }} --}}
    {{ Form::button('<i class="fa fa-save "></i><span> Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg formulario-crear'] )  }}
</div>

