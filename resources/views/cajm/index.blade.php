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
                <form id="form_filtro" action="{{ route('cajm.filtro') }}" >
                    <div class="table-responsive">
                     <table class="table">
                         <tr>
                            <th>INSTITUCION</th>
                            <th>SEDE</th>
                             <th>JORNADA</th>
                             <th>TIPO COMPLEMENTO</th>
                             <th></th>
                         </tr>

                         <tr>
                            <td>
                                <select name="institucion_id" id="institucion_id" class="form-control">
                               <option value="0">[Todas]</option>
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



                         </tr>
                         <tr>
                            <th>GRUPO ETARIO</th>
                             <th>FECHA INICIAL</th>
                            <th>FECHA FINALIZACION</th>
                            <th>DESCONTAR</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <select name="grupo_id" id="grupo_id" class="form-control">
                                    @foreach ($grupos as $item)
                                        <option value="{{ $item->id }}">{{ $item->rango }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input class="form-control" type="date" name="date1"></td>
                            <td><input class="form-control" type="date" name="date2"></td>
                            <td><select name="descontar" id="descontar" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">SI</option>
                            </select>
                            <td>
                                <button type="button" id="buscar" class="btn btn-outline-info"><i class="fa fa-search"></i> Buscar</button>
                            </td>
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
<script src="{{ asset('js/Cajm.js') }}"></script>

@endsection
