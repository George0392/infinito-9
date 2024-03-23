<div class="form-group col-md-12 ">
    {{ Form::label ('codigo','Codigo:') }}
    {{ Form::text ('codigo',null, ['placeholder'=>'Codigo del Error','class'=>'form-control']) }}
</div>

<div class="form-group col-md-12 ">
    {{ Form::label ('descripcion','Descripcion:') }}
    {{ Form::textarea ('descripcion',null, ['placeholder'=>'Descripcion de la Falla','class'=>'form-control']) }}
</div>


<div class="form-group col-md-12 ">
    {{-- {{ Form::submit('Guardar', ['class'=>'btn btn-primary']) }} --}}
    {{ Form::button('<i class="fa fa-save "></i><span> Editar..</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg'] )  }}
</div>