@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Pedidos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE PEDIDOS</h3>
                <form id="form_filtro" action="{{ route('pedidomen.filtro') }}" >
                    <div class="table-responsive">
                     <table class="table">
                         <tr>
                             <th>INSTITUCION</th>
                             <th>SEDE</th>
                             <td>COMPLEMENTO</td>
                         </tr>
                         <tr>
                            <td>
                                <select name="institucion_id" id="institucion_id" class="form-control" required>
                                <option value="0">Seleccione</option>
                                    @foreach ($instituciones as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>

                            <select name="sede_id" id="sede_id" class="form-control" required>

                            </select>


                           </td>
                           <td>
                            <select name="tipo_id" id="tipo_id" class="form-control" required>
                            <option value="0">Seleccione</option>
                                @foreach ($tipos as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </td>


                        </tr>
                         <tr>
                            <th>FECHA INICIO</th>
                            <th>FECHA FINAL</th>
                        </tr>
                        <tr>
                            <th><input type="date" name="inicio" id="inicio" required class="form-control"></th>
                            <th><input type="date" name="final" id="final" required class="form-control"></th>
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
<script src="{{ asset('js/Pedidomen.js') }}"></script>

@endsection
