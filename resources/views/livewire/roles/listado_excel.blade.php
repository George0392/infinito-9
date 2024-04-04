
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Status</th>
        <th>imagen</th>


    </tr>
    </thead>
    <tbody>
    @foreach($categories as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->nombre }}</td>
        </tr>
    @endforeach
    </tbody>
</table>