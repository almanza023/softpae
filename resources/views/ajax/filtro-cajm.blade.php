<div class="row" id="datos">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center"><img src="{{ asset('theme/agroxa/assets/images/6.png')}}" height="32px"> DETALLES DE MENÚ</h3>
                <div class="table-responsive">
                        <table class="table table-hover">

                            <tr>
                                <td colspan="2">Total Beneficiarios </td>
                                <td>{{ $total_ben }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <form id="form_create"  method="POST" action="{{ route('preorder.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="grupo_etario_id" value="{{ $grupo_id }}">
                            <input type="hidden" name="sede_id" value="{{ $sede_id }}">
                            <input type="hidden" name="jornada_id" value="{{ $jornada_id }}">
                            <input type="hidden" name="tipo_complemento_id" value="{{ $tipo_complemento }}">
                            <input type="hidden" name="fecha_inicio" value="{{ $date1 }}">
                            <input type="hidden" name="fecha_final" value="{{ $date2 }}">


                            <button type="submit" class="btn btn-primary">Agregar a Pedidos</button>
                            <br><br><br>
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
                            <input type="hidden" name="producto_id[]" value="{{ $item->id }}">
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
                               <td><b>{{$fila}}</b>
                                <input type="hidden" class="form-control" name="cantidad[]" value="{{ $fila }}"></td>
                               <td>{{$item->unidad->prefijo}}</td>
                               @php
                                   $fila=0;
                               @endphp
                               </tr>

                            @endforeach
                        </table>

                       </div>


                    </form>

            </div>
        </div>
    </div>
    <!-- end col -->

</div>

<script >

    $("#form_create").submit(function(event) {
        event.preventDefault();
        swal({
            title: 'Confirmación',
            text: "¿Está seguro de guardar la información ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger m-l-10',
            buttonsStyling: false
        }).then(function() {
            let form = $('#form_create');
            $.ajax({
                data: form.serialize(),
                url: form.attr('action'),
                type: form.attr('method'),
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        success(data.success);
                        $('#datos').hide();
                    } else {
                        warning(data.warning);
                    }
                },
                error: function(data) {
                    if (data.status === 422) {
                        let errors = $.parseJSON(data.responseText);
                        addErrorMessage(errors);
                    }
                }
            });
        }, function(dismiss) {

        })

    });
</script>
