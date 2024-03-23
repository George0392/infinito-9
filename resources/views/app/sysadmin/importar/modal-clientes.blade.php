<div class="" >

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse-Cliente">
Importar Clientes
</button>
</p>
<div class="collapse" id="collapse-Cliente">
<div class="card card-body">
  <h5>
  Importar Clientes a BD en el siguiente orden : 
  </h5>
  <h5>nombre, rif, direccion, telefono, email</h5>
  <br>
  <form class="form" action=" {{ route('import-clients') }}" method="post" enctype="multipart/form-data">
    <br>

    @csrf
    @if(Session::has('message'))
    <p class="bg-success"> {{ Session::get('message') }} </p>
    @endif
    {{-- <input type="file" name="clientes"> --}}

    <input type="file" name="clientes" id="input-file-now" class="dropify-es" />
    <button class="btn btn-success btn-block"><i class="fa fa-box"></i> Importar</button>

  </form>
</div>
</div>

</div>