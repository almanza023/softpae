<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">DETALLES DE CALCULOS</h3>     
               
                    <div class="table-responsive">
                     <table class="table table-bordered" style="width:100%">
                         <tr>
                             <th style="width: 5%;">N°</th>
                             <th>DIA</th>                          
                             <th>MENU</th>                          
                         </tr>
                         @foreach ($calculos as $item)
                             <tr>
                                <td> {{ $loop->iteration }}</td>
                                @switch($item->dia)
                                @case(1)
                                   <th>LUNES</th>
                                    @break
                            
                                @case(2)
                                <th>MARTES</th>
                                    @break
                                @case(3)
                                    <th>MIERCOLES</th>
                                @break
                                @case(4)
                                <th>JUEVES</th>
                                @break
                                @case(5)
                                <th>VIENES</th>
                                @break
                            
                                @default
                                   <th>---</th>
                            @endswitch
                               
                                 <td> M-{{ $item->codigo }}</td>
                             </tr>
                         @endforeach
                         
                     </table>
                    </div>

                    
            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>