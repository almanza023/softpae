@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Detalles de Pedidos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">DETALLES DE PEDIDO</h3>
            </a><br><br>
               <div id="id_table">
                <div class="row" >
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h3 class="mt-0 header-title text-center"><img src="{{ asset('theme/agroxa/assets/images/6.png')}}" height="32px"> </h3>
                                    <div class="table-responsive" >
                                        <table class="table table-bordered" style="width:100%" id="tblData"  rules="groups" frame="hsides" border="1">
                                            <tr>
                                            <th><img src="{{ asset('theme/agroxa/assets/images/pae.png') }}" alt="" width="250px"></th>
                                                <th colspan="8">PROGRAMA DE ALIMENTACIÓN ESCOLAR
                                                    REMISIÓN ENTREGA DE VÍVERES EN INSTITUCIÓN EDUCATIVA
                                                    -RACIÓN PREPARADA EN SITIO-
                                                    COMPLEMENTO ALIMENTARIO JORNADA MAÑANA - TARDE
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>OPERADOR: CORPORACIÓN REGIONAL PARA LA CONSTRUCCION SOCIAL</th>
                                            <th colspan="8">Fecha: {{ $pedido->fecha_inicio}}</th>
                                            </tr>
                                            <tr>
                                                <th>ETC: SINCELEJO</th>
                                            <th colspan="8">MUNICIPIO O VEREDA: {{ $pedido->sede->institucion->municipio->nombre}}</th>
                                            </tr>
                                            <tr>
                                                <th>INSTITUCION O CENTRO EDUCATIVO: {{ $pedido->sede->institucion->nombre}} </th>
                                                <th colspan="8" class="table-secondary">SEDE EDUCATIVA: {{ $pedido->sede->nombre}} </th>
                                            </tr>


                                           <tr class="table-secondary">
                                                <th>RANGO DE EDAD</th>
                                                <th>No DE RACIONES ADJUDICADAS</th>
                                                <th>No DE RACIONES ATENDIDAS</th>
                                                <th>No DE DÍAS A ATENDER</th>
                                                <th colspan="2">No DE MENÚ Y SEMANA DEL CICLO DE MENÚS ENTREGADO:</th>
                                                <th colspan="3">TOTAL RACIONES</th>
                                           </tr>
                                           @foreach ($beneficiarios as $item)
                                           <tr>
                                            <td>{{$item->grupo_etario->rango}} años 11 meses</td>
                                            <td>{{$item->cantidad}}	</td>
                                            <td>{{$item->cantidad}}	</td>
                                            <td>5</td>
                                            <td colspan="2">M-1, M-2, M-3, M-4 y M-5</td>
                                            <td colspan="3">"CAJM: 210 CAJT: 123 AJU: 0"</td>
                                            </tr>
                                           @endforeach

                                         <tr class="table-secondary">
                                             <th>PRODUCTO</th>
                                             <th colspan="3">CANTIDAD DE ALIMENTOS POR NUMERO DE RACIONES </th>
                                             <th>UNIDAD DE MEDIDA</th>
                                             <th>CANTIDAD TOTAL</th>
                                             <th>CANTIDAD ENTREGADA	</th>
                                             <th>ESPECIFICACIONES DE CALIDAD</th>
                                             <th>FALTANTES</th>
                                             <th>DEVOLUCIÓN</th>
                                         </tr>
                                         @php
                                             $suma=0;
                                         @endphp
                                         @foreach ($pedido->detalles as $item)
                                         @php
                                         $suma=$item->cantidad1 + $item->cantidad2 +$item->cantidad3;
                                        @endphp


                                            <tr>
                                            <td>{{ $item->producto->nombre  }}</td>
                                            <td >{{ $item->cantidad1 }}</td>
                                            <td>{{ $item->cantidad2 }}</td>
                                            <td>{{ $item->cantidad3}}</td>
                                            </td>
                                            <td>kl</td>
                                            <td>{{ $suma }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                            @php
                                            $suma=0;
                                          @endphp

                                         @endforeach
                                                <tr>
                                                    <th colspan="8">C: Cumple       NC: No cumple
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th  colspan="8">OBSERVACIONES:
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th  colspan="4">NOMBRE TRANSPORTADOR (operador):
                                                    </th>
                                                    <th  colspan="4">FIRMA:
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th  colspan="4">NOMBRE MANIPULADOR DE ALIMENTOS QUE RECIBE (operador):
                                                    </th>
                                                    <th  colspan="4">NOMBRE RESPONSABLE INSTITUCIÓN O CENTRO EDUCATIVO:
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th  colspan="4">FIRMA:
                                                    </th>
                                                    <th  colspan="4">CARGO:
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th  colspan="4"></th>
                                                    <th  colspan="4">FIRMA:</th>
                                                </tr>
                                            </table>
                                        </div>

                                     </table>
                                     <button class="btn btn-outline-primary" id="btnExportar" onclick="exportTableToExcel('tblData')">Exportar Datos</button>
                                    </div>



                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                <script src="{{ asset('js/exportar.js') }}"></script>
                <script src="{{ asset('js/Create_pedido.js') }}"></script>

                </div>

               </div>

            </div>
        </div>
    </div>


</div>
@endsection
@section('scripts')
<script>
</script>
<script src="{{ asset('js/Pedidomen.js') }}"></script>
@endsection
