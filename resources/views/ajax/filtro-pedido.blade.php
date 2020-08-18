<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center"><img src="{{ asset('theme/agroxa/assets/images/6.png')}}" height="32px"> </h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%">
                            <tr>
                            <th></th>
                                <th>"PROGRAMA DE ALIMENTACIÓN ESCOLAR
                                    REMISIÓN ENTREGA DE VÍVERES EN INSTITUCIÓN EDUCATIVA
                                    -RACIÓN PREPARADA EN SITIO-
                                    COMPLEMENTO ALIMENTARIO JORNADA MAÑANA - TARDE"
                                </th>
                            </tr>
                            <tr>
                                <th>OPERADOR: CORPORACIÓN REGIONAL PARA LA CONSTRUCCION SOCIAL</th>
                            <th>Fecha: {{ $date}}</th>
                            </tr>
                            <tr>
                                <th>ETC: SINCELEJO</th>
                            <th>MUNICIPIO O VEREDA: {{ $institucion->municipio->nombre}}</th>
                            </tr>
                            <tr>
                                <th>INSTITUCION O CENTRO EDUCATIVO: {{ $institucion->nombre}} </th>
                                <th>SEDE EDUCATIVA: {{ $sede->nombre}} </th>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%">
                           <tr>
                                <th>RANGO DE EDAD</th>
                                <th>No DE RACIONES ADJUDICADAS</th>
                                <th>No DE RACIONES ATENDIDAS</th>
                                <th>No DE DÍAS A ATENDER</th>
                                <th>No DE MENÚ Y SEMANA DEL CICLO DE MENÚS ENTREGADO:</th>
                                <th>TOTAL RACIONES</th>
                           </tr>
                           @foreach ($beneficiarios as $item)
                           <tr>
                            <td>{{$item->grupo_etario->rango}} años 11 meses</td>
                            <td>{{$item->cantidad}}	</td>
                            <td>{{$item->cantidad}}	</td>
                            <td>5</td>
                            <td>M-1, M-2, M-3, M-4 y M-5</td>
                            <td>"CAJM: 210 CAJT: 123 AJU: 0"</td>
                            </tr>
                           @endforeach



                        </table>
                    </div>
                    <div class="table-responsive">
                     <table class="table table-bordered" style="width:100%">
                         <tr>
                             <th style="width: 5%;">N°</th>
                             <th>PRODUCTO</th>
                             <th colspan="3">CANTIDAD DE ALIMENTOS POR NUMERO DE RACIONES </th>

                             <th>UNIDAD DE MEDIDA</th>
                             <th>CANTIDAD TOTAL</th>
                             <th>CANTIDAD ENTREGADA	</th>
                             <th>ESPECIFICACIONES DE CALIDAD</th>
                             <th>FALTANTES</th>
                             <th>DEVOLUCIÓN</th>

                         </tr>

                         @foreach ($productos as $item)
                            <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->nombre  }}</td>
                            <td colspan="3"></td>
                            <td>{{$item->unidad->prefijo}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            </tr>

                         @endforeach

                     </table>
                    </div>


            </div>
        </div>
    </div>
    <!-- end col -->

</div>
