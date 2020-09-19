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
                <a href="{{ route('compras.index') }}" class="btn btn-outline-info waves-effect waves-light" 
              >
                   <i class="fa fa-plus-circle"></i> Regresar
            </a>
                </p>
                <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Detalle de Compra hecho a: {{$compra->nombre}}</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ asset('theme/agroxa/assets/images/LOGOSOFTPAE.png')}}"  height="160px">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <h4 class="card-title" align="right">Factura de Compra No. {{$compra->id}}<br></h4><h2 class="card-title" align="right" style="color: red;">{{$compra->fecha}}</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <table class="table table-bordered" id="detalles">
              <thead style="background: #E0F8F1;">
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
              </thead>
              <tbody>
                @foreach($detalles as $det)
                <tr>
                  <th>{{$det->producto}}</th>
                  <td>{{$det->cantidad}}</td>
                  <td>$ {{number_format($det->precio,2)}}</td>
                  <td>$ {{number_format($det->cantidad*$det->precio)}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><br>
          <div align="right"><h4 id="total">Total: $ {{number_format($compra->total,2)}}</h4><input type="hidden" name="total_venta" id="total_venta" value="{{$compra->total}}"></div><br>
          <p class="text-center"><a href="{{route('reporte.compra', $compra->id) }}" class="btn btn-info btn-icon-text" >Descargar <i class="icon-print btn-icon-prepend"></i></a></p>
        </div>
      </div>
    </div>
  </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

@endsection

