@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Creación de Calculos
@endsection
@section('estilos')
<link href="{{ asset('theme/agroxa/assets/css/filas.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('theme/agroxa/plugins/dateranger/daterangepicker.css') }}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">CREACION DE CALCULOS</h3>     
                <form id="form_buscar" action="{{ route('buscar.menu') }}" >
                    @csrf
                    <div class="table-responsive">
                     <table class="table">                        
                         <tr>
                             <th>JORNADA</th>                                                         
                             <th>MENU</th>                            
                             <th>DÍA</th>  
                             <th></th>                          
                         </tr>
                         <tr>
                             <td>
                                 <select name="jornada" id="jornada_id" class="form-control">
                                    <option value="0">Seleccione</option>
                                    @foreach ($jornadas as $item)
                                         <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                     @endforeach
                                 </select>
                             </td>
                             
                             <td>
                                <select name="menu_id" id="menu_id" class="form-control">
                                   
                                </select>
                            </td>
                            <td>
                                <select name="dia" id="dia" class="form-control">
                                   <option value="1">LUNES</option>
                                   <option value="2">MARTES</option>
                                   <option value="3">MIERCOLES</option>
                                   <option value="4">JUEVES</option>
                                   <option value="5">VIERNES</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" id="buscar" class="btn btn-outline-info"><i class="fa fa-search"></i> Buscar</button>
                            
                                <button type="button" id="cerrar" class="btn btn-outline-danger"><i class="fa fa-window-close"></i> Cerrar</button>
                            </td>
                         </tr>
                       
                        
                     

                     </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <button id="bt_add" class="btn btn-outline-info btn-sm"> <i class="fa fa-plus-circle"></i> Agregar</button>
                        <button id="bt_del" class="btn btn-outline-danger btn-sm"> <i class="fa fa-recycle"></i> Eliminar</button>
                    </div>
                </div>
                    
                   
               
                <form id="form_create" action="{{ route('calculos.store') }}" method="POST">
                @csrf
                <input type="hidden" name="jornada_id" id="jor_id">
                <br><br>
                <tr>
                    <th>FECHA </th>                           
                </tr>                        
                <tr>
                   <td>
                  <input type="text" name="daterange"  class="form-control" />
                  <input type="hidden" name="inicio" id="inicio">
                  <input type="hidden" name="final" id="final">
                </td>
                </tr>
                <div id="content">
                    
                    <br>
                    <table id="tabla" class="table table-bordered">
                        
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Día</th>
                            <th>Codigo Menú</th>
                        </tr>
                    </thead>
                </table>
                <p class="text-center"><button class="btn btn-outline-info" type="submit" id="guardar"><i class="fa fa-save"></i> Guardar</button></p>
                </div>
            </form>
            

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

<div id="resultado"></div>


@endsection


@section('scripts')
<script>
    
</script>

<script src="{{ asset('theme/agroxa/plugins/dateranger/moment.min.js') }}"></script>
<script src="{{ asset('theme/agroxa/plugins/dateranger/daterangepicker.js') }}"></script>
<script src="{{ asset('js/Create_calculo.js') }}"></script>
<script src="{{ asset('js/FilaDinamicas.js') }}"></script>
@endsection