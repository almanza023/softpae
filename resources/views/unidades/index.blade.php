@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Unidades de Medición
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE UNIDADES DE MEDICION</h3>     
                <button type="button" class="btn btn-primary waves-effect waves-light" 
                data-toggle="modal" data-target="#modalCreate">
                   <i class="fa fa-newspaper"></i> CREAR 
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-unidades')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('unidades.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-unidad')
@include('modals.edit-unidad')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Unidad.js') }}"></script>
@endsection