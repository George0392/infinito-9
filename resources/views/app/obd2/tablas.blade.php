<table class="table table-hover  table-condensed table-bordered ">
  <thead class="bg-secondary" >
    <tr>
      <th class="text-center text-capitalize text-white">Error OBD2</th>
    </tr>
  </thead>
</table>

<table class="table table-hover  table-condensed table-bordered ">
  <thead class="bg-secondary" >
    <tr>
      <th class="text-center text-capitalize text-white ">ID</th>
      <th class="text-center text-capitalize text-white">Codigo</th>
      <th class="text-center text-capitalize text-white">Descripcion</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td class="text-center text-capitalize ">{{$error_obd->id }}</td>
      <td class="text-center text-capitalize ">{{$error_obd->codigo }}</td>
      <td class="text-center text-capitalize">{{$error_obd->descripcion}}</td>
    </tr>
  </tbody>

</table>


<style>

.table-bordered {
    border: 1px solid #f4f4f4;
    margin: 0;
}

</style>

