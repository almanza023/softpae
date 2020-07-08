@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Creación de Menu Menús
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">CREACION DE MENÚS</h3>     
                <form action="{{ route('menus.store') }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                     <table class="table">
                         <tr>
                             <th>JORNADA</th>                            
                             <th>TIPO COMPLEMENTO</th>                            
                         </tr>
                         <tr>
                             <td>
                                 <select name="jornada_id" id="jornada_id" class="form-control">
                                     @foreach ($jornadas as $item)
                                         <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                     @endforeach
                                 </select>
                             </td>
                             <td>
                                <select name="tipo_id" id="tipo_id" class="form-control">
                                    @foreach ($tipos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="button" id="buscar" class="btn btn-outline-primary btn-sm">Buscar</button>
                            </td>
                         </tr>
                     </table>
                    </div>
                

               

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">DETALLES DE MENÚ</h3>     
               
                    <div class="table-responsive">
                     <table class="table table-bordered">
                         <tr>
                             <th style="width: 5%">N°</th>
                             <th>PRODUCTO</th>                           
                             
                             @foreach ($grupos as $item)
                                 <th style="width: 20%">{{ $item->rango }}</th>
                             @endforeach                         
                         </tr>
                         @foreach ($productos as $item)
                             <tr>
                                <td style="width: 5%">{{ $loop->iteration }}</td>
                                
                                <td>{{ $item->nombre }}
                                    <input type="hidden" name="producto_id[]" id="producto_id[]" value="{{ $item->id }}">
                                </td>
                                @foreach ($grupos as $item)
                                 <td style="width: 20%">
                                     <input type="number" class="form-control" name="can[]}" required step="0.1" min="0">
                                     <input type="hidden" name="grupo_etario_id[]" id="grupo_etario_id[]" value="{{ $item->id }}">
                                 </td>
                                 
                             @endforeach   
                                         
                             </tr>
                         @endforeach
                     </table>
                    </div>

                    <button type="submit" class="btn btn-outline-success">GUARDAR</button>
                </form>

               

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Create_Menu.js') }}"></script>
@endsection