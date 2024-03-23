<div class="form-group col-md-12 ">
    {{ Form::label ('name','Nombre:') }}
    {{ Form::text ('name',null, ['placeholder'=>'Nombre del rol','class'=>'form-control']) }}
</div>
<div class="form-group">

    <label for="">Permisos para este Rol:</label>
    <br/>

    @foreach($permission as $value)
    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
    {{ $value->name }}</label>
    <br/>
    
    @endforeach
</div>
<div class="form-group col-md-12 ">
    {{-- {{ Form::submit('Guardar', ['class'=>'btn btn-primary']) }} --}}
    {{ Form::button('<i class="fa fa-save "></i><span> Editar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg formulario-crear'] )  }}
</div>