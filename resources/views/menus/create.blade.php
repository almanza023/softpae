@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Creación de  Menús
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">CREACION DE MENÚS</h3>     
                <form id="form_create" action="{{ route('menus.store') }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                     <table class="table">
                         <tr>
                             <th>JORNADA</th>   
                             <th></th>                                         
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
                                <button type="button" id="buscar" class="btn btn-outline-info"><i class="fa fa-search"></i> Buscar</button>
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
                <h3 class="mt-0 header-title text-center"><img src="{{ asset('theme/agroxa/assets/images/6.png')}}" height="32px"> DETALLES DE MENÚ</h3>     
               
                    <div class="table-responsive">
                     <table class="table table-bordered">
                         <tr>
                             <th style="width: 5%">N°</th>
                             <th>PRODUCTO</th>                           
                             
                             @foreach ($grupos as $item)
                                 <th style="width: 20%">{{ $item->rango }}</th>
                             @endforeach                         
                         </tr>
                         @foreach ($productos as $p)
                             <tr>
                                <td style="width: 5%">{{ $loop->iteration }}</td>
                                
                                <td>{{ $p->nombre }}
                                   
                                </td>
                                @foreach ($grupos as $item)
                                 <td style="width: 20%">
                                    <input type="hidden" name="producto_id[]"  value="{{ $p->id }}">
                                     <input type="number" class="form-control" name="can[]" required step="0.1" min="0" value="0">
                                     <input type="hidden" name="grupo_etario_id[]" value="{{ $item->id }}">
                                 </td>
                                 
                             @endforeach   
                               
                             </tr>
                         @endforeach
                     </table>
                    </div>

                    <p class="text-center"><button type="submit" class="btn btn-outline-info"><i class="fa fa-save"></i> Guardar</button></p>
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
<script src="{{ asset('js/Create_menu.js') }}"></script>
@endsection