@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Minutas
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE MINUTAS</h3>     
                <form id="form_filtro" action="{{ route('menu.filtro') }}" >                   
                    <div class="table-responsive">
                     <table class="table">
                         <tr>
                             <th>JORNADA</th>                            
                             <th>TIPO COMPLEMENTO</th> 
                             <th>GRUPO ETARIO</th>  
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
                                <select name="tipo_id" id="tipo_id" class="form-control">
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
                                <button type="button" id="buscar" class="btn btn-outline-info"><i class="fa fa-search"></i> Buscar</button>
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

<div id="resultado">

</div>


@endsection


@section('scripts')
<script src="{{ asset('js/Index_minuta.js') }}"></script>

@endsection