
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Codigo</th>
        <th>Descripcion</th>

    </tr>
    </thead>
    <tbody>
    @foreach($error_obd as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->codigo }}</td>
            <td>{{ $p->descripcion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>