@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Calculos
@endsection
@section('estilos')
<link href="{{ asset('theme/agroxa/plugins/dateranger/daterangepicker.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE CALCULOS</h3>     
                <p class="text-center">
                    <a href="{{ route('calculos.create') }}" class="btn btn-outline-info waves-effect waves-light" 
                >
                   <i class="fa fa-plus-circle"></i> Agregar  
                </a>

                <button type="button" class="btn btn-outline-primary waves-effect waves-light" 
                data-toggle="modal" data-target="#BuscarCalculo">
                   <i class="fa fa-search-plus"></i> Buscar 
                </button>
                </p>
               

               

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>

<div id="resultado">

</div>
@include('modals.buscar-calculo')

@endsection


@section('scripts')
<script src="{{ asset('theme/agroxa/plugins/dateranger/moment.min.js') }}"></script>
<script src="{{ asset('theme/agroxa/plugins/dateranger/daterangepicker.js') }}"></script>
<script src="{{ asset('js/Calculo.js') }}"></script>

@endsection