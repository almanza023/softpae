@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Compras
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE COMPRAS</h3>     
                <a href="{{ route('compras.create') }}" class="btn btn-outline-info waves-effect waves-light" 
              >
                   <i class="fa fa-plus-circle"></i> Agregar orden de compra 
            </a>
                </p>
                <div class="tabla table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>Fecha</th>
                <th> Proveedor </th>
                <th>Total</th>
                <th>Estado</th>
                <th> Opciones </th>
              </tr>
            </thead>
            <tbody>
              @if($compras->count())
              @foreach ($compras as $c)
              <tr>
                <td>{{ $c->fecha }}</td>
                <td>{{ $c->nombre }}</td>
                <td>{{ $c->total }}</td>
                <td>
                    @if($c->estado==1)
                    <button class="btn badge bg-primary sm" style="color: #fff"><i class="fa fa-check"></i> Activo</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" ><i class="fa fa-ban"></i> Anulada</button>
                    @endif
                </td>
               
                <td>
                  <a href="{{ route('compras.show', $c->id) }}" class="btn btn-sm btn-icon-text btn-outline-info">Detalle <i class="fa fa-eye"></i></a>
                  <button data-target="#modal-delete-{{$c->id}}" data-toggle="modal" class="btn btn-sm btn-icon-text btn-outline-danger">Anular <i class="fa fa-close-o"></i></button>
                  <a href="{{route('reporte.compra', $c->id) }}" class="btn btn-sm btn-icon-text btn-outline-primary">Descargar <i class="fa fa-eye"></i></a>

                </td>
              </tr>
              @include('compras.modal')
              @endforeach
              @else
              <tr><td colspan="5"><p class="text-center" style="color: red;"> No se han encontrado Compras </p></td></tr>
              @endif
            </tbody>
          </table>
          {{$compras->render()}}
                
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

@endsection

