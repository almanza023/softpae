<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Representante Legal</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($empresas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->telefono }}</td>
                <td>{{ $item->direccion }}</td>
                <td>{{ $item->correo }}</td>
                <td>{{ $item->representante }}</td>
                <td>
                    @if($item->estado==1)
                    <button class="btn badge bg-primary sm" style="color: #fff" onclick="changeEstado('{{ route('empresa.status', $item->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('empresa.status', $item->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-telefono="{{$item->telefono}}"
                                data-direccion="{{$item->direccion}}" data-web="{{$item->web}}" data-correo="{{$item->correo}}" data-representante="{{$item->representante}}"
                                data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>

                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
