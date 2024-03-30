<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Exportar listado errores a  Pdf</title>
    </head>
    <body>


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


    </body>

<style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;

        }

        td,
        th {
            padding: 2px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 12px;
        }

    </style>



</html>
