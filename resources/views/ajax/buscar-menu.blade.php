<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
           
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">DETALLES DE MENÚ</h3>     
               
                    <div class="table-responsive">
                     <table class="table table-bordered" style="width:100%">
                         <tr>
                             <th style="width: 5%;">N°</th>
                             <th>PRODUCTO</th>                          
                            @foreach ($grupos as $item)
                                <th style="width: 10%;">{{ $item->rango}}</th>
                            @endforeach                       
                         </tr>                                               
                         @foreach ($productos as $item)
                            <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->nombre  }}</td>
                                          
                            
                            @foreach ($menus as $m)
                             @if ($item->id==$m->producto_id)
                                 <td style="width:15px">{{ $m->cantidad }}</td>
                             @endif
                            @endforeach 
                               <td style="width: 25px;">{{ $item->unidad->prefijo }}</td>  
                            </tr>      
                                      
                         @endforeach
                     </table>
                    </div>

                    
            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>