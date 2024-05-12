<table class="table table-striped ">
    <thead>
        <tr>
            <th class="text-center  "># </th>
            <th class="text-center">
                Usuario
            </th>
            <th class="text-center">
                Cargo - Rol
            </th>
            <th class="text-center">
                Foto
            </th>
            <th class="text-center">
                Status
            </th>
            <th class="text-center  ">Acciones </span></th>
        </tr>
    </thead>
    <tbody wire:loading.class="text-muted">
        @forelse($usuarios as $i)
        <tr>
            <td class='text-center'> <strong>{{ $loop->iteration }}</strong> </td>
            <td class='text-center'>{{ $i->name }}</td>
            <td class="text-center">
                @if(!empty($i->getRoleNames()))
                @foreach($i->getRoleNames() as $rolName)
                <h5> <strong>{{ $rolName }} </strong></h5>
                @endforeach
                @endif
            </td>

            <td class="text-center">
                {{-- llamando a los accesores de imagenes del modelo $i->imagenes --}}
                <img class="img-thumbnail" width="70px" height="90px" src="{{ asset('img/usuarios') . '/' . $i->imagenes }}">
            </td>

            <td class="text-center ">
                <span class=" badge {{ $i->status == 'Activo' ? 'badge-success' : 'badge-danger' }}">
                 <h5>{{ $i->status }}</h5>
             </span>
            </td>

            <td class='text-center'>
                @include('livewire.usuarios.partials.actions')
            </td>
        </tr>
        @empty
        <td class="text-center">-</td>
        <td class="text-center">-</td>
        <td class="text-center">Sin Registros</td>
        <td class="text-center">-</td>
        @endforelse
    </tbody>
</table>
