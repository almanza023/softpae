@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Pedidos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">CONSULTA DE PEDIDOS</h3>
                <a href="{{ route('pedidomen.create') }}" class="btn btn-outline-info waves-effect waves-light"
              >
                   <i class="fa fa-plus-circle"></i> Crear Pedido
            </a><br><br>


               <div id="id_table">
                @include('tablas.tb-pedidos')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<form id="form_hidden" style="display:none" action="{{route('pedidomen.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>

@endsection


@section('scripts')
<script>

</script>
<script src="{{ asset('js/Pedidomen.js') }}"></script>
@endsection
