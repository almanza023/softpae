<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Categoria</th>
            <th>Unidad de Medida</th>
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($productos as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->categoria->nombre }}</td>
                <td>{{ $item->unidad->prefijo }}</td>
                <td>
                    @if($item->estado==1)
                    <button class="btn badge bg-gradient-warning sm" onclick="changeEstado('{{ route('productos.status', $item->id) }}'); ">Activo</button>
                    @else
                    <button class="btn badge bg-gradient-info sm" onclick="changeEstado('{{ route('productos.status', $item->id) }}'); ">Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu"> 
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-descripcion="{{$item->descripcion}}"
                                data-categoria_id="{{$item->categoria_id}}" data-unidad_id="{{$item->unidad_id}}"
                                data-target="#modalEdit">Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>