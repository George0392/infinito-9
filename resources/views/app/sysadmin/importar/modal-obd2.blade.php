<div class="" >

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse-Categorias">
Importar Registros Obd2
</button>
</p>
<div class="collapse" id="collapse-Categorias">
<div class="card card-body">
  <h5>
  Importar Registros Obd2 a BD
  </h5>
  <br>
  <form class="form" action=" {{ route('import-obd2') }}" method="post" enctype="multipart/form-data">
    <br>
    @csrf
    @if(Session::has('message'))
    <p class="bg-success"> {{ Session::get('message') }} </p>
    @endif
    <input type="file" name="reg_obd2" id="input-file-now" class="dropify-es" />
    <button class="btn btn-success btn-block"><i class="fa fa-box"></i> Importar</button>
  </form>
</div>
</div>

</div>