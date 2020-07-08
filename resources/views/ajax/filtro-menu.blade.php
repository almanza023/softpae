<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">DETALLES DE MENÚ</h3>     
               
                    <div class="table-responsive">
                     <table class="table table-bordered">
                         <tr>
                             <th style="width: 5%">N°</th>
                             <th>PRODUCTO</th>                          
                             <th>CANTIDAD</th>                          
                         </tr>
                         @php
                             $productos=DB::select('select * from productos');
                         @endphp
                        
                         @foreach ($productos as $item)
                            <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->nombre  }}</td>
                                          
                            
                            @foreach ($menus as $m)
                             @if ($item->id==$m->producto_id)
                                 <td>{{ $m->cantidad }}</td>
                             @endif
                            @endforeach
                            
                        
                              
                                 
                            </tr>                
                         @endforeach
                     </table>
                    </div>

                    
            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>