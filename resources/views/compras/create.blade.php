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
                   <i class="fa fa-plus-circle"></i> Listado de compras 
            </a>
                </p>
                <form  class="form-sample" action="{{route('compras.store')}}" method="POST">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="id_usuario" id="id_usuario">
                <div class="form-group">
                <label>Proveedor</label>
                          <select class="form-control"   name="id_proveedor" id="id_proveedor">
                            @foreach($proveedores as $p)
                            <option value="{{$p->id}}">{{$p->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                <div class="table table-responsive">
                   <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr>
                      <th >Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Opción</th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <select class="form-control"   name="idarticulo" id="idarticulo">
                            @foreach($productos as $a)
                            <option value="{{$a->id}}">{{$a->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                      </td>
                      <td>
                         <div class="form-group">
                          <input type="number" class="form-control"  name="cantidad" id="cantidad">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" class="form-control"    name="precio" id="precio">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <button type="button" id="bt_add" class="btn btn-primary btn-icon-text">Agregar <i class="icon-plus btn-icon-prepend"></i></button>
                        </div>
                      </td>
                    </tr>
                  </table>
                  <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="detalles">
                    <thead style="background: #E0F8F1;">
                      <th >Opciones</th>
                      <th>Articulo</th>
                      <th>Cantidad</th>
                      <th>Precio Unitario</th>
                      <th>Subtotal</th>
                    </thead>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><br>
                <div align="right"><h4 id="total">Total a Pagar 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></div><br>
                  <p class="text-center">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary btn-icon-text">Guardar <i class="icon-check btn-icon-prepend"></i></button>
                    <button type="reset" class="btn btn-warning btn-icon-text">limpiar <i class=" icon-magic-wand btn-icon-prepend"></i></button>
                  </p>
                </form>
                
               

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/Compras.js') }}"></script>
@endsection