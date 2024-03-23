<div class="" >

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse-Productos">
Importar Productos
</button>
</p>
<div class="collapse" id="collapse-Productos">
<div class="card card-body">
  <h5>
  Importar Productos a BD
  </h5>
  <br>
  <form class="form" action=" {{ route('import-products') }}" method="post" enctype="multipart/form-data">
    <br>
    @csrf
    @if(Session::has('message'))
    <p class="bg-success"> {{ Session::get('message') }} </p>
    @endif
    <input type="file" name="productos" id="input-file-now" class="dropify-es" />
    <button class="btn btn-success btn-block"><i class="fa fa-box"></i> Importar</button>
  </form>
</div>
</div>

</div>