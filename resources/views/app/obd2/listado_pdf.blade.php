<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Exportar listado errores a  Pdf</title>
    </head>
    <body>

        <table>
            <thead>
                <tr >
                    <th  style="text-align: center;" >#</th>
                    <th  style="text-align: center;" >Codigo</th>
                    <th  style="text-align: center;" >Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($error_obd as $error )
                <tr >
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        <strong>{{ $error->codigo }}</strong>
                    </td>
                    <td>
                        {{ $error->descripcion }}
                    </td>
                </tr>
                @endforeach
                
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


