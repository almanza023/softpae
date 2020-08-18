<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Tipo de usuario</th>
             <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $usuario->nombres }}</td>
                <td>{{ $usuario->apellidos }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->correo }}</td>
                <td> @if($usuario->rol==1)
                    Administrador
                 @else
                    Estandar
                @endif
               </td>
               
                <td>
                    @if($usuario->estado)
                    <button class="btn badge bg-primary sm" style="color: #fff" onclick="changeEstado('{{ route('usuarios.status', $usuario->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('usuarios.status', $usuario->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$usuario->id}}" data-nombres="{{$usuario->nombres}}" data-apellidos="{{$usuario->apellidos}}" data-direccion="{{$usuario->direccion}}"  data-telefono="{{$usuario->telefono}}" data-correo="{{$usuario->correo}}" 
                                data-usuario="{{$usuario->usuario}}" data-rol="{{$usuario->rol}}" data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>