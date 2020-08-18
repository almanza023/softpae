@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Kardex
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE KARDEX</h3>     
                <form id="form_filtro" action="{{ route('kardex.filtro') }}" >                   
                    <div class="table-responsive">
                     <table class="table">
                         <tr>
                             <th>INSTITUCION</th>                            
                             <th>SEDE</th>   
                             <th></th>                         
                         </tr>
                         <tr>
                             <td>
                                 <select name="institucion_id" id="institucion_id" class="form-control">
                                 <option value="0">Seleccione</option>
                                     @foreach ($instituciones as $item)
                                         <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                     @endforeach
                                 </select>
                             </td>
                             <td>
                            
        <select name="sede_id" id="sede_id" class="form-control">
           
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
<script src="{{ asset('js/Kardex.js') }}"></script>

@endsection