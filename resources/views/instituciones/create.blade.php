@extends('theme.main', ['tabla'=>false])
@section('titulo')
    Creación de Instituciones
@endsection
@section('content')
@section('estilos')
<link href="{{ asset('theme/agroxa/assets/css/filas.css') }}" rel="stylesheet" type="text/css">
    
@endsection
<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE INSTITUCIONES</h3>     
                <form id="form_create"  action="{{ route('instituciones.store') }}" method="POST">
                    @csrf   
                    @include('form.institucion', ['crear'=>true, 'editar'=>false])   
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tiene Sedes</label>
                        <div class="col-sm-8">
                            <select name="sedes" id="sedes" class="form-control">
                               <option value="0">NO</option>
                               <option value="1">SI</option>
                            </select>
                        </div>
                    </div>  
                <div id="group-sedes">
                    <div id="content">
                        <hr>
                        <label>Agregar Sedes</label>
                        <div class="form-group">
                            <label for="nombre">Nombre </label><label class="text-danger">(*)</label>
                            <input type="text" class="form-control" name="nombre_sede" id="nombre_sede">
                        </div>
                        <div class="form-group">
                            <button id="bt_add" class="btn btn-outline-info btn-sm"> <i class="fa fa-plus-circle"></i> Agregar</button>
                            <button id="bt_del" class="btn btn-outline-danger btn-sm"> <i class="fa fa-window-close"></i> Eliminar</button>
                        
                        </div>
                        <table id="tabla" class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Nº</td>
                                <td>Nombre</td>                            
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
                
               
               <p class="text-center">
                    
                    <button type="submit" class="btn btn-outline-info"><i class="fa fa-save"></i> GUARDAR</button>
               
               </p>
                </form>

             
            </div>
        </div>
    </div>
   
    
    <!-- end col -->

</div>
@endsection


@section('scripts')

<script src="{{ asset('js/Filas.js') }}"></script>
<script src="{{ asset('js/Create_institucion.js') }}"></script>

@endsection