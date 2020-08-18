<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center"><img src="{{ asset('theme/agroxa/assets/images/6.png')}}" height="32px"> DETALLES DE MENÚ</h3>


                <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td>Sedes</td>
                                <td>Institución</td>
                                <td>Beneficiarios</td>
                            </tr>
                            @foreach ($sedes as $item)
                            <tr>
                                <td>{{ $item->nombre  }}</td>
                                 <td>{{ $item->institucion->nombre  }}</td>
                                @php
                                    $cantidades= DB::select('SELECT b.cantidad FROM beneficiarios b WHERE b.sede_id=? AND b.jornada_id=? AND b.grupo_etario_id=? AND b.tipo_complemento_id=?',
                                    [$item->id,$jornada_id,$grupo_id,$tipo_complemento]
                                    );
                                    $total=0;
                                @endphp

                                @foreach ($cantidades as $item)
                               @if ( $item->cantidad)
                               <td>{{ $item->cantidad }}</td>
                               @else
                                   <td>0</td>
                               @endif


                                @endforeach

                            </tr>

                            @endforeach
                            <tr>
                                <td colspan="2">Total Beneficiarios </td>
                                <td>{{ $total_ben }}</td>
                            </tr>



                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%">
                            <tr>
                                <th style="width: 5%;">Numero</th>
                                <th>PRODUCTO</th>
                               @foreach ($menus_id as $item)
                                   <th style="width: 10%;">M-{{ $item->codigo}}</th>
                               @endforeach
                               <th>TOTAL</th>

                            </tr>
                            @php
                                 $fila=0;
                            @endphp
                            @foreach ($productos as $item)
                               <tr>
                               <td>{{ $loop->iteration  }}</td>
                               <td>{{ $item->nombre  }}</td>
                               @foreach ($menus as $m)

                                @if ($item->id==$m->producto_id)
                                @php
                                    $var=0;

                                    $var= $m->cantidad *$total_ben;
                                    $fila+=$var;
                                @endphp
                                @if ($descontar==1 && $loop->last)
                                <td style="width:15px">0</td>
                                @else
                                <td style="width:15px">{{ $var }}</td>
                                @endif

                                @endif

                               @endforeach
                               <td><b>{{$fila}}</b></td>
                               <td>{{$item->unidad->prefijo}}</td>
                               @php
                                   $fila=0;
                               @endphp
                               </tr>
                            @endforeach
                        </table>
                       </div>




            </div>
        </div>
    </div>
    <!-- end col -->

</div>
