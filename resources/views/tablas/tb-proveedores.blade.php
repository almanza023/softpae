<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Nit</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
             <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($proveedores as $proveedor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> @if($proveedor->tipo==1)
                    Juridico
                 @else
                    Natural
                @endif
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->nit }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->correo }}</td>
               </td>
               
                <td>
                    @if($proveedor->estado)
                    <button class="btn badge bg-primary sm" style="color:#fff" onclick="changeEstado('{{ route('proveedores.status', $proveedor->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('proveedores.status', $proveedor->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$proveedor->id}}" data-nombre="{{$proveedor->nombre}}" data-nit="{{$proveedor->nit}}" data-direccion="{{$proveedor->direccion}}"  data-telefono="{{$proveedor->telefono}}" data-correo="{{$proveedor->correo}}" 
                                data-tipo="{{$proveedor->tipo}}" data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>