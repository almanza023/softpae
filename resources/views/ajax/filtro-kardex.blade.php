<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center"></h3>     
                <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%">
                            <tr align="center"> 
                            
                                <th COLSPAN="2">CORPORACION REGIONAL PARA LA CONSTRUCCION SOCIAL</th>
                                
                            </tr>
                            <tr align="center">
                                 <th COLSPAN="2">GUIA KARDEX</th>
                            </tr>
                            <tr>
                                <th>MUNICIPIO:SINCELEJO</th>
                                <th>INSTITUCION: ALTOS DEL ROSARIO: </th>
                            </tr>
                            <tr>
                                <th>CAJM: 362 </th>
                                <th>DESCUENTOS CAJM: 0</th>
                            </tr>
                            <tr>
                                <th>CAJT: 382 </th>
                                <th>DESCUENTOS CAJT: 0</th>
                            </tr>
                            <tr>
                                <th>AJU: 103 </th>
                                <th>DESCUENTOS AJU: 0</th>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                     <table class="table table-bordered" style="width:100%">
                         <tr>
                             <th style="width: 5%;">N°</th>
                             <th>PRODUCTO</th>                          
                            @foreach ($menus_id as $item)
                                <th style="width: 10%;">M-{{ $item->codigo}}</th>
                            @endforeach                       
                         </tr>                                               
                         @foreach ($productos as $item)
                            <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->nombre  }}</td>
                                          
                           
                                 
                            </tr>                
                         @endforeach
                     </table>
                    </div>

                    
            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>