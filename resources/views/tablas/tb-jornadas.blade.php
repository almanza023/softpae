<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Descripcón</th>
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($jornadas as $jornada)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jornada->nombre }}</td>
                <td>{{ $jornada->descripcion }}</td>
                <td>
                    @if($jornada->estado)
                    <button class="btn badge bg-gradient-warning sm" onclick="changeEstado('{{ route('jornadas.status', $jornada->id) }}'); ">Activo</button>
                    @else
                    <button class="btn badge bg-gradient-info sm" onclick="changeEstado('{{ route('jornadas.status', $jornada->id) }}'); ">Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$jornada->id}}" data-nombre="{{$jornada->nombre}}" data-descripcion="{{$jornada->descripcion}}"  data-target="#modalEdit">Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>