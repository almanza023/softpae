<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Institucion</th>
            <th>Sede</th>
            <th>Complemento</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pedidos as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{  $item->sede->institucion->nombre }}</td>
            <td>{{ $item->sede->nombre }}</td>
            <td>{{ $item->tipo_complemento->nombre }}</td>
            <td>

                <div class="btn-group m-b-10">
                <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item show-details" href="{{ route('pedidomen.show', $item->id) }}"><i class="fa fa-edit"></i> Ver</a>

                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
