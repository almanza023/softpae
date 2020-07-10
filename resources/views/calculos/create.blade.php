@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Creación de Calculos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">CREACION DE CALCULOS</h3>     
                <form id="form_create" action="{{ route('buscar.menus') }}" >
                    @csrf
                    <div class="table-responsive">
                     <table class="table">
                         <tr>
                             <th>JORNADA</th>                            
                             <th>GRUPO ETARIO</th>                            
                             <th>MENU</th>                            
                             <th>DÍA</th>                            
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
                                <select name="grupo_id" id="grupo_id" class="form-control">
                                    @foreach ($jornadas as $item)
                                        <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                    @endforeach
                                </select>
                            </td>
                             <td>
                                <select name="codigo_menu" id="codigo_menu" class="form-control">
                                    @foreach ($tipos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="grupo_id" id="grupo_id" class="form-control">
                                    @foreach ($grupos as $item)
                                        <option value="{{ $item->id }}">{{ $item->rango }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="button" id="buscar" class="btn btn-outline-primary btn-sm">Buscar</button>
                            </td>
                         </tr>
                     </table>
                    </div>
                </form>

               

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

<div id="datos"></div>
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Calculo.js') }}"></script>
@endsection